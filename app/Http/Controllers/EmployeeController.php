<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        if(request()->ajax())
        {
            return datatables()->of(Employee::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    
        }
        return view('employee_index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = array(
          //  'position'            =>  'required',
         //   'role'                =>  'required',
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
          //  'image'               =>  'image|max:2048',
            'c1'                  =>  'required',
            'c2'                  =>  'required',
            'c3'                  =>  'required',
            'c4'                  =>  'required',
            'p1'                  =>  'required',
            'p2'                  =>  'required',
            'p3'                  =>  'required',
            'p4'                  =>  'required'
        );

        

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('images'), $new_name);

        $form_data = array(
         //   'position'              =>  $request->position,
         //   'role'                  =>  $request->role,
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
          //  'image'                 =>  $new_name,
            'c1'                    =>  $request->c1,
            'c2'                    =>  $request->c2,
            'c3'                    =>  $request->c3,
            'c4'                    =>  $request->c4,
            'p1'                    =>  $request->p1,
            'p2'                    =>  $request->p2,
            'p3'                    =>  $request->p3,
            'p4'                    =>  $request->p4
        );

        Employee::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(request()->ajax())
        {
            $data = Employee::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $rules = array(
              //  'position'            =>  'required',
              //  'role'                =>  'required',
                'first_name'          =>  'required',
                'last_name'           =>  'required',
                'net'                 =>  'required',
                'brutto'              =>  'required',
                'yearlynet'           =>  'required',
                'yearlybrut'          =>  'required',
                'socialcostmonth'     =>  'required',
                'socialcostyear'      =>  'required',
                'expenses'            =>  'required',
                'administrative'      =>  'required',
                'hardware'            =>  'required',
                'othercosts'          =>  'required',
                'companycostperyear'  =>  'required',
                'companycostpermonth' =>  'required',
              //  'image'               =>  'image|max:2048',
                'c1'                  =>  'required',
                'c2'                  =>  'required',
                'c3'                  =>  'required',
                'c4'                  =>  'required',
                'p1'                  =>  'required',
                'p2'                  =>  'required',
                'p3'                  =>  'required',
                'p4'                  =>  'required'
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $rules = array(
              //  'position'            =>  'required',
              //  'role'                =>  'required',
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
              //  'image'               =>  'image|max:2048',
                'c1'                  =>  'required',
                'c2'                  =>  'required',
                'c3'                  =>  'required',
                'c4'                  =>  'required',
                'p1'                  =>  'required',
                'p2'                  =>  'required',
                'p3'                  =>  'required',
                'p4'                  =>  'required'
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
        }

        $form_data = array(
           // 'position'              =>  $request->position,
         //   'role'                  =>  $request->role,
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
         //   'image'                 =>  $image_name,
            'c1'                    =>  $request->c1,
            'c2'                    =>  $request->c2,
            'c3'                    =>  $request->c3,
            'c4'                    =>  $request->c4,
            'p1'                    =>  $request->p1,
            'p2'                    =>  $request->p2,
            'p3'                    =>  $request->p3,
            'p4'                    =>  $request->p4

        );
        Employee::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);
   
       
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Employee::findOrFail($id);
        $data->delete();
    }

}
