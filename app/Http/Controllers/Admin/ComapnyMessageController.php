<?php

namespace App\Http\Controllers\Admin;

use App\ComapnyMessage;
use App\ComapnyReplay;
use App\SendFront;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComapnyMessageController extends Controller
{
    public function index()
    {
        $messages = ComapnyMessage::orderBy('id','desc')->get();
       return view('admin-dashbord.comapny_message.index')->with('messages',$messages);
    }
    public function show($id){
        $message = ComapnyMessage::find($id);
        $message->status = 1;
        $message->save();
        return view('admin-dashbord.comapny_message.show')->with('message',$message);
    }
    public function replay(Request $request){
        $meesage = ComapnyMessage::find($request->message_id);
        $replay = new ComapnyReplay();
        $replay->message_id = $meesage->id;
        $replay->message = $request->message;
        $replay->user_type = 'admin';
        $replay->save();
        return redirect()->back()->with(['success',trans('Message sent')]);

    }
}
