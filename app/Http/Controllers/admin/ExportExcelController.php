<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelController extends Controller
{
    function index(){
        $userData = DB::SELECT("SELECT * FROM users");
        return view('admin.export.user-data',
        [
            'userData'=>$userData
        ]);
    }
    
    // function userExport()
    // {
    //  $customer_data =  DB::SELECT("SELECT * FROM users");
    //  $customer_array[] = array('User Name', 'Mobile No', 'E-mail', 'Address', 'ad_count','role','created_date');
    //  foreach($customer_data as $customer)
    //  {
    //   $customer_array[] = array(
    //    'User Name'  => $customer->name,
    //    'Mobile No'   => $customer->mobile_no,
    //    'E-mail'    => $customer->email,
    //    'Address'  => $customer->address,
    //    'ad_count'   => $customer->ad_count,
    //    'role'   => $customer->role,
    //    'created_date'   => $customer->created_date
    //   );
    //  }
    //  Excel::create('User Data', function($excel) use ($customer_array){
    //   $excel->setTitle('User Data');
    //   $excel->sheet('User Data', function($sheet) use ($customer_array){
    //    $sheet->fromArray($customer_array, null, 'A1', false, false);
    //   });
    //  })->download('xlsx');
    // }
    function userExport(){
       $customer_data =  DB::SELECT("SELECT * FROM users");
     $customer_array[] = array('User Name', 'Mobile No', 'E-mail', 'Address', 'ad_count','role','created_date');
     foreach($customer_data as $customer)
     {
      $customer_array[] = array(
       'User Name'  => $customer->name,
       'Mobile No'   => $customer->mobile_no,
       'E-mail'    => $customer->email,
       'Address'  => $customer->address,
       'ad_count'   => $customer->ad_count,
       'role'   => $customer->role,
       'created_date'   => $customer->created_date
      );
     }

    //  dd($customer_array);
     
    //  exit;
    //  return Excel::download( $customer_data, 'users.xlsx');
    }
}
