<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DateTime;
use DateTimeZone;
use DB;
class MyAccount extends Controller
{
    function index(){
        $id = Session('user_id');
        $category = DB::SELECT("SELECT * FROM category");
        $settingData = DB::SELECT("SELECT * FROM settings LIMIT 1");
        $userData = DB::SELECT("SELECT * FROM users WHERE id=?",[$id]);
        return view("user.profile",[
            'category'=>$category,
            'settingData'=>$settingData,
            'userData'=>$userData
        ]);
    }

    function update(Request $r,$id){

        $name = $r->input('name');
        $email = $r->input('email');
        $mobile_no = $r->input('mobile_no');
        $password = $r->input('password');
        $addres = $r->input('address');

        DB::UPDATE("UPDATE users 
                SET 
                name = ?,
                mobile_no = ?,
                email = ?,
                password = ?,
                address = ?
                WHERE id = ?
            ",
                [
                    $name,
                    $mobile_no,
                    $email,
                    $password,
                    $addres,
                    $id
                ]
            );

        Session::flash('msg',"Your profile updated success !");
        return redirect('/user/profile');
    }

    function account(){

        $id = Session('user_id');
        $category = DB::SELECT("SELECT * FROM category");
        $settingData = DB::SELECT("SELECT * FROM settings LIMIT 1");
        $userData = DB::SELECT("SELECT * FROM ad_posts WHERE user_id=?",[$id]);
        return view("user.account",[
            'category'=>$category,
            'settingData'=>$settingData,
            'userData'=>$userData
        ]);
    }

    function editAccount($id){
        
        $category = DB::SELECT("SELECT * FROM category");
        $settingData = DB::SELECT("SELECT * FROM settings LIMIT 1");
        $editData = DB::select("SELECT * FROM ad_posts WHERE id=?", [$id]);

        return view('user.edit-post',
            [
                'category'=>$category,
                'settingData'=>$settingData,
                "editData" =>$editData
            ]
        );
    }

    function updateAccount(Request $r,$id){

        $ad_title = $r->input('ad_title');
        $price = $r->input('price');
        $price_negotiable = $r->input('price_negotiable');
        $no_price = $r->input('no_price');
        $contact = $r->input('contact');
        $address = $r->input('address');

        $location = $r->input('location');

        $category = $r->input('category');
        $prev_img = $r->input('prev_img');
        $feature_image_file = $r->file('feature_image');
        if($feature_image_file==Null){
            $feature_image = $prev_img;
        }else{
            // feature_image
            $image_name = time() . '.' . $feature_image_file->getClientOriginalExtension();
            $destinationPath = public_path('assets/admin/img/ad');
            $feature_image_file->move($destinationPath, $image_name);
            $feature_image = 'assets/admin/img/ad/' . $image_name;
        }

        
        $product_details = $r->input('product_details');
        if($product_details==NULL){
            $product_details = "There is no product details";
        }

        $ad_validity = $r->input('validity');
        
        $user_id = Session('user_id');

        // date & time
        date_default_timezone_set("America/New_York");
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone('America/Detroit'));
        $ad_start = $date->format('Y-m-d H:i:s');
        $ad_end = date('Y-m-d H:i:s', strtotime("+$ad_validity days") );

        // ad insert into database
        DB::UPDATE("
            UPDATE ad_posts
            SET
                ad_title = ?,
                price = ?,
                price_negotiable = ?,
                no_price = ?,
                contact = ?,
                address = ?,
                location = ?,
                category = ?,
                image = ?,
                product_details = ?,
                ad_validity = ?,
                ad_start = ?,
                ad_end = ?
            WHERE 
                id = ?
        ",[
            $ad_title,
            $price,
            $price_negotiable,
            $no_price,
            $contact,
            $address,
            $location,
            $category,
            $feature_image,
            $product_details,
            $ad_validity,
            $ad_start,
            $ad_end,
            $id
        ]);

        $r->session()->flash('msg', 'Ad posts updated successfully !');
        return redirect('/user/account');
    }

    function destroy($id){
        DB::DELETE('DELETE FROM ad_posts WHERE id =?',[$id]);
        Session::flash('msg','Your ad delete successfully !');

        return redirect('/user/account');
    }
}
