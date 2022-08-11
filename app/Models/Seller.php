<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    // public function sellerID()
    // {
    //     $seller_id = Seller::select('id')->first();
    //     return $seller_id;

    // }
    public function sellerID()
    {
        return $this->belongsTo('App\Models\SellersBusinessDetails' , 'seller_id' , 'id');
    }
}
