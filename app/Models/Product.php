<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function section()
    {
        return $this->belongsTo('App\Models\Section' , 'section_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category' , 'category_id');
    }

    //product and brand relation  to display product at front with brand
    public function brand()
    {
        return $this->belongsTo('App\Models\Brand' , 'brand_id');
    }
    public function attributes()
    {
        return $this->hasMany('App\Models\ProductsAttribute');
    }

    public function images()
    {
        return $this->hasMany('App\Models\ProductsImage');
    }

    //calculate product price with discount
     public static function getDiscountedPrice($product_id)
     {
        $proDetails = Product::select('original_price' , 'product_discount' , 'category_id')->where('id' , $product_id)->first();
        $proDetails = json_decode(json_encode($proDetails) , true);
        $catDetails = Category::select('category_discount')->where('id' , $proDetails['category_id'])->first();
        $catDetails = json_decode(json_encode($catDetails) , true);

        //check wheather product discount is there or not
        if ($proDetails['product_discount'] > 0) {
            // If product discount is added from the admin panel
            $discounted_price = $proDetails['original_price'] - ( $proDetails['original_price'] * $proDetails['product_discount']/100);
        }
        else if ($catDetails['category_discount'] > 0 ) {
            // If product discount is not added but category discount added from the admin panel
            $discounted_price = $proDetails['original_price'] - ( $proDetails['original_price'] * $catDetails['category_discount']/100);

        }
        else {
            $discounted_price = 0;

        }
        return $discounted_price;


    }

    //get discounted price for cart page

public static function getDiscountedPriceforCart($product_id)
     {
        $proDetails = Product::select('original_price' , 'product_discount' , 'category_id')->where('id' , $product_id)->first();
        $proDetails = json_decode(json_encode($proDetails) , true);
        $catDetails = Category::select('category_discount')->where('id' , $proDetails['category_id'])->first();
        $catDetails = json_decode(json_encode($catDetails) , true);

        //check wheather product discount is there or not
        if ($proDetails['product_discount'] > 0) {
            // If product discount is added from the admin panel
            $discounted_price = $proDetails['original_price'] - ( $proDetails['original_price'] * $proDetails['product_discount']/100);

            $discount = $proDetails['original_price'] - $discounted_price;
        }
        else if ($catDetails['category_discount'] > 0 ) {
            // If product discount is not added but category discount added from the admin panel
            $discounted_price = $proDetails['original_price'] - ( $proDetails['original_price'] * $catDetails['category_discount']/100);
            $discount = $proDetails['original_price'] - $discounted_price;
        }
        else {
            $discount = 0;
            $discounted_price = $proDetails['original_price'];
        }
        //return $discounted_price;
        return array('original_price' => $proDetails['original_price'] , 'discounted_price' =>  $discounted_price , 'discount' =>$discount );


    }
    // function for get discounted price over the size of the product
     public static function getDiscountedAttrPrice($product_id , $size)
     {
      $proAttrPrice = ProductsAttribute::where(['product_id' => $product_id , 'size' => $size ])->first()->toArray();
      $proDetails = Product::select( 'product_discount' , 'category_id')->where('id' , $product_id)->first();
      $proDetails = json_decode(json_encode($proDetails) , true);
      $catDetails = Category::select('category_discount')->where('id' , $proDetails['category_id'])->first();
      $catDetails = json_decode(json_encode($catDetails) , true);

       //check wheather product discount is there or not
       if ($proDetails['product_discount'] > 0) {
        // If product discount is added from the admin panel
        $final_price = $proAttrPrice['original_price'] - ( $proAttrPrice['original_price'] * $proDetails['product_discount']/100);

        $discount = $proAttrPrice['original_price'] - $final_price;
    }
    else if ($catDetails['category_discount'] >0 ) {
        // If product discount is not added but category discount added from the admin panel
        $final_price = $proAttrPrice['original_price'] - ( $proAttrPrice['original_price'] * $catDetails['category_discount']/100);

        $discount = $proAttrPrice['original_price'] - $final_price;
    }
    else {
        $final_price = $proAttrPrice['original_price'];
        $discount = 0;

    }
    return array('product_price' => $proAttrPrice['original_price'] , 'final_price' =>  $final_price , 'discount' =>$discount );

     }


}
