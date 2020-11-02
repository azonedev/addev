<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;
class AboutUs extends Controller
{
    
    public function index()
    {   
        $aboutData = DB::SELECT("SELECT * FROM about_us LIMIT 1");

        return view('admin.about-us',
            [
                'aboutData' => $aboutData
            ]
        );
    }

    public function show()
    {
        $aboutData = DB::SELECT("SELECT * FROM about_us LIMIT 1");
        $settingData = DB::SELECT("SELECT * FROM settings LIMIT 1");
        $category = DB::SELECT("SELECT * FROM category");
        return view('frontend.about-us',
            [
                'aboutData' => $aboutData,
                'category'  => $category ,
                'settingData'  => $settingData 
            ]
        );
    }

    public function update(Request $r,$id)
    {
        $details = $r->input('details');
        $prev_img = $r->input('prev_img');

        $feature_image_file = $r->file('image');


        if($feature_image_file==Null){
            $image = $prev_img;
        }else{
            // feature_image
            $image_name = time() . '.' . $feature_image_file->getClientOriginalExtension();
            $destinationPath = public_path('assets/admin/img/');
            $feature_image_file->move($destinationPath, $image_name);
            $image = 'assets/admin/img/' . $image_name;
        }

        DB::update('update about_us 
            set 
                details = ?,
                image = ? 
            where id = ?', 
            [
                $details,
                $image,
                $id
            ]
        );

        Session::flash('msg', "About us data updated successfully !");

        return redirect('admin/about-us');
        
        
    }

}
