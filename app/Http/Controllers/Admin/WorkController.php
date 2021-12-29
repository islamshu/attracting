<?php

namespace App\Http\Controllers\Admin;

use App\FirstSection;
use App\Http\Controllers\Controller;
use App\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index()
    {
        return view('admin-dashbord.how_its_work.index')->with('works',Work::get());
    }
    public function create()
    {
        return view('admin-dashbord.how_its_work.create');
    }
    public function store(Request $request)
    {
            $work = new Work();
            $work->icon = $request->icon;
            $work->title = ['ar'=>$request->title_ar,'en'=>$request->title_en];
            $work->dec =['ar'=>$request->dec_ar,'en'=>$request->dec_en];
            $work->order = Work::count()+1;
            $work->save();
            return redirect()->route('how_its_work.index')->with(['success'=>'تمت الإضافة بنجاح']);
    }
    
    public function edit($id)
    {
        return view('admin-dashbord.how_its_work.edit')->with('work',Work::find($id));
    }
    public function updateOrder(Request $request){
        if($request->has('ids')){
            $arr = explode(',',$request->input('ids'));
            
            foreach($arr as $sortOrder => $id){
                $menu = Work::find($id);
                $menu->order = $sortOrder;
                $menu->save();
            }
            return ['success'=>true,'message'=>'Updated'];
        }
    }
    public function update(Request $request,$id)
    {
            $work = Work::find($id);
            $work->icon = $request->icon;
            $work->title = ['ar'=>$request->title_ar,'en'=>$request->title_en];
            $work->dec =['ar'=>$request->dec_ar,'en'=>$request->dec_en];
            $work->save();
            return redirect()->route('how_its_work.index')->with(['success'=>'تمت التعديل بنجاح']);
    }
    public function destroy($id)
    {
        $work = Work::find($id)->delete();
        return redirect()->route('how_its_work.index')->with(['success'=>'تمت الحذف بنجاح']);

    }
    
}
