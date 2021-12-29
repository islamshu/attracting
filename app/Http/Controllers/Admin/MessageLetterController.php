<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MessageLetter;
use Illuminate\Http\Request;

class MessageLetterController extends Controller
{
    public function index()
    {
        return view('admin-dashbord.letters.index')->with('messages',MessageLetter::get());
    }
    
}
