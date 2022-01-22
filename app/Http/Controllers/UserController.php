<?php

namespace App\Http\Controllers;

use App\Booking;
use App\City;
use App\Company;
use App\Mail\ComapnyMail;
use App\Mail\UserMail;
use App\Notifications\ResetPasswordNotification;
use App\User;
use App\Work;
use App\Worker;
use Carbon\Carbon;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function get_login()
    {
        return view('layouts.user_auth.login');
    }
    public function get_register_company()
    {
        return view('layouts.user_auth.company_register')->with('governments',City::where('parent_id',0)->get());
    }
    public function get_register()
    {
        return view('layouts.user_auth.user_register');
    }
    public function post_register_company(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email|unique:companies,email|unique:admins,email',
            'phone' => 'required',
            'company_name' => 'required',
            'owner_name' => 'required',
            'commercial_register' => 'required',
            'password' => 'required',
            'password_confirm' => 'required|same:password'
        ]);
        $request_all = $request->except(['password', 'commercial_register', 'password_confirm']);
        $request_all['password'] = bcrypt($request->password);
        $request_all['commercial_register'] = $request->commercial_register->store('company.commercial_register');
        Company::create($request_all);

        toastr()->success(trans('Register successfuly'));

        return redirect()->route('home');
    }
    public function post_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $userdata = array(
            'email' => $request->email,
            'password' => $request->password
        );
        if (Auth::attempt($userdata)) {
            toastr()->success(trans('login successfuly'));

            return redirect()->route('home');
        } elseif (Auth::guard('company')->attempt($userdata)) {
            //   dd(Auth::guard('company')->user());
            return redirect()->route('company.dashboard');
        } else {
            return redirect()->back()->with(['error' => 'erorr data']);
        }
    }

    public function booking(Request $request)
    {
        // dd($request->all());
        $booking = new  Booking();
        $worker_id = decrypt($request->worker_id);
        $woo = Worker::find($worker_id);
        if ($woo->status == '0') {


            $booking->worker_id =  $worker_id;
            $booking->user_id = auth()->id();
            $booking->start_at = Carbon::now()->format('Y-m-d');
            $booking->finish_at = Carbon::now()->addDays(get_general_value('allowed_days'))->format('Y-m-d');
            $booking->status = 0;
            $booking->paid = get_price($worker_id);

            $booking->save();
            $thawani = new ThawaniController;
            // $ddddd= session()->put('student_id', $st->id);
            return $thawani->thawani($request, $booking);
        } else {
            toastr()->success(trans('The worker is not avaliable'));
            return  redirect()->back();
        }
    }

    public function dashboard()
    {
        $booking = Booking::where('user_id', auth()->id())->where('finish_at', '>', Carbon::now())->orWhere('status', 2)->get();

        return view('frontend.user', compact('booking'));
    }
    public function get_profile()
    {
        return view('frontend.edit');
    }
    public function post_profile(Request $request)
    {
        $user = Auth::user();
        // dd($user);
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$user->id.'|unique:companies,email|unique:admins,email,'.$user->id, 
            'phone'=>'required|unique:companies,phone,'.$user->id.'|required|unique:users,phone,'.$user->id,

            'name'=>'required'

        ]);
        $request_all = $request->except(['password']);
        if($request->password != null){
            $request_all['password']= bcrypt($request->password); 
        }
        $user->update($request_all);
        return redirect()->back()->with(['success'=>trans('edit successfuly')]);
    }
    public function orders()
    {
        $booking = Booking::where('user_id', auth()->id())->get();

        return view('frontend.orders', compact('booking'));
    }
    public function post_register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email|unique:companies,email|unique:admins,email',
            'phone' => 'required',
            'name' => 'required',
            'password' => 'required',
            'password_confirm' => 'required|same:password'
        ]);
        $user = new User();
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->save();
        auth()->login($user, true);
        toastr()->success(trans('login successfuly'));

        return redirect()->route('home');
    }
    public function logout_user()
    {
        auth()->logout();
        toastr()->success(trans('logout successfuly'));

        return redirect()->route('home');
    }
    public function reset_get(){
        return view('frontend.reset');
    }
    public function reset(Request $request)
    {
        
        $user = DB::table('users')->where('email', $request->email)
            ->first();
            // dd($user);
            if(!$user){
                $user = DB::table('companies')->where('email', '=', $request->email)
                ->first();
            }
            // dd($user);
        //Check if the user exists
        if (!$user) {
            return redirect()->back()->withErrors(['email' => trans('User does not exist')]);
        }

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' =>Str::random(60),
            'created_at' => Carbon::now()
        ]);
        //Get the token just created above
        $tokenData = DB::table('password_resets')
            ->where('email', $request->email)->first();

        if ($this->sendResetEmail($request->email, $tokenData->token)) {

            return redirect()->back()->with(['success',trans('A reset link has been sent to your email address.')]);
        } else {
            return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
        }
    }
    private function sendResetEmail($email, $token)
    {
        //Retrieve the user from the database

        $user = User::select('name', 'email')->first();
        if(!$user){
            $user = Company::where('email', $email)->select('company_name', 'email')->first();
        }
        //Generate, the password reset link. The token generated is embedded in the link
        $link = URL::to('/') . '/reset-password/' . $token . '?email=' . urlencode($user->email);
        // dd();

        try {
            $user->notify(new ResetPasswordNotification($link));
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    public function resetPassword(Request $request)
{
    //Validate input
    $validator = Validator::make($request->all(), [
        'email' => 'required|email|exists:users,email',
        'password' => 'required|confirmed',
        'token' => 'required',
     ]);

    //check if payload is valid before moving on
    if ($validator->fails()) {
        return redirect()->back()->withErrors(['email' => 'Please complete the form']);
    }

    $password = $request->password;
// Validate the token
    $tokenData = DB::table('password_resets')
    ->where('token', $request->token)->first();
// Redirect the user back to the password reset request form if the token is invalid
    if (!$tokenData) return view('auth.passwords.email');

    $user = User::where('email', $tokenData->email)->first();
// Redirect the user back if the email is invalid
    if (!$user) return redirect()->back()->withErrors(['email' => 'Email not found']);
//Hash and update the new password
    $user->password = \Hash::make($password);
    $user->update(); //or $user->save();

    //login the user immediately they change password successfully
    Auth::login($user);

    //Delete the token
    DB::table('password_resets')->where('email', $user->email)
    ->delete();

    //Send Email Reset Success Email
    if ($this->sendSuccessEmail($tokenData->email)) {
        return view('index');
    } else {
        return redirect()->back()->withErrors(['email' => trans('A Network Error occurred. Please try again.')]);
    }

}
public function show_rest($token)
{
    return view('frontend.forgetPasswordLink', ['token' => $token]);

}
public function submitResetPasswordForm(Request $request)
{
    $request->validate([
        'password' => 'required|string|min:6|confirmed',
        'password_confirmation' => 'required'
    ]);

    $updatePassword = DB::table('password_resets')
                        ->where([
                          'token' => $request->token
                        ])
                        ->first();
    if(!$updatePassword){
        return back()->withInput()->with('error', 'Invalid token!');
    }

    $user = User::where('email', $updatePassword->email)->first();
                if($user){
                    $user->update(['password' => Hash::make($request->password)]);
                }
                if(!$user){
                    // dd( $request->email);
                    $user = Company::where('email', $updatePassword->email)->first();
                    // dd($user);
                    if($user){
                    $user ->update(['password' => Hash::make($request->password)]);
                    }
                   
                }
        

    DB::table('password_resets')->where(['email'=> $updatePassword->email])->delete();

    return redirect('/login')->with('message', 'Your password has been changed!');
}
}
