<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
class Messages extends Controller
{
    function index(){
        $newMessages = DB::SELECT("SELECT * FROM messages WHERE status = ? ORDER BY id DESC ",["unread"]);
        return view('admin.messages.new-messages',
            [
                'newMessages' => $newMessages
            ]
        );
    }
    function single($id){
        $message = DB::SELECT("SELECT * FROM messages WHERE id = ?",[$id]);
        return view('admin.messages.message',
            [
                'message' => $message
            ]
        );
    }
    function update($id){
        DB::UPDATE('UPDATE messages SET status = ? WHERE id=? ',['read',$id]);
        Session::flash('msg','Message mark as read successfully !!!');
        return redirect('/admin/new-messages');
    }
    function create(){
        $allMessages = DB::SELECT("SELECT * FROM messages ORDER BY id DESC ");
        return view('admin.messages.all-messages',
            [
                'allMessages' => $allMessages
            ]
        );
    }

    function destroy($id){
        DB::DELETE('DELETE FROM messages WHERE id = ?',[$id]);
        Session::flash('msg','Message delete successfully !!!');
        return redirect('/admin/all-messages');
    }

}
