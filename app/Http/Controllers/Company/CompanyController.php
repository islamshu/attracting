<?php

namespace App\Http\Controllers\Company;

use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
  public function edit_profile()
  {
    $states =City::where('parent_id',auth()->user()->governorate_id)->get();

   return view('company-dashbord.profile.edit')->with('states',$states)->with('governments',City::where('parent_id',0)->get());  
  }
  public function update_profile(Request $request)
  {
    $company =Auth::user(); 

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
    public function get_login(){
        return view('company-dashbord.auth.login');
     }
     public function post_login(Request $request){
        if(Auth::guard('company')->attempt($request->only('email','password'),$request->filled('remember'))){
            return redirect()->route('company.dashboard.dash');            
        }
        return redirect()->back()->with(['error'=>'login faild']);
    }
    public  function dashboard()
    {
      return view('admin-dashbord.index');
    }
    public  function company_dashboard()
    {
      return view('company-dashbord.index');
    }
    public  function workers()
    {
      return view('company-dashbord.index');
    }

}
