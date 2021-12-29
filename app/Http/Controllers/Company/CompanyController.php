<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function get_login(){
        return view('company-dashbord.auth.login');
     }
     public function post_login(Request $request){
        if(Auth::guard('company')->attempt($request->only('email','password'),$request->filled('remember'))){
            return redirect()->route('company.dashboard');            
        }
        return redirect()->back()->with(['error'=>'login faild']);
    }
    public  function dashboard()
    {
      return view('admin-dashbord.index');
    }
}
