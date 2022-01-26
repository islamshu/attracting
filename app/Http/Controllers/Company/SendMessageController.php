<?php

namespace App\Http\Controllers\Company;

use App\ComapnyMessage;
use App\ComapnyReplay;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SendMessageController extends Controller
{
    public function index(){
      $meesages  = ComapnyMessage::orderBy('id','desc')->get();
      return view('company-dashbord.messages.index')->with('messages',$meesages);
    }
    public function show($id){
        $meesage =ComapnyMessage::find($id);
        return view('company-dashbord.messages.show')->with('message',$meesage);
    }
    public function create(){
        return view('company-dashbord.messages.create');
    }
    public function store(Request $request){
        $meesage = new ComapnyMessage();
        $meesage->subject = $request->subject;
        $meesage->body = $request->body;
        $meesage->company_id = auth()->id();
        $meesage->save();
        return redirect()->route('company.comapny-message.index')->with(['success',trans('successfully sent')]);
    }
    public function replay(Request $request){
        $meesage = ComapnyMessage::find($request->message_id);
        $replay = new ComapnyReplay();
        $replay->message_id = $meesage->id;
        $replay->message = $request->message;
        $replay->user_type = 'company';
        $replay->save();
        return redirect()->back()->with(['success',trans('Message sent')]);

    }
}
