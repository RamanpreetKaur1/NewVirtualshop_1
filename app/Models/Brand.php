<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    //brand and category relation

    public function brand_category()
    {
        return $this->belongsTo('App\Models\Category' , 'category_id' , 'id');
    }
}
