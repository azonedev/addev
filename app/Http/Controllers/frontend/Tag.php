<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class Tag extends Controller
{
    function index($tag){
        $category = DB::SELECT("SELECT * FROM category");
        $settingData = DB::SELECT("SELECT * FROM settings LIMIT 1");
        $ad = DB::SELECT("SELECT * FROM ad_posts WHERE tags LIKE '%$tag%' ORDER BY id DESC");
        return view('frontend.tags',
            [
                'category' => $category,
                'settingData'       => $settingData,
                'tagData' =>$ad,
                'tag'=>$tag

            ]
        );
    }
}
