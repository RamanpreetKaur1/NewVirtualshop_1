<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function sectionView($section_url)
    {
        $section = Section::where('section_url' , $section_url)->first();
        $section_id = $section->id;

        $categories = Category::where('section_id' , $section_id)->where('status' , '!=' , '2')->where('status' , '1')->where('parent_id' , '0')->get();
        //dd($categories);
        return view('frontend.collection.category')->with(compact('categories'));
    }

    // public function categoryView($section_url , $category_url)
    // {
    //     $categories = Category::where('category_url' , $category_url)->first();
    //      $category_id = $categories->id;
    //     //dd($category_id);

    //      $subcategories = Category::where('parent_id' , '!=' , '0')->where('status' , '1')->where('status' , '!=' , '2')->get();
    //     // dd($subcategories);
    //     // return view('frontend.collection.sub_category')->with(compact('categories' , 'subcategories'));
    //  }


}
