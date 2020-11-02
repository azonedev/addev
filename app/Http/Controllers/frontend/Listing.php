<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class Listing extends Controller
{
        function index(){
        $category = DB::SELECT("SELECT * FROM category");
        $settingData = DB::SELECT("SELECT * FROM settings LIMIT 1");
        $ad = DB::SELECT("SELECT * FROM ad_posts ORDER BY id DESC");
        return view('frontend.all-ads',
            [
                'category' => $category,
                'settingData'       => $settingData,
                'allAd' =>$ad
            ]
        );
    }
}
