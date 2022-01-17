<?php

namespace App\Http\Controllers;

use App\SendMessage;
use Illuminate\Http\Request;

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
        return view('admin-dashbord.send-message.show')->with('messages',SendMessage::find($id));
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
