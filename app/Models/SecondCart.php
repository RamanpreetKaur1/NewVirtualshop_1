<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class SecondCart extends Model
{
    use HasFactory;
    public static function userSecondCartItems()
    {
        if (Auth::check()) {
            $userCartItems = SecondCart::with(['product' => function($query){
                $query->select('id' , 'product_name' , 'product_code' , 'product_image' , 'product_color' , 'original_price');
            }])->where('user_id' , Auth::user()->id)->orderBy('id' , 'Desc')->get()->toArray();
        } else {
            $userCartItems = SecondCart::with(['product' => function($query){
                $query->select('id' , 'product_name' , 'product_code' , 'product_image' , 'product_color' , 'original_price');
            }])->where('session_id' , Session::get('session_id'))->orderBy('id' , 'Desc')->get()->toArray();
        }
        return $userCartItems;
    }

    //cart and product relation
    public function product()
    {
        return $this->belongsTo('App\Models\Product' , 'product_id');
    }
}
