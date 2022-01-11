<?php

namespace App\Http\Controllers\Company;

use App\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Booking::with('worker')->whereHas('worker', function ($q)  {
            $q->with('company')->whereHas('company', function ($q)  {
                   $q->where('company_id', auth('company')->id());
                 });
                })->get();
        return view('company-dashbord.orders.index')->with('orders',$orders);
     
    }
    public function show($id){
        $order = Booking::with('worker')->find($id);
        return view('company-dashbord.orders.show')->with('order',$order);

    }
}
