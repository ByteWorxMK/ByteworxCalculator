<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CompanySettings;
use App\Http\Resources\Company as CompanyResource;
use App\Http\Resources\CompanyCollection;

class CompanyController2 extends Controller
{
    //

    public function index()
    {
        return new CompanyCollection(CompanySettings::all());
    }
    public function show($id)
    {
        return new CompanyResource(CompanySettings::findOrFail($id));
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'company_name'     =>  'required',
            'vacation_days'    =>  'required',
            'sick_days'        =>  'required',
            'working_days'     =>  'required',
            'billability'      =>  'required',
            'billability_year' =>  'required',
            'effective_days'   =>  'required',
            'expected_profit'   =>  'required'
        ]);

        $company = CompanySettings::create($request->all());

        return (new CompanyResource($company))
                ->response()
                ->setStatusCode(201);
    
    }

    public function delete($id) {
        $company = CompanySettings::findOrFail($id);
        $company->delete();

        return response()->json(null, 204);
    }

}
