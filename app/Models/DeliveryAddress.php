<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DeliveryAddress extends Model
{
    use HasFactory;
    public static function delivery_addresses()
    {
        $user_id = Auth::user()->id;
        $delivery_addresses = DeliveryAddress::where('user_id' , $user_id)->get()->toArray();
        return $delivery_addresses;
    }
}
