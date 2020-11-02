<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;
class SectionSettings extends Controller
{
    function index(){
        $category = DB::SELECT("SELECT cat_name FROM category");
        $selected = DB::SELECT("SELECT * FROM section_setting");
        return view('admin.section-settings',
            [
                'category'=>$category,
                'selected_section' =>$selected
            ]
        );
    }

    function update(Request $r){
        $section_1 = $r->input('section_1');
        $section_2 = $r->input('section_2');
        $section_3 = $r->input('section_3');
        $section_4 = $r->input('section_4');
        $section_5 = $r->input('section_5');
        $section_6 = $r->input('section_6');
        DB::UPDATE(
            "UPDATE section_setting
                SET
                    section_1=?,
                    section_2=?,
                    section_3=?,
                    section_4=?,
                    section_5=?,
                    section_6=?
                WHERE 
                    id = ?
            ",
            [
                $section_1,
                $section_2,
                $section_3,
                $section_4,
                $section_5,
                $section_6,
                '1'
            ]
        );

        Session::flash('msg','Section category updated successfully !');

        Return redirect('/admin/section-settings');

    }
}
