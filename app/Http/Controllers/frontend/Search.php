<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class Search extends Controller
{
    function index(Request $r){
        $location = $r->input('location');
        $categoryValue = $r->input('category');
        $keyword = $r->input('keyword');
        
        $category = DB::SELECT("SELECT * FROM category");
        $settingData = DB::SELECT("SELECT * FROM settings LIMIT 1");

        
        $searchData = DB::SELECT(
            "SELECT * FROM ad_posts 
            WHERE 
                category LIKE '$categoryValue'
            AND
                location LIKE '%$location%' 
            AND
                ad_title LIKE '%$keyword%' OR tags LIKE '%$keyword%'
            ORDER BY id DESC"
        );

        return view('/frontend/search-result',
            [
                "searchData" =>$searchData,
                'category' => $category,
                'settingData'       => $settingData,
                'keyword'   =>$keyword
            ]
        );
    }
}
