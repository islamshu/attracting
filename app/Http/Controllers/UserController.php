<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Company;
use App\Mail\ComapnyMail;
use App\Mail\UserMail;
use App\User;
use App\Work;
use App\Worker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function get_login()
    {
       return view('layouts.user_auth.login');
    }
    public function get_register_company()
    {
       return view('layouts.user_auth.company_register');
    }
    public function get_register()
    {
       return view('layouts.user_auth.user_register');
    }
    public function post_register_company(Request $request){
        $request->validate([
            'email'=>'required|email|unique:users,email|unique:companies,email|unique:admins,email',
            'phone'=>'required',
            'company_name'=>'required',
            'owner_name'=>'required',
            'address'=>'required',
            'commercial_register'=>'required',
            'password'=>'required',
            'password_confirm'=>'required|same:password' 
        ]);
        $request_all = $request->except(['password','commercial_register','password_confirm']);
        $request_all['password']=bcrypt($request->password);
        $request_all['commercial_register'] = $request->commercial_register->store('company.commercial_register');
        Company::create($request_all);
        
        toastr()->success(trans('Register successfuly'));

        return redirect()->route('home');
    }
    public function post_login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $userdata = array(
            'email' => $request->email ,
            'password' => $request->password
          );
          if (Auth::attempt($userdata))
          {
            toastr()->success(trans('login successfuly'));

            return redirect()->route('home');
          }elseif(Auth::guard('company')->attempt($userdata)){
            //   dd(Auth::guard('company')->user());
            return redirect()->route('company.dashboard');

          }
          else
          {
          return redirect()->back()->with(['error'=>'erorr data']);
          }
    }
   
    public function booking(Request $request)
    {   
        // dd($request->all());
        $booking = new  Booking();
        $worker_id = decrypt($request->worker_id);
        $woo = Worker::find($worker_id);
        if($woo->status == '0'){

        
        $booking->worker_id =  $worker_id;
        $booking->user_id = auth()->id();
        $booking->start_at = Carbon::now()->format('Y-m-d');
        $booking->finish_at = Carbon::now()->addDays(get_general_value('allowed_days'))->format('Y-m-d');
        $booking->status = 0;
        $booking->paid = get_price($worker_id);

        $booking->save();
        $thawani = new ThawaniController;
        // $ddddd= session()->put('student_id', $st->id);
        return $thawani->thawani($request,$booking);

    }else{
        toastr()->success(trans('The worker is not avaliable')); 
        return  redirect()->back()->getTargetUrl();
    }
    }



     
    }
    public function dashboard(){
        $booking = Booking::where('user_id',auth()->id())->where('finish_at','>',Carbon::now())->orWhere('status',2)->get();
        
        return view('frontend.user',compact('booking'));
    }
    public function orders(){
        $booking = Booking::where('user_id',auth()->id())->get();
        
        return view('frontend.orders',compact('booking'));
    }
    public function post_register(Request $request)
    {
        $request->validate([
            'email'=>'required|email|unique:users,email|unique:companies,email|unique:admins,email',
            'phone'=>'required',
            'name'=>'required',
            'password'=>'required',
            'password_confirm'=>'required|same:password' 
        ]);
        $user = new User();
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->save();
        auth()->login($user ,true);
        toastr()->success(trans('login successfuly'));

        return redirect()->route('home');
    }
    public function logout_user(){
    auth()->logout();
    toastr()->success(trans('logout successfuly'));

    return redirect()->route('home');
    }
    
}
