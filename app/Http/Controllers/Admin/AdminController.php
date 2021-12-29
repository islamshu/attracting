<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Admin;
use Illuminate\Http\Request;
use Auth;
class AdminController extends Controller
{
   public function get_login(){
      return view('admin-dashbord.auth.login');
   }
   public function post_login(Request $request){
      if(Auth::guard('admin')->attempt($request->only('email','password'),$request->filled('remember'))){
          return redirect()->route('admin.dashboard');            
      }
      return redirect()->back()->with(['error'=>'login faild']);
  }
  public  function dashboard()
  {
    return view('admin-dashbord.index');
  }
}
