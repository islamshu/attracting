<?php

namespace App\Http\Controllers\Admin;

use App\City;
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
        return view('admin-dashbord.company.create')->with('governments',City::where('parent_id',0)->get());  
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
    public function show($id)
    {
        return view('admin-dashbord.company.show')->with('company',Company::find($id));  

    }
    public function dashboard()
    {
        return view('company-dashbord.company.index');
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $states =City::where('parent_id',$company->governorate_id)->get();
        return view('admin-dashbord.company.edit')->with('company',$company)->with('states',$states)->with('governments',City::where('parent_id',0)->get());  

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit_profile()
  {
   return view('company-dashbord.profile.edit');
  }
  public function update_profile(Request $request)
  {
   $user = auth()->user();
   $user->name = $request->name;
   $user->email = $request->email;
   if($request->password != null){
      $user->password = bcrypt($request->name);
   }
   $user->save();
   return redirect()->back()->with(['success'=>'تم التعديل بنجاح']);
  }
    public function update(Request $request, Company $company)
    {
        // dd($company);
        $request->validate([
            'owner_name'=>'required',
            'company_name'=>'required',
            'email'=>'required|unique:companies,email,'.$company->id,
            'phone'=>'required|unique:companies,phone,'.$company->id,
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
