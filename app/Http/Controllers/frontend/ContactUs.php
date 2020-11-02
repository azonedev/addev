<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
class ContactUs extends Controller
{
    function index(){
        $category = DB::SELECT("SELECT * FROM category");
        $settingData = DB::SELECT("SELECT * FROM settings LIMIT 1");

        return view("frontend.contact-us",
                [
                    'category' => $category,
                    'settingData' => $settingData,
                ]
            );
    }

    function store(Request $r){

        $name = $r->input('name');
        $email = $r->input('email');
        $phone = $r->input('phone');
        $subject = $r->input('subject');
        $message = $r->input('message');
       
        DB::INSERT(
            " INSERT INTO messages(
                name,
                email,
                phone,
                subject,
                message)
            VALUES(?,?,?,?,?)
            ",
            [
                $name,
                $email,
                $phone,
                $subject,
                $message
            ]
        );

        Session::flash('msg','Your message send successfully ! Please, Wait for the response');
        return redirect()->back();
    }
}
