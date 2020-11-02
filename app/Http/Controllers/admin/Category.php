<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
class Category extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $category = DB::SELECT("SELECT * FROM category");
        return view("admin.category.category",
            [
                'category' => $category
            ]
        );
    }


    public function store(Request $r)
    {
        $cat_name = $r->input('cat-name');
        $cat_icon = $r->input('cat-icon');
        $feature_image_file = $r->file('cat-image');
        
        $feature_image_file;
        
         // cat_image
        $image_name = time() . '.' . $feature_image_file->getClientOriginalExtension();
        $destinationPath = public_path('assets/admin/img/category');
        $feature_image_file->move($destinationPath, $image_name);
        $cat_image = 'assets/admin/img/category/' . $image_name;

        DB::INSERT(
            "INSERT INTO category(
                cat_name,
                cat_image,
                cat_icon
            ) VALUES(?,?,?)",
            [
                $cat_name,
                $cat_image,
                $cat_icon
            ]
        );

        Session::flash('msg','Category added success !');
        return redirect("/admin/category");
    }


    public function edit($id)
    {
        $category = DB::SELECT("SELECT * FROM category");

        $edit_cat = DB::SELECT("SELECT * FROM category WHERE id =$id");

        return view("admin.category.edit-category",
            [
                'category' => $category,
                'edit_cat' => $edit_cat
            ]
        );
    }

    public function update(Request $r, $id)
    {
        $cat_name = $r->input('cat-name');
        $cat_icon = $r->input('cat-icon');
        $feature_image_file = $r->file('cat-image');
        
       if($feature_image_file!=NULL){
             // cat_image
            $image_name = time() . '.' . $feature_image_file->getClientOriginalExtension();
            $destinationPath = public_path('assets/admin/img/category');
            $feature_image_file->move($destinationPath, $image_name);
            $cat_image = 'assets/admin/img/category/' . $image_name;

            DB::UPDATE(
                "UPDATE category
                SET cat_name = ?,
                    cat_image = ?,
                    cat_icon = ?
                WHERE id = ?
                ",
                [
                    $cat_name,
                    $cat_image,
                    $cat_icon,
                    $id
                ]
            );

            Session::flash('msg','Category updated successfully !');
            return redirect("/admin/category");

       }else{
        DB::UPDATE(
            "UPDATE category
            SET cat_name = ?,
                cat_icon = ?
            WHERE id = ?
            ",
            [
                $cat_name,
                $cat_icon,
                $id
            ]
        );

        Session::flash('msg','Category updated successfully !');
        return redirect("/admin/category");
       }
        
         

    }

    public function destroy($id)
    {
        DB::DELETE(
            "DELETE FROM category 
                WHERE id = ?
            ",
            [
                $id
            ]
        );

        Session::flash('msg','A category delete done');
        Return redirect()->back();
        
    }
}
