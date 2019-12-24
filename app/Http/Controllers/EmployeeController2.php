<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades;
use File;

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
            'position'            =>  'required',
            'role'                =>  'required',
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
            'image'               =>  'required',
            'c1'                  =>  'required',
            'c2'                  =>  'required',
            'c3'                  =>  'required',
            'c4'                  =>  'required',
            'p1'                  =>  'required',
            'p2'                  =>  'required',
            'p3'                  =>  'required',
            'p4'                  =>  'required'
        ]);


        $new_image_data = $request->image;
        $new_name = rand(); //. '.' . $image->getClientOriginalExtension();

        //$image->move(public_path('images'), $new_name);

        File::put('C:/xampp/htdocs/firstApp/storage/'.$new_name.'.txt', $new_image_data);
        $new_name = $new_name.'.txt';



        $form_data = array(
            'position'              =>  $request->position,
            'role'                  =>  $request->role,
            'first_name'            =>  $request->first_name,
            'last_name'             =>  $request->last_name,
            'net'                   =>  $request->net,
            'brutto'                =>  $request->brutto,
            'yearlynet'             =>  $request->yearlynet,
            'yearlybrut'            =>  $request->yearlybrut,
            'socialcostmonth'       =>  $request->socialcostmonth,
            'socialcostyear'        =>  $request->socialcostyear,
            'administrative'        =>  $request->administrative,
            'expenses'              =>  $request->expenses,
            'hardware'              =>  $request->hardware,
            'othercosts'            =>  $request->othercosts,
            'companycostperyear'    =>  $request->companycostperyear,
            'companycostpermonth'   =>  $request->companycostpermonth,
            'image'                 =>  $new_name,
            'c1'                    =>  $request->c1,
            'c2'                    =>  $request->c2,
            'c3'                    =>  $request->c3,
            'c4'                    =>  $request->c4,
            'p1'                    =>  $request->p1,
            'p2'                    =>  $request->p2,
            'p3'                    =>  $request->p3,
            'p4'                    =>  $request->p4
        );

        $employee = Employee::create($form_data);

        return (new EmployeeResource($employee))
                ->response()
                ->setStatusCode(201);
    
    }

    public function delete($first_name) {
        $employee = Employee::findOrFail($first_name);
        $employee->delete();

        return response()->json(null, 204);
    }

}
