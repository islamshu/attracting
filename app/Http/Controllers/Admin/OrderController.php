<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Booking::with('worker')->get();
       return view('admin-dashbord.orders.index')->with('orders',$orders);
    }
    public function show($id){
        $order = Booking::with('worker')->find($id);
        return view('admin-dashbord.orders.show')->with('order',$order);
    }
}
