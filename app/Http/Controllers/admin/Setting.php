<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;
class Setting extends Controller
{
    
    public function index()
    {
        $settingData = DB::SELECT("SELECT * FROM settings LIMIT 1");

        return view('admin.setting',
            [
                'settingData' => $settingData
            ]
        );
    }

    public function show($id)
    {
        //
    }


    public function update(Request $r, $id)
    {
        $favicon_file = $r->file('favicon');
        $logo_file = $r->file('logo');

        if( ($favicon_file && $logo_file) == NULL){
            $favicon = $r->input('prev_favicon');
            $logo = $r->input('prev_logo');
        }else{

            //  favicon
            $image_name = time() . '.' . $favicon_file->getClientOriginalExtension();
            $destinationPath = public_path('assets/admin/img/');
            $favicon_file->move($destinationPath, $image_name);
            $favicon = 'assets/admin/img/' . $image_name;

            // logo
            $image_name = time() . '.' . $logo_file->getClientOriginalExtension();
            $destinationPath = public_path('assets/admin/img/');
            $logo_file->move($destinationPath, $image_name);
            $logo = 'assets/admin/img/' . $image_name;

        }

        $footer_details = $r->input('footer_details');
        $location = $r->input('location');
        $location_link = $r->input('location_link');
        $phone = $r->input('phone');
        $email = $r->input('email');
        $youtube_link = $r->input('youtube_link');
        $facebook_link = $r->input('facebook_link');
        $twitter_link = $r->input('twitter_link');
        $copyright = $r->input('copyright');

        DB::update('update settings 
            set 
                favicon = ?,
                logo = ?,
                footer_details=?,
                location = ?,
                location_link = ?,
                phone = ?,
                email = ?,
                youtube_link = ?,
                facebook_link = ?,
                twitter_link = ?,
                copyright = ?

            where id = ?', 
            [
                $favicon,
                $logo,
                $footer_details,
                $location,
                $location_link,
                $phone,
                $email,
                $youtube_link,
                $facebook_link,
                $twitter_link,
                $copyright,
                $id
            ]
        );

        Session::flash('msg', "Setting data updated successfully !");

        return redirect('admin/setting');

    }


}
