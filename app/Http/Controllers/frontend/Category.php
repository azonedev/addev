<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class Category extends Controller
{
    function index(){
        
        $category = DB::SELECT("SELECT * FROM category");
        $all_category = DB::SELECT("SELECT * FROM category ");
        $settingData = DB::SELECT("SELECT * FROM settings LIMIT 1");

       return view("frontend.all-category",
            [
                'category' => $category,
                'all_category'       => $all_category,
                'settingData'       => $settingData
            ]
        );
    }
    function categoryAds($name){
        $category = DB::SELECT("SELECT * FROM category");
        $categoryData = DB::SELECT("SELECT * FROM ad_posts WHERE category=?",[$name]);
        $settingData = DB::SELECT("SELECT * FROM settings LIMIT 1");

       return view("frontend.single-category",
            [
                'category' => $category,
                'categoryData'       => $categoryData,
                'settingData'       => $settingData,
                'name'=>$name
            ]
        );
    }
}
