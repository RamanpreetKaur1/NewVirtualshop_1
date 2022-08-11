<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    //plan and seller relation
    public function seller_plan()
    {
        return $this->belongsTo('App\Models\SellersDetail' , 'id' , 'seller_id');
    }
}
