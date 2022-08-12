<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Country;
use App\Models\DeliveryAddress;
use App\Models\Product;
use App\Models\Section;
use App\Models\ProductsImage;
use App\Models\ProductsAttribute;
use App\Models\SecondCart;
use Illuminate\Support\Facades\View;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function listing(Request $request)
    {

        if ($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data);
            $category_url = $data['url'];
            $categoryCount = Category::where(['category_url' => $category_url, 'status' => '1'])->count();
            if ($categoryCount > 0) {
                // echo "category exists"; die;
                $categoryDetails = Category::catDetails($category_url);
                //    echo "<pre>"; print_r($categoryDetails) ; die;


                //query to get category product
                $catgoryProducts = Product::with('brand')->with('section')->whereIn('category_id', $categoryDetails['catIds'])->where('status', 1);
                //echo "<pre>"; print_r($catgoryProducts) ; die;


                //check if the sort option is selected by user or not
                if (isset($_GET['sort']) &&  !empty($_GET['sort'])) {
                    if ($_GET['sort'] == "latest_products") {
                        $catgoryProducts->orderBy('id', 'Desc');
                    } else  if ($_GET['sort'] == "product_name_a_z") {
                        $catgoryProducts->orderBy('product_name', 'Asc');
                    } else  if ($_GET['sort'] == "product_name_z_a") {
                        $catgoryProducts->orderBy('product_name', 'Desc');
                    } else  if ($_GET['sort'] == "lowest_price") {
                        $catgoryProducts->orderBy('original_price', 'Asc');
                    } else  if ($_GET['sort'] == "highest_price") {
                        $catgoryProducts->orderBy('original_price', 'Desc');
                    }
                } else {
                    $catgoryProducts->orderBy('id', 'Desc');
                }

                $catgoryProducts = $catgoryProducts->paginate(5);
                return view('frontend.products.ajax_listing')->with(compact('categoryDetails', 'catgoryProducts', 'category_url'));
            } else {
                abort(404);
            }
        } else {
            $category_url = Route::getFacadeRoot()->current()->uri();
            //check url exists in category table or not
            $categoryCount = Category::where(['category_url' => $category_url, 'status' => '1'])->count();
            if ($categoryCount > 0) {
                // echo "category exists"; die;
                $categoryDetails = Category::catDetails($category_url);
                //echo "<pre>"; print_r($categoryDetails) ; die;

                //query to get category product
                $catgoryProducts = Product::with('brand')->with('section')->whereIn('category_id', $categoryDetails['catIds'])->where('status', 1);
                //echo "<pre>"; print_r($catgoryProducts) ; die;
                $catgoryProducts = $catgoryProducts->paginate(5);
                return view('frontend.products.listing')->with(compact('categoryDetails', 'catgoryProducts', 'category_url'));
            } else {
                abort(404);
            }
        }
    }

    public function detail($id)
    {
        // $category_url = Route::getFacadeRoot()->current()->uri();
        // $categoryCount = Category::where(['category_url' => $category_url , 'status' => '1'])->count();
        // if ($categoryCount > 0) {
        //    echo "category exists"; die;
        //    $categoryDetails = Category::catDetails($category_url);
        //    echo "<pre>"; print_r($categoryDetails) ; die;
        // }


        //to get the products only related to fashion category
        $product_section = Product::with(['section'])->find($id)->toArray();

        if ($product_section['section']['name'] == 'Fashion') {
            $productDetails = Product::with(['section', 'category', 'brand', 'attributes' => function ($query) {
                $query->where('status', 1);
            }, 'images'])->find($id)->toArray();
            //echo "<pre>" ; print_r($productDetails); die;
            $total_stock = ProductsAttribute::where('product_id', $id)->sum('stock');

            //related products
            $related_products = Product::where('category_id', $productDetails['category']['id'])->where('id', '!=', $id)->limit(20)->inRandomOrder()->get()->toArray();
            //dd($related_products);
            return view('frontend.products.product_detail')->with(compact('productDetails', 'total_stock', 'related_products'));
        } else {
            $productDetails = Product::with(['section', 'category', 'brand', 'images'])->find($id)->toArray();
            //echo "<pre>" ; print_r($productDetails); die;
            // $total_stock = ProductsAttribute::where('product_id' , $id)->sum('stock');
            //related products
            $related_products = Product::where('category_id', $productDetails['category']['id'])->where('id', '!=', $id)->limit(20)->inRandomOrder()->get()->toArray();
            //dd($related_products);
            return view('frontend.products.product_detail')->with(compact('productDetails', 'related_products'));
        }


    }
    public function getProductPrice(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            //  echo "<pre>" ; print_r($data); die;
            //    $getProductPrice = ProductsAttribute::where(['product_id' => $data['product_id'] , 'size' => $data['size']])->first();

            //change the product price according to the size of product  for discount
            $getDiscountedAttrPrice = Product::getDiscountedAttrPrice($data['product_id'], $data['size']);
            return $getDiscountedAttrPrice;

            //    return $getProductPrice->original_price;
        } else {
            $id = Route::getFacadeRoot()->current()->uri();
            $productDetails = Product::with('section', 'category', 'brand', 'attributes', 'images')->find($id)->toArray();
            //echo "<pre>" ; print_r($productDetails); die;


            return view('frontend.products.product_detail')->with(compact('productDetails'));
        }
    }

    public function addToCart(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $request->validate(['size' => 'required']);
            //echo "<pre>" ; print_r($data); die;


            //check product stock is available or not
            $getProductStock = ProductsAttribute::where(['product_id' => $data['product_id'], 'size' => $data['size']])->first()->toArray();
            //echo $getProductStock['stock']; die;



            //here demo_vertical is the name in place of quantity
            if ($getProductStock['stock'] < $data['demo_vertical']) {
                $message = "Required quantity is not available";
                Session::flash('error_message', $message);
                return redirect()->back();
                // return redirect()->back()->with('error_message' , $message);
            }

            //Generate session Id if not exists
            $session_id = Session::get('session_id');
            if (empty($session_id)) {
                $session_id = Session::getId();
                Session::put('session_id', $session_id);
            }

            if (Auth::check()) {
                //user logged in
                //check if product is already exists in User cart
                $countProducts = Cart::where(['product_id' => $data['product_id'], 'size' => $data['size'], 'user_id' => Auth::user()->id])->count();
            } else {
                //user is not logged in
                $countProducts = Cart::where(['product_id' => $data['product_id'], 'size' => $data['size'], 'session_id' => Session::get('session_id')])->count();
            }
            if ($countProducts > 0) {
                $message = "Product already exists in cart ";
                Session::flash('error_message', $message);
                return redirect()->back();
            }

            if (Auth::check()) {
                $user_id = Auth::user()->id;
            } else {
                $user_id = 0;
            }

            $request->validate(['size' => 'required']);
            //save product in cart

            $cart = new Cart();
            $cart->session_id = $session_id;
            $cart->user_id = $user_id;
            $cart->product_id = $data['product_id'];
            $cart->size = $data['size'];
            $cart->quantity = $data['demo_vertical'];
            $cart->save();
            $message = "Product has been added to cart ";
            Session::flash('success_message', $message);
            return redirect('cart');
        }
    }

    //add to cart for other items than fashioncategory
    public function add_To_Cart(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>" ; print_r($data); die;
            //Generate session Id if not exists
            $session_id = Session::get('session_id');
            if (empty($session_id)) {
                $session_id = Session::getId();
                Session::put('session_id', $session_id);
            }
            if (Auth::check()) {
                //user logged in
                //check if product is already exists in User cart
                $countProducts = SecondCart::where(['product_id' => $data['product_id'], 'user_id' => Auth::user()->id])->count();
            } else {
                //user is not logged in
                $countProducts = SecondCart::where(['product_id' => $data['product_id'], 'session_id' => Session::get('session_id')])->count();
            }
            if ($countProducts > 0) {
                $message = "Product already exists in cart ";
                Session::flash('error_message', $message);
                return redirect()->back();
            }

            if (Auth::check()) {
                $user_id = Auth::user()->id;
            } else {
                $user_id = 0;
            }

            //save product in cart

            $cart = new SecondCart();
            $cart->session_id = $session_id;
            $cart->user_id = $user_id;
            $cart->product_id = $data['product_id'];

            $cart->quantity = $data['demo_vertical'];
            $cart->save();
            $message = "Product has been added to cart ";
            Session::flash('success_message', $message);
            return redirect('cart');
        }
    }
    public function cart()
    {
        $userCartItems = Cart::userCartItems();
        //    echo "<pre>" ; print_r($userCartItems); die;
        $user_cart_items = SecondCart::userSecondCartItems();
        //    echo "Cart items details : <br> <br>";
        //    echo "<pre>" ; print_r($userCartItems); echo "<br> <br>";
        //    echo "Cart items details : <br> <br>";
        //    echo "<pre>" ; print_r($user_cart_items); die;


        return view('frontend.products.cart')->with(compact('userCartItems', 'user_cart_items'));
    }

    public function updateCartItemQty(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"  ; print_r($data); die;
            // //Get cart details
            // $cartDetails= Cart::find($data['cartid']);

            // //Get available product stock
            // $availableStock = ProductsAttribute::select('stock')->where(['product_id' => $cartDetails['product_id'] , 'size' => $cartDetails['size']])->first()->toArray();

            // // echo "Demanded stock : ".$data['qty'];
            // // echo "<br>";
            // // echo "Available stock : " . $availableStock['stock']; die;

            // //check stock is avaialable or not
            // if($data['qty'] >  $availableStock['stock'] ){
            //     $userCartItems = Cart::userCartItems();
            //     return response()->json([
            //         'status' => false,
            //         'message' => 'Product stock is not available',
            //         'view' =>(String)View::make('frontend.products.cart-items')->with(compact('userCartItems'))
            //     ]);
            // }

            // //check size is available or not
            // $availableSize = ProductsAttribute::where(['product_id' => $cartDetails['product_id'] , 'size' => $cartDetails['size'] , 'status' => 1])->count();
            // if ($availableSize == 0) {
            //     $userCartItems = Cart::userCartItems();
            //     return response()->json([
            //         'status' => false,
            //         'message' => 'Product size is not available',
            //         'view' =>(String)View::make('frontend.products.cart-items')->with(compact('userCartItems'))
            //     ]);
            // }

            Cart::where('id', $data['cartid'])->update(['quantity' => $data['qty']]);
            $userCartItems = Cart::userCartItems();
            SecondCart::where('id', $data['cartid'])->update(['quantity' => $data['qty']]);
            $user_cart_items = SecondCart::userSecondCartItems();
            return response()->json([
                'status' => true,
                'view' => (string)View::make('frontend.products.cart-items')->with(compact('userCartItems', 'user_cart_items'))
            ]);
        }
    }

    public function deleteCartItem(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            // echo "<pre>" ;
            // print_r($data); die;
            Cart::where('id', $data['cartid'])->delete();
            $userCartItems = Cart::userCartItems();
            SecondCart::where('id', $data['cartid'])->delete();
            $user_cart_items = SecondCart::userSecondCartItems();
            return response()->json([

                'view' => (string)View::make('frontend.products.cart-items')->with(compact('userCartItems', 'user_cart_items'))
            ]);
        }
    }

    // public function deleteCartItem($id)
    // {
    //     Cart::where('id' , $id)->delete();
    //    $message = "Item has been deleted successfully";
    //    return redirect()->back()->with('success_message' , $message);
    // }



    public function cartCount()
    {
        $fashion_cart_count = Cart::where('user_id', Auth::id())->count();
        $second_cart_count = SecondCart::where('user_id', Auth::id())->count();
        if ($fashion_cart_count > 0 && $second_cart_count > 0) {
            $cart_count = $fashion_cart_count + $second_cart_count;
        } else if ($second_cart_count > 0 && $fashion_cart_count == 0) {
            $cart_count = $second_cart_count;
        } else if ($fashion_cart_count > 0 && $second_cart_count == 0) {
            $cart_count = $fashion_cart_count;
        } else {
            $cart_count = 0;
        }
        return response()->json(['cart_count' => $cart_count]);
    }
}
