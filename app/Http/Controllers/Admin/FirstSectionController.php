<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\FirstSection;
use Illuminate\Http\Request;

class FirstSectionController extends Controller
{
    
    public function index()
    {
        return view('admin-dashbord.firstsection')->with('first',FirstSection::first());
    }

   
    public function store(Request $request)
    {
        $first = FirstSection::first();
        $first->first_icon = $request->first_icon;
        $first->first_title = ['ar'=>$request->first_title_ar,'en'=>$request->first_title_en];
        $first->first_dec = ['ar'=>$request->first_dec_ar,'en'=>$request->first_dec_en];
        $first->secand_icon = $request->secand_icon;
        $first->secand_title = ['ar'=>$request->secand_title_ar,'en'=>$request->secand_title_en];
        $first->secand_dec = ['ar'=>$request->secand_dec_ar,'en'=>$request->secand_dec_en];
        $first->third_icon = $request->third_icon;
        $first->third_title = ['ar'=>$request->third_title_ar,'en'=>$request->third_title_en];
        $first->third_dec = ['ar'=>$request->third_dec_ar,'en'=>$request->third_dec_en];
        $first->fourth_icon = $request->fourth_icon;
        $first->fourth_title = ['ar'=>$request->fourth_title_ar,'en'=>$request->fourth_title_en];
        $first->fourth_dec = ['ar'=>$request->fourth_dec_ar,'en'=>$request->fourth_dec_en];
        $first->save();
        return redirect()->back()->with(['success'=>'تم التعديل بنجاح']);
    }
}