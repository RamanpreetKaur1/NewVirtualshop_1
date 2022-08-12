<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Country;
use App\Models\DeliveryAddress;
use App\Models\SecondCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    //checkout

    public function checkout(Request $request)
    {


        $userCartItems = Cart::userCartItems(); //for fashion_category products
        $user_cart_items = SecondCart::userSecondCartItems(); //for all other categories
        //get delivery addresses
        $delivery_addresses = DeliveryAddress::delivery_addresses();
        $countries = Country::where('status', 1)->get()->toArray();

        return view('frontend.products.checkout')->with(compact('userCartItems', 'user_cart_items', 'delivery_addresses', 'countries'));
    }


    public function add_delivery_address(Request $request)
    {
        if (isset($_POST['save'])) {
            // $data = $request->all();
            // echo "<pre>";
            // echo print_r($data);
            // die;

        if ($request->isMethod('post')) {
            $data = $request->all();
            //    echo "<pre>" ;
            //    echo print_r($data); die;
            $request->validate([
                'name'  => 'required',
                'address'  => 'required',
                'city'  => 'required',
                'state'  => 'required',
                'country'  => 'required',
                'pincode'  => 'required|numeric',
                'mobile'   => 'required|numeric',
            ]);
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

            return redirect()->back()->with('success_message', 'Your address has been saved successfully');
        }
    }
    }


    public function edit_delivery_address($id)
    {

        $edit_delivery_address = DeliveryAddress::find($id)->toArray();
        //echo "<pre>" ; print_r($edit_delivery_address); die;
        $userCartItems = Cart::userCartItems(); //for fashion_category products
        $user_cart_items = SecondCart::userSecondCartItems(); //for all other categories
        //get delivery addresses
        $delivery_addresses = DeliveryAddress::delivery_addresses();
        $countries = Country::where('status', 1)->get()->toArray();


        return view('frontend.products.checkout')->with(compact('edit_delivery_address', 'userCartItems', 'user_cart_items', 'delivery_addresses', 'countries'));
    }

    public function update_delivery_address(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>" ; print_r($data); die;
            $edit_delivery_address = DeliveryAddress::find($id);
            $edit_delivery_address->user_id = Auth::user()->id;
            $edit_delivery_address->name = $data['name'];
            $edit_delivery_address->address = $data['address'];
            $edit_delivery_address->city = $data['city'];
            $edit_delivery_address->state = $data['state'];
            $edit_delivery_address->country = $data['country'];
            $edit_delivery_address->pincode = $data['pincode'];
            $edit_delivery_address->mobile = $data['mobile'];
            $edit_delivery_address->status = 1;
            $edit_delivery_address->update();

            return redirect()->back()->with('success_message', 'Your address has been updated successfully');
        }
    }


    public function delete_delivery_address($id)
    {
        DeliveryAddress::where('id', $id)->delete();
        return redirect()->back()->with('success_message', 'Your address has been deleted successfully');
    }


    public function cart_checkout(Request $request)
    {
        if (isset($_POST['proceed_to_shopping'])) {

            $data = $request->all();
            // echo Session::get('grand_total');
            // echo "<pre>";   echo print_r($data);     die;

            if (empty($data['delivery_address'])) {
               $msg = "Please select Delivery  Address";
               Session::flash('error_message' , $msg);
               return redirect()->back();

            }
            if (empty($data['payment_methods'])) {
                $msg = "Please select payment Method";
                Session::flash('error_message' , $msg);
                return redirect()->back();

             }
 echo "<pre>";   echo print_r($data);     die;

        }
    }
}
