<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-dashbord.about')->with('about',About::first());
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_ar'=>'required',
            'title_en'=>'required',
            'description_ar'=>'required',
            'description_en'=>'required',
            'list_ar'=>'required',
            'list_en'=>'required',
            // 'image'=>'required'
        ]);
        // $about = About::updateOrCreate(
        //     ['id' => '1'], // Find by email
        //     ['title' => ['ar' => $request->title_ar, 'en' => $request->title_en],
        //      'dec' => ['ar' => $request->description_ar, 'en' => $request->description_en],
        //      'list' => ['ar' => $request->list_ar, 'en' => $request->list_ar],
        //      'image'=>$request->image->store('about')
        //      ] // Update or Create with these
        // );
        $about = About::first();
        $about->title =['ar' => $request->title_ar, 'en' => $request->title_en];
        $about->dec =['ar' => $request->description_ar, 'en' => $request->description_en];
        $about->list =['ar' => $request->list_ar, 'en' => $request->list_ar];
        if($request->image != null){
            $about->image = $request->image->store('about');
        }
        $about->save();
        return redirect()->back()->with(['success'=>'تم التعديل بنجاح']);


    }

    
}
