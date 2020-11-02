<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;
class AdShow extends Controller
{
    function index(){
        $allAds = DB::select('select * from ad_posts');
        return view('admin.ads.all-ads',['allAds'=>$allAds]);
    }
    
    function AddToPaid(){
        $allAds = DB::select('select * from ad_posts');
        return view('admin.ads.add-to-paid',['allAds'=>$allAds]);
    }
    function update(Request $r,$id){
        $ad_validity = $r->input('add-to-paid');
        $status = 'paid';

        $ad_end = date('Y-m-d H:i:s', strtotime("+$ad_validity days") );

        DB::update('update ad_posts set ad_end = ?, status = ? where id = ?', [$ad_end,$status,$id]);
        Session::flash('msg',"Ad added to paid successfully for $ad_validity days !!");
        return redirect()->back();
    }
    function paidAds(){
        $allAds = DB::select('select * from ad_posts');
        return view('admin.ads.paid-ads',['allAds'=>$allAds]);
    }
    function active(){
        $allAds = DB::select('select * from ad_posts');
        return view('admin.ads.active',['allAds'=>$allAds]);
    }
    function deactivated(){
        $allAds = DB::select('select * from ad_posts');
        return view('admin.ads.deactivated-ads',['allAds'=>$allAds]);
    }



    function destroy($id){
        DB::DELETE("DELETE FROM ad_posts WHERE id=?",[$id]);
        Session::flash('msg','Ad delete success !');
        return redirect()->back();
    }
}
