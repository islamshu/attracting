<?php

namespace App\Http\Controllers;
use App\Classes\thawani;
use Illuminate\Http\Request;
use Session;
use App\Order;
use App\BusinessSetting;
use App\Father;
use App\General;
use App\Mail\PaidNotification;
use App\Student;
use App\Studentpain;
use Carbon\Carbon;
use App\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\CourseStudent;
use App\Admin;
use App\Booking;
use App\Mail\ComapnyMail;
use App\Mail\UserMail;
use App\Notifications\CourseNot ;
use App\User;
use App\Worker;

class ThawaniController extends Controller
{
    public function thawani(Request $request,$booking){
       
    $is_test =     1;
    // dd($is_test);
    if($is_test == 1){
        $thawani = new thawani([  
            'isTestMode' => 1, ## set it to 0 to use the class in production mode  
            'public_key' => 'HGvTMLDssJghr9tlN9gr4DVYt0qyBy',  
            'private_key' => 'rRQ26GcsZzoEhbrP2HZvLYDbn9C9et',  
          ]);
         
        }else{
            $thawani = new thawani([  
                'isTestMode' => 0, ## set it to 0 to use the class in production mode  
                'public_key' => env('thawani_Publishable_key'),  
                'private_key' => env('thawani_Secret_key'),  
              ]);
        }
        // dd( $thawani);
        //   dd( $thawani->config );
        
            //   dd(Session::get('order_id'));
       
       
            $qu =1;
         
      
         
        // $amount = get_price($worker->id);
       
            
          $request->op = !isset($request->op)? '' :$request->op; ## to avoid PHP notice message
          switch ($request->op){
              default: ## Generate payment URL
                  $orderId = rand(0, 9999999); ## order number based on your existing system
                  $input = [
                      'client_reference_id' => rand(1000, 9999).$orderId, ## generating random 4 digits prefix to make sure there will be no duplicate ID error
                      'products' => [
   
                          ['name' => ' Reservation of a worker in '. env('APP_NAME'), 'unit_amount' => 
                          $booking->paid * 1000, 'quantity' => 1],
                      ],
          //            'customer_id' => 'cus_xxxxxxxxxxxxxxx', ## TODO: enable this when its activate from Thawani Side
          'success_url' => route('thawani.done', $booking), ## Put the link to next a page with the method checkPaymentStatus()
          'cancel_url' => route('thawani.cancel'), 
                      
                      'metadata' => [
                          'order_id' => 1,
                          'customer_name' => auth()->user()->name,
                          'customer_phone' =>  auth()->user()->phone,
                          'customer_email' =>  auth()->user()->email
                      ]
                  ];
                  $url = $thawani->generatePaymentUrl($input);
                 
                  echo '<pre dir="ltr">' . print_r($thawani->responseData, true) . '</pre>';
                  $request->session()->put($_SERVER['REMOTE_ADDR'],$thawani->payment_id);
                  if($is_test == 0){
                    $booking->session_id = $thawani->responseData['data']['session_id'];
                    $booking->save();
                  }
            
                  if(!empty($url)){
                      ## method will provide you with a payment id from Thawani, you should save it to your order. You can get it using this: $thawani->payment_id
                      ## header('location: '.$url); ## Redirect to payment page
                    return redirect($url);
                    }
                  break;
              case 'callback': ## handle Thawani callback, you need to update order status in your database or file system, in Thawani V2.0 you need to add a link to this page in Webhooks
                  $result = $thawani->handleCallback(1);
                  
                  if($thawani->payment_status == 1){
                      ## successful payment
                  }else{
                      ## failed payment
                  }
                  break;
              case 'checkPayment':
                  $session =$request->session()->get($_SERVER['REMOTE_ADDR']);
             
                  $check = $thawani->checkPaymentStatus($session);
                  dd(  $check);
                  if($thawani->payment_status == 1){
                    ## successful payment
                    echo '<h2>successful payment</h2>';
                }else{
                    ## failed payment
                    echo '<h2>payment failed</h2>';
                }
                $thawani->iprint_r($check);
                break;
            case 'createCustomer':
                $customer = $thawani->createCustomer('me@alrashdi.co');
                $thawani->iprint_r($customer);
                break;
            case 'getCustomer':
                $customer = $thawani->getCustomer('me@alrashdi.co');
                $thawani->iprint_r($customer);
                break;
            case 'deleteCustomer':
                $customer = $thawani->deleteCustomer('cus_xxxxxxxxxxxxxxx');
                $thawani->iprint_r($customer);
                break;
            case 'home':
                echo 'Get payment status from database';
                break;
        }
    }
        
        public function errorUrl(){
         

      
            toastr()->error(trans('Error Occer'));

          return redirect()->route('home');       
        }
      public function successUrl($booking){
        $booking = Booking::find($booking);
        $worker = Worker::find($booking->worker_id);
        $worker->status = "1";
        $worker->save();
        // dd($worker);
        $details = [
            'title' => 'حجز جديد',
            'start_date'=>$booking->start_at,
            'end_date'=>$booking->finish_at
        ];
        $user = User::find($booking->user_id)->email;
        $comapny = Worker::find($booking->worker_id)->company->email;
    

        Mail::to($user)->send(new UserMail ($details));
        Mail::to($comapny)->send(new ComapnyMail($details));

        toastr()->success(trans('Booking successfuly'));
        return redirect()->back();
        }
      
    
    
    
}

