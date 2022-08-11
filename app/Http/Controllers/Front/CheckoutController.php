<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Country;
use App\Models\DeliveryAddress;
use App\Models\SecondCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
   //checkout

   public function checkout()
   {
       $userCartItems = Cart::userCartItems(); //for fashion_category products
       $user_cart_items = SecondCart::userSecondCartItems(); //for all other categories
       //get delivery addresses
       $delivery_addresses = DeliveryAddress::delivery_addresses();
       $countries = Country::where('status' , 1)->get()->toArray();

    return view('frontend.products.checkout')->with(compact('userCartItems' , 'user_cart_items' ,'delivery_addresses' , 'countries'));
   }


   public function add_delivery_address(Request $request)
   {
    if ($request->isMethod('post')) {
       $data = $request->all();
    //    echo "<pre>" ;
    //    echo print_r($data); die;
        $delivery_address = new DeliveryAddress();
        $delivery_address->user_id = Auth::user()->id;
        $delivery_address->name = $data['name'];
        $delivery_address->address = $data['address'];
        $delivery_address->city = $data['city'];
        $delivery_address->state = $data['state'];
        $delivery_address->country = $data['country'];
        $delivery_address->pincode = $data['pincode'];
        $delivery_address->mobile = $data['mobile'];
        $delivery_address->status = 1;
        $delivery_address->save();

        return redirect()->back()->with('success_message' , 'Your address has been saved successfully');
    }
   }
   public function edit_delivery_address($id)
   {
    $edit_delivery_address = DeliveryAddress::find($id);
    echo "<pre>" ; print_r($edit_delivery_address); die;
    return view('frontend.products.checkout')->with(compact('edit_delivery_address'));
   }
}
