<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request){
        $data = Menu::orderBy('sort_id','asc')->get();
        return view('admin-dashbord.menu.index',compact('data'));
    }

    public function updateOrder(Request $request){
        if($request->has('ids')){
            $arr = explode(',',$request->input('ids'));
            
            foreach($arr as $sortOrder => $id){
                $menu = Menu::find($id);
                $menu->sort_id = $sortOrder;
                $menu->save();
            }
            return ['success'=>true,'message'=>'Updated'];
        }
    }
    public function create(){
        return view('admin-dashbord.menu.create');
    }
    public function store(Request $request){
        $menu = new Menu();
        $menu->title = ['ar'=>$request->titla_ar,'en'=>$request->title_en];
        $menu->url=$request->url;
        $menu->sort_id = Menu::count() +1 ;
        $menu->save();
        return redirect()->route('menu.index')->with(['success'=>'تم الإضافة بنجاح']);
    }
    public function edit($id){
        $menu = Menu::find($id);
        return view('admin-dashbord.menu.edit',compact('menu'));
    }
    public function update(Request $request,$id)
    {
        $menu = Menu::find($id);
        $menu->title = ['ar'=>$request->titla_ar,'en'=>$request->title_en];
        $menu->url=$request->url;
        $menu->save();
        return redirect()->route('menu.index')->with(['success'=>'تم التعديل بنجاح']);
    }
    public function destroy($id)
    {
        $menu = Menu::find($id)->delete();
        return redirect()->route('menu.index')->with(['success'=>'تم الحذف بنجاح']);
    }
}
