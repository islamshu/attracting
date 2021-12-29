<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-dashbord.sliders.index')->with('sliders',Slider::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-dashbord.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'main_title_ar'=>'required',
            'main_title_en'=>'required',
            'title_ar'=>'required',
            'title_en'=>'required',
            'image'=>'required'    
        ]);
        $slider = new Slider();
        $slider->main_title=['ar' => $request->main_title_ar, 'en' => $request->main_title_en];
        $slider->title=['ar' => $request->title_ar, 'en' => $request->title_en];
        $slider->text_button=['ar' => $request->text_button_ar, 'en' => $request->text_button_en];
        $slider->image = $request->image->store('sliders');
        $slider->url=$request->url;
        $slider->save();
        return redirect()->route('sliders.index')->with(['success'=>'تم الاضافة بنجاح']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin-dashbord.sliders.edit')->with('slider',Slider::find($id));
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'main_title_ar'=>'required',
            'main_title_en'=>'required',
            'title_ar'=>'required',
            'title_en'=>'required',
        ]);
        $slider =  Slider::find($id);
        $slider->main_title=['ar' => $request->main_title_ar, 'en' => $request->main_title_en];
        $slider->title=['ar' => $request->title_ar, 'en' => $request->title_en];
        $slider->text_button=['ar' => $request->text_button_ar, 'en' => $request->text_button_en];
        if($request->image != null){
            $slider->image = $request->image->store('sliders');
        }
        $slider->url=$request->url;
        $slider->save();
        return redirect()->route('sliders.index')->with(['success'=>'تم التعديل بنجاح']);
    }
    public function change_status(Request $request){
        $slider = Slider::find($request->sliderid);
        $slider->status = $request->status;
        $slider->save();
    
        return response()->json(['message' => 'Slider status updated successfully.']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider =  Slider::find($id)->delete();
        return redirect()->route('sliders.index')->with(['success'=>'تم الحذف بنجاح']);
    }
}
