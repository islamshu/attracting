<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-dashbord.service.index')->with('services',Service::get());
    }
    public function change_status(Request $request){
        $slider = Service::find($request->serviceid);
        $slider->status = $request->status;
        $slider->save();
    
        return response()->json(['message' => 'Service status updated successfully.']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-dashbord.service.create');
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
            'title_ar'=>'required',
            'title_en'=>'required',
            'dec_ar'=>'required',
            'dec_en'=>'required',
            'icon'=>'required'    
        ]);
        $service = new Service();
        $service->title=['ar' => $request->title_ar, 'en' => $request->title_en];
        $service->dec=['ar' => $request->dec_ar, 'en' => $request->dec_en];
        $service->icon=$request->icon;
        $service->save();
        return redirect()->route('services.index')->with(['success'=>'تم الاضافة بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin-dashbord.service.edit')->with('service',Service::find($id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title_ar'=>'required',
            'title_en'=>'required',
            'dec_ar'=>'required',
            'dec_en'=>'required',
            'icon'=>'required'    
        ]);
        $service = Service::find($id);
        $service->title=['ar' => $request->title_ar, 'en' => $request->title_en];
        $service->dec=['ar' => $request->dec_ar, 'en' => $request->dec_en];
        $service->icon=$request->icon;
        $service->save();
        return redirect()->route('services.index')->with(['success'=>'تم التعديل بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id)->delete();
        return redirect()->route('services.index')->with(['success'=>'تم الحذف بنجاح']);

    }
}
