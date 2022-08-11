<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        //to display banner slider
        $sliderbanners = Banner::where('type' ,'Slider')->where('status' , '1')->get()->toArray();
        $fixbanners = Banner::where('type' ,'Fix')->where('status' , '1')->get()->toArray();
        //dd($fixbanners);
        //to display trending products
        $trending_products = Product::where('trending' , 'Yes')->take('15')->get()->toArray();

        //to display Popular categories
        $popular_categories = Category::where('popular_categories' , 'Yes')->take('15')->get();

        //New arrival products
        $new_arrival_products = Product::orderby('id' , 'Desc')->limit(8)->get()->toArray();
        //dd($new_arrival_products);

        $bestseller = Product::where(['is_bestseller' => 'Yes' , 'status' =>'1'])->inRandomOrder()->get()->toArray();
        //dd($bestseller);


        //show the only those products on which have some discount
        $discounted_products = Product::where('product_discount' ,'>' ,  0 )->where('status' , '1')->limit(10)->inRandomOrder()->get()->toArray();
        //dd($discounted_products);

        //featured products
        $featured_products = Product::where(['is_featured' => 'Yes' , 'status' =>  1])->limit(30)->get()->toArray();
        //dd($featured_products);
        return view('frontend.index')->with(compact('sliderbanners' , 'fixbanners', 'trending_products' , 'popular_categories', 'new_arrival_products' , 'bestseller' , 'discounted_products' , 'featured_products'));
    }

    public function allCategories()
    {
        $categories = Category::where('status' , '1')->where('parent_id' , '0')->get();
        return view('frontend.category')->with(compact('categories'));
    }


    // public function logout()

    // {
    //     Auth::logout();
    //     return redirect('/');
    // }

}
