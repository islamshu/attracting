<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\General;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index()
    {
        return view('admin-dashbord.general.index');
    }

  
    public function store(Request $request)
    {
        if($request->hasFile('general_file')){
            foreach ($request->file('general_file') as $name => $value) {
                if($value == null){
                    continue;
                }
                General::setValue($name, $value->store('general'));
            }
        }

        foreach ($request->input('general') as $name => $value){
            if($value == null){
                continue;
            }
            General::setValue($name, $value);
        }

        session()->flash('success', 'تم تحديث البيانات بنجاح');
        return redirect()->back();
    }
    public function show_translate($lang)
    {
        $language = $lang;

        return view('admin-dashbord.language_view_en', compact('language'));
    }
 
    public function key_value_store(Request $request)
    {
        $data = openJSONFile($request->id);
        foreach ($request->key as $key => $key) {
            $data[$key] = $request->key[$key];
        }
        saveJSONFile($request->id, $data);
        return back();
    }
}
