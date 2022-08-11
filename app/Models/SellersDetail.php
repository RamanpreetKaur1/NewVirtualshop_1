<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellersDetail extends Model
{
    use HasFactory;
    //seller and plan relation
    public function plans()
    {
        return $this->belongsTo('App\Models\Plan' , 'plan_id' , 'id');
    }
}
