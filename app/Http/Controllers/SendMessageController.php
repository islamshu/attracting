<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Notifications\MessageNotofication;
use App\SendMessage;
use Illuminate\Http\Request;
use Notification;

class SendMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-dashbord.send-message.index')->with('messages',SendMessage::orderBy('id','desc')->get());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.send_message');
    }
    
    public function all_message(){
        $messages = SendMessage::where('user_id',auth()->id())->orderBy('id','desc')->get();
        // dd($messages);
        return view('frontend.all_message')->with('messages',$messages);
    }
    public function show_message($id){
        $message = SendMessage::find($id);
        // dd($messages);
        return view('frontend.content_message')->with('message',$message);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message =new SendMessage();
        $message->subject = $request->subject;
        $message->message = $request->massage;
        $message->user_id = auth()->id();
        $message->save();
        $admin =Admin::first();
        Notification::send($admin, new MessageNotofication($admin));

        
        return redirect()->back()->with(['success'=>'تم الارسال بنجاح']);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SendMessage  $sendMessage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SendMessage  $sendMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(SendMessage $sendMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SendMessage  $sendMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SendMessage $sendMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SendMessage  $sendMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(SendMessage $sendMessage)
    {
        //
    }
}
