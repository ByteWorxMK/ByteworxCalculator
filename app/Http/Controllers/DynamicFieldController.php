<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DynamicField;
use Validator;

class DynamicFieldController extends Controller
{
    function index()
    {
     return view('dynamic_field');
    }

    function insert(Request $request)
    {
     if($request->ajax())
     {
      $rules = array(
        'name.*'  => 'required',
        'brutto.*'  => 'required',
        'net.*'  => 'required',
        'billable.*'  => 'required',
        'profit.*'  => 'required',
      );
      $error = Validator::make($request->all(), $rules);
      if($error->fails())
      {
       return response()->json([
        'error'  => $error->errors()->all()
       ]);
      }

      $name = $request->name;
      $brutto = $request->brutto;
      $net = $request->net;
      $billable = $request->billable;
      $profit = $request->profit;
      for($count = 0; $count < count($name); $count++)
      {
       $data = array(
        'name' => $name[$count],
        'brutto'  => $brutto[$count],
        'net' => $net[$count],
        'billable'  => $billable[$count],
        'profit' => $profit[$count]
       );
       $insert_data[] = $data; 
      }

      DynamicField::insert($insert_data);
      return response()->json([
       'success'  => 'Data Added successfully.'
      ]);
     }
    }
}
