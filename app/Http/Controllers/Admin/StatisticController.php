<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
   
    public function index()
    {
      return view('admin-dashbord.statistic')->with('static',Statistic::first());
    }

    
    public function store(Request $request)
    {
        $sta = Statistic::first();
        if($request->image != null){
            $sta->image = $request->image->store('statistic');
        }
        $sta->save();
        session()->flash('success', 'تم تحديث البيانات بنجاح');
        return redirect()->back();

    }

}
