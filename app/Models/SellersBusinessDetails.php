<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellersBusinessDetails extends Model
{
    use HasFactory;

    public function categories()
    {
       return  $this->belongsTo('App\Models\Category' , 'category_id' ,  'id');
    }

    public function sellers()
    {
        return $this->belongsTo('App\Models\Seller' , 'id' , 'seller_id');
    }
}
