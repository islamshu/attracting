<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-dashbord.pages.index')->with('pages',Page::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-dashbord.pages.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = new Page();
        $page->title = ['ar'=>$request->title_ar,'en'=>$request->title_en];
        $page->dec = ['ar'=>$request->dec_ar,'en'=>$request->dec_en];
        $page->image = $request->image->store('pages');
        $page->save();
        return redirect()->route('pages.index')->with(['success'=>'تم الاضافة بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin-dashbord.pages.edit')->with('page',Page::find($id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $page = Page::find($id);
       
        $page->dec = ['ar'=>$request->dec_ar,'en'=>$request->dec_en];
        if($request->image != null){
            $page->image = $request->image->store('pages');
            
        }
        $page->save();
        return redirect()->route('pages.index')->with(['success'=>'تم التعديل بنجاح']);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
