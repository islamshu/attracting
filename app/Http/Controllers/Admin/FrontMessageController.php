<?php

namespace App\Http\Controllers\Admin;

use App\SendFront;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontMessageController extends Controller
{
    public function index()
    {
        $messages = SendFront::orderBy('id','desc')->get();
       return view('admin-dashbord.from_message.index')->with('messages',$messages);
    }
    public function show($id){
        $message = SendFront::find($id);
        $message->status = 1;
        $message->save();
        return view('admin-dashbord.from_message.show')->with('message',$message);
    }
}
