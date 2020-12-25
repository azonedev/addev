<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Excel;

class ExportExcelController extends Controller
{
    function index()
    {
    //  $customer_data = DB::table('tbl_customer')->get();
    //  return view('export_excel')->with('customer_data', $customer_data);
    }

    function excel()
    {
     $customer_data = DB::table('users')->get()->toArray();
     $customer_array[] = array('Customer Name', 'Address', 'Mobile', 'Email', 'Created Date');
     foreach($customer_data as $customer)
     {
      $customer_array[] = array(
       'Customer Name'  => $customer->name,
       'Address'   => $customer->address,
       'Mobile'    => $customer->mobile_no,
       'Email'  => $customer->email,
       'Created Date'   => $customer->created_date
      );
     }
     Excel::create('Customer Data', function($excel) use ($customer_array){
      $excel->setTitle('Customer Data');
      $excel->sheet('Customer Data', function($sheet) use ($customer_array){
       $sheet->fromArray($customer_array, null, 'A1', false, false);
      });
     })->download('xlsx');
    }
}
