<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-dashbord.company.index')->with('companies', Company::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-dashbord.company.create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'owner_name'=>'required',
            'company_name'=>'required',
            'email'=>'required|unique:companies,email',
            'phone'=>'required|unique:companies,phone',
            'password'=>'required',
            'commercial_register'=>'required',
            'address'=>'required'
        ]);
        $request_all = $request->except(['password','commercial_register']);
        $request_all['password']=bcrypt($request->password);
        $request_all['commercial_register'] = $request->commercial_register->store('company.commercial_register');
        Company::create($request_all);
        return redirect()->route('company.index')->with(['success'=>'تم الاضافة بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function change_status(Request $request){
        $company = Company::findOrFail($request->companyid);
        $company->status = $request->status;
        $company->save();
    
        return response()->json(['message' => 'Company status updated successfully.']);
    }
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('admin-dashbord.company.edit')->with('company',$company);  

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        // dd($company);
        $request->validate([
            'owner_name'=>'required',
            'company_name'=>'required',
            'email'=>'required|unique:companies,email,'.$company->id,
            'phone'=>'required|unique:companies,phone,'.$company->id,
            'address'=>'required'
        ]);
        $request_all = $request->except(['password','commercial_register']);
        if($request->password != null){
            $request_all['password']=bcrypt($request->password);
        }
        if($request->commercial_register){
            $request_all['commercial_register'] = $request->commercial_register->store('company.commercial_register');
        }
        $company->update($request_all);
        return redirect()->back()->with(['success'=>'تم التعديل بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
