<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\SecondCart;
use Illuminate\Support\Facades\Auth;

class SecondCartController extends Controller
{
    public function addToCart(Request $request)
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

    // public function cart()
    // {
    //     $user_Cart_Items = SecondCart::userCartItems();
    //    //echo "<pre>" ; print_r($user_Cart_Items); die;
    //     return view('frontend.products.cart')->with(compact('user_Cart_Items'));
    // }
}
