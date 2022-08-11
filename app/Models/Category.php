<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function section()
    {
        return $this->belongsTo('App\Models\Section' , 'section_id')->select('id' , 'name');

    }

    public function collection_section()
    {
        return $this->belongsTo('App\Models\Section' , 'section_id');

    }
    public function parentcategory()
    {
        return $this->belongsTo('App\Models\Category' , 'parent_id')->select('id' , 'category_name');

    }
    public function subcategories()
    {
        return $this->hasMany('App\Models\Category' , 'parent_id')->where('status' , 1);

    }

    //brands
    public function brands()
    {
        return $this->hasMany('App\Models\Brand');
    }

    //function to show categories at front
    public static function catDetails($category_url)
    {
        $catDetails = Category::select('id' , 'parent_id' , 'category_name' , 'category_url' , 'category_discription' , 'category_discount' )->with(['subcategories' =>
            function($query){
                $query->select('id' , 'parent_id'  , 'category_name' , 'category_url' , 'category_discription')->where('status' , '1');
            }
        ])->where('category_url' , $category_url)->first()->toArray();
        //dd($catDetails);

        //add breadcrumbs in product listing page
        if ($catDetails['parent_id'] == 0) {
            //Only show the main category  in breadcrumb
            $breadcrumbs = '<a href = " '.url($catDetails['category_url']).' " >' .$catDetails['category_name']. '</a>';
        }
        else {
            //Show main and subcategory in breadcrumb
            $parent_category = Category::select('category_name' , 'category_url')->where('id' , $catDetails['parent_id'])->first()->toArray();
            $breadcrumbs = '<a href = " '.url($parent_category['category_url']).' " >' .$parent_category['category_name']. '</a> &nbsp;<span class ="breadcrumb-divider">/</span>&nbsp; <a href = " '.url($catDetails['category_url']).' " >' .$catDetails['category_name']. '</a>' ;
        }

        $catIds = array();
        $catIds[] = $catDetails['id'];
        foreach ($catDetails['subcategories'] as $key => $subcat) {
            $catIds[] = $subcat['id'];
        }
        //dd($catIds);
        return array('catIds' => $catIds , 'catDetails' => $catDetails , 'breadcrumbs' => $breadcrumbs);
    }
}
