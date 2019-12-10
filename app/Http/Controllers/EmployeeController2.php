<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\Http\Resources\Employee as EmployeeResource;
use App\Http\Resources\EmployeeCollection;



class EmployeeController2 extends Controller
{
    //

    public function index()
    {
        return new EmployeeCollection(Employee::all());
    }
    public function show($id)
    {
        return new EmployeeResource(Employee::findOrFail($id));
    }

    public function store(Request $request)
    {
        //
        $request->validate([
          //  'position'            =>  'required',
           // 'role'                =>  'required',
            'first_name'          =>  'required',
            'last_name'           =>  'required',
            'net'                 =>  'required',
            'brutto'              =>  'required',
            'yearlynet'           =>  'required',
            'yearlybrut'          =>  'required',
            'socialcostmonth'     =>  'required',
            'socialcostyear'      =>  'required',
            'administrative'      =>  'required',
            'expenses'            =>  'required',
            'hardware'            =>  'required',
            'othercosts'          =>  'required',
            'companycostperyear'  =>  'required',
            'companycostpermonth' =>  'required',
           // 'image'               =>  'image|max:2048',
            'c1'                  =>  'required',
            'c2'                  =>  'required',
            'c3'                  =>  'required',
            'c4'                  =>  'required',
            'p1'                  =>  'required',
            'p2'                  =>  'required',
            'p3'                  =>  'required',
            'p4'                  =>  'required'
        ]);

        $employee = Employee::create($request->all());

        return (new EmployeeResource($employee))
                ->response()
                ->setStatusCode(201);
    
    }

    public function delete($id) {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return response()->json(null, 204);
    }

}
