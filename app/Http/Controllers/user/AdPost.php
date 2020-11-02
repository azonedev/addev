<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DateTime;
use DateTimeZone;
use DB;

class AdPost extends Controller
{
    
    public function index()
    {
       $category = DB::SELECT("SELECT * FROM category");
       $settingData = DB::SELECT("SELECT * FROM settings LIMIT 1");
       return view("user.ad-post",
            [
                'category' => $category,
                'settingData'       => $settingData
            ]
        );
    }

    public function store(Request $r)
    {
        $ad_title = $r->input('ad_title');
        $price = $r->input('price');
        $price_negotiable = $r->input('price_negotiable');
        $no_price = $r->input('no_price');
        $contact = $r->input('contact');
        $address = $r->input('address');

        $city = $r->input('city');
        $state = $r->input('state');
        $country = $r->input('country');
        $zip = $r->input('zip');

        $location = "$city, $state, $country - Zip Code: $zip";

        $category = $r->input('category');
        $tags = $r->input('tags');

        $feature_image_file = $r->file('feature_image');
        if($feature_image_file==Null){
            $feature_image = "assets/admin/img/ad/default.webp";
        }else{
            // feature_image
            $image_name = time() . '.' . $feature_image_file->getClientOriginalExtension();
            $destinationPath = public_path('assets/admin/img/ad');
            $feature_image_file->move($destinationPath, $image_name);
            $feature_image = 'assets/admin/img/ad/' . $image_name;
        }
        // image gallery
        $gallery_img = $r->images;

        if($gallery_img!=NULL){
            for ($i = 0; $i < count($gallery_img); $i++) {

                $images = $r->images;
                $image = $images[$i];

                $name = time() . $i . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('assets/admin/img/ad');
                $image->move($destinationPath, $name);
                $gallery_image[$i] = 'assets/admin/img/ad/' . $name;
            }
            
            $image_gallery = json_encode($gallery_image);
        }else{
            $image_gallery = NULL;
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
        DB::INSERT("
            INSERT INTO ad_posts(
                ad_title,
                price,
                price_negotiable,
                no_price,
                contact,
                address,
                location,
                category,
                tags,
                image,
                image_gallery,
                product_details,
                ad_validity,
                user_id,
                ad_start,
                ad_end
            )
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
        ",[
            $ad_title,
            $price,
            $price_negotiable,
            $no_price,
            $contact,
            $address,
            $location,
            $category,
            $tags,
            $feature_image,
            $image_gallery,
            $product_details,
            $ad_validity,
            $user_id,
            $ad_start,
            $ad_end
        ]);

        $r->session()->flash('msg', 'Ad posts successfully !');
        return redirect('user/ad-post');

    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        
    }


    public function update(Request $request, $id)
    {
        
    }


    public function destroy($id)
    {
        
    }
}
