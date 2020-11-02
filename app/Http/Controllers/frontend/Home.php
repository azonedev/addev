<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class Home extends Controller
{
    
    public function index()
    {       
        $category = DB::SELECT("SELECT * FROM category");
        $settingData = DB::SELECT("SELECT * FROM settings LIMIT 1");
        $top_cat =  DB::SELECT("SELECT * FROM category ORDER BY id DESC LIMIT 9");

        $paid_ad = DB::SELECT(
            "SELECT * FROM ad_posts
            WHERE status=?
            ORDER BY id DESC
            ",
            [
                "paid"
            ]
        );

        $latest_3 = DB::SELECT(
            "SELECT * FROM ad_posts
            ORDER BY id DESC
            LIMIT 3
            "
        );
        $latest_7 = DB::SELECT(
            "SELECT * FROM ad_posts
            ORDER BY id DESC
            LIMIT 7
            "
        );
        $latest_4 = DB::SELECT(
            "SELECT * FROM ad_posts
            ORDER BY id DESC
            LIMIT 4
            "
        );

        // cat data
        $section_cat = DB::SELECT("SELECT * FROM section_setting LIMIT 1");
        foreach($section_cat as $cat){
            $cat_1 = $cat->section_1;
            $cat_2 = $cat->section_2;
            $cat_3 = $cat->section_3;
            $cat_4 = $cat->section_4;
            $cat_5 = $cat->section_5;
            $cat_6 = $cat->section_6;
        }
        // section data
        $section_1 = DB::SELECT(
            "SELECT * FROM ad_posts
            WHERE category=?
            ORDER BY id DESC
            LIMIT 4",
            [
                $cat_1
            ]
        );
        $section_2 = DB::SELECT(
            "SELECT * FROM ad_posts
            WHERE category=?
            ORDER BY id DESC
            LIMIT 6",
            [
                $cat_2
            ]
        );
        $section_3_1 = DB::SELECT(
            "SELECT * FROM ad_posts
            WHERE category=?
            ORDER BY id DESC
            LIMIT 4",
            [
                $cat_3
            ]
        );
        $section_3_2 = DB::SELECT(
            "SELECT * FROM ad_posts
            WHERE category=?
            ORDER BY id DESC
            LIMIT 2 OFFSET 4",
            [
                $cat_3
            ]
        );
        
        $section_4 = DB::SELECT(
            "SELECT * FROM ad_posts
            WHERE category=?
            ORDER BY id DESC
            LIMIT 4",
            [
                $cat_4
            ]
        );
        
        $section_5 = DB::SELECT(
            "SELECT * FROM ad_posts
            WHERE category=?
            ORDER BY id DESC
            LIMIT 3",
            [
                $cat_5
            ]
        );
        
        $section_6 = DB::SELECT(
            "SELECT * FROM ad_posts
            WHERE category=?
            ORDER BY id DESC
            LIMIT 4",
            [
                $cat_6
            ]
        );
        return view("frontend.home",
                [
                    'category' => $category,
                    'settingData' => $settingData,
                    'top_cat' =>$top_cat,
                    'paid' =>$paid_ad,
                    'latest_3'=>$latest_3,
                    'latest_7'=>$latest_7,
                    'latest_4'=>$latest_4,
                    'cat_1'=>$cat_1,
                    'cat_2'=>$cat_2,
                    'cat_3'=>$cat_3,
                    'cat_4'=>$cat_4,
                    'cat_5'=>$cat_5,
                    'cat_6'=>$cat_6,
                    'section_1' =>$section_1,
                    'section_2' =>$section_2,
                    'section_3_1' =>$section_3_1,
                    'section_3_2' =>$section_3_2,
                    'section_4' =>$section_4,
                    'section_5' =>$section_5,
                    'section_6' =>$section_6,

                ]
            );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
