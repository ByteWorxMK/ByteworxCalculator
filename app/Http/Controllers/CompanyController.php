<?php

namespace App\Http\Controllers;

// use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Illuminate\Http\Request;
// use App\CompanySettings;
use Validator;

use Illuminate\Http\Request;

 use App\CompanySettings;
// use App\Http\Resources\Company as CompanyResource;
// use App\Http\Resources\CompanyCollection;

class CompanyController extends Controller
{

    //use AuthenticatesUsers;

    // public function __construct()
    // {
    //     $this->middleware('auth'); /*['auth', 'verified']) used to implement the mail verification */
    // }
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
            return datatables()->of(CompanySettings::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('company_index');
       //return new CompanyCollection(CompanySettings::all());
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
            'company_name'     =>  'required',
            'vacation_days'    =>  'required',
            'sick_days'        =>  'required',
            'working_days'     =>  'required',
            'billability'      =>  'required',
            'billability_year' =>  'required',
            'effective_days'   =>  'required',
            'expected_profit'   =>  'required'
  
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        

        $form_data = array(
            'company_name'        =>  $request->company_name,
            'vacation_days'       =>  $request->vacation_days,
            'sick_days'           =>  $request->sick_days,
            'working_days'        =>  $request->working_days,
            'billability'         =>  $request->billability,
            'billability_year'    =>  $request->billability_year,
            'effective_days'      =>  $request->effective_days,
            'expected_profit'      =>  $request->expected_profit
             
        );

        CompanySettings::create($form_data);

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

        return new CompanyResource(Company::findOrFail($id));
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
            $data = CompanySettings::findOrFail($id);
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
       
            
            $rules = array(
                'company_name'     =>  'required',
                'vacation_days'    =>  'required',
                'sick_days'        =>  'required',
                'working_days'     =>  'required',
                'billability'      =>  'required',
                'billability_year' =>  'required',
                'effective_days'   =>  'required',
                'expected_profit'   =>  'required'
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
        

        $form_data = array(
            'company_name'        =>  $request->company_name,
            'vacation_days'       =>  $request->vacation_days,
            'sick_days'           =>  $request->sick_days,
            'working_days'        =>  $request->working_days,
            'billability'         =>  $request->billability,
            'billability_year'    =>  $request->billability_year,
            'effective_days'      =>  $request->effective_days,
            'expected_profit'      =>  $request->expected_profit

        );
        CompanySettings::whereId($request->hidden_id)->update($form_data);

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
        //
        $data = CompanySettings::findOrFail($id);
        $data->delete();
    }
}
