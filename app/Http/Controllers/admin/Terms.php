<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;
class Terms extends Controller
{
    
    public function index()
    {
        $termsData = DB::SELECT("SELECT * FROM terms LIMIT 1");

        return view('admin.terms',
            [
                'termsData' => $termsData
            ]
        );
    }

    public function show()
    {
        $termsData = DB::SELECT("SELECT * FROM terms LIMIT 1");
        $settingData = DB::SELECT("SELECT * FROM settings LIMIT 1");
        $category = DB::SELECT("SELECT * FROM category");
        return view('frontend.terms',
            [
                'termsData' => $termsData,
                'category'  => $category,
                'settingData'  => $settingData 
            ]
        );
    }

    public function update(Request $r, $id)
    {
        $details = $r->input('details');
        DB::update('update terms 
            set 
                details = ?
            where id = ?', 
            [
                $details,
                $id
            ]
        );

        Session::flash('msg', "Terms data updated successfully !");

        return redirect('admin/terms');
    }

  
}
