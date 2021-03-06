<?php

namespace App\Http\Controllers\Company;
use App\City;
use App\Company;
use App\Http\Controllers\Controller;
use App\Worker;
use App\WorkerLang;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Doctrine\Inflector\Language as InflectorLanguage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use JetBrains\PhpStorm\Language;
class WorkerController extends Controller
{
    public function index()
    {
        return view('company-dashbord.worker.index')->with('workers', Worker::where('company_id',auth('company')->id())->get());
    }
    public function create()
    {
        return view('company-dashbord.worker.create')->with('governments',City::where('parent_id',0)->get())->with('companys',Company::get());
    }

    public function get_state(Request $request)
    {
        $state = City::where('parent_id',$request->parent)->get();
        return $state;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $worker = new Worker();
        $worker->name = $request->name;
        $worker->company_id  = auth('company')->id();
        $worker->nationality = $request->nationality;
        $worker->religion = $request->religion;
        $worker->DOB  = $request->DOB ;
        // $worker->social_status = 0;
        $worker->place_of_birth = $request->place_of_birth;
        $worker->living = $request->living;
        $worker->social_status  = $request->social_status;
        $worker->number_of_child = $request->number_of_child;
        $worker->weight = $request->weight;
        $worker->height  = $request->height ;
        $worker->skin_colour = $request->skin_colour;
        $worker->governorate_id = $request->governorate_id;
        $worker->state_id = $request->state_id;

        $worker->degree = $request->degree;
        $worker->salary  = $request->salary ;
        // $worker->image = $request->image;
        $array=[];
        foreach($request->image as $image){
            array_push($array,$image->store('worker_image'));
        }

        $worker->image  = json_encode($array);

        $worker->age = Carbon::parse( $request->DOB)->diff(Carbon::now())->y;
        $worker->skill=['ar'=>$request->skill_ar ,'en'=>$request->skill_en];
        $worker->dec=['ar'=>$request->dec_ar ,'en'=>$request->dec_en];

        $worker->save();
        foreach($request->language as $key=>$langd){
        
            $lang =new  WorkerLang();
            $lang -> name =$langd['name'];
            $lang -> value =$langd['value'];
            $lang -> worker_id = $worker->id;
            $lang->save();
        }
        return redirect()->route('company.workers.index')->with(['success'=>'???? ?????????????? ??????????']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function show(Worker $worker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $work = Worker::find($id);
        $states =City::where('parent_id',$work->governorate_id)->get();
        return view('company-dashbord.worker.edit')->with('governments',City::where('parent_id',0)->get())->with('work',$work)->with('states',$states)->with('companys',Company::get());
    }
    public function logout_company()
    {
        Auth::guard('company')->logout();
        toastr()->success(trans('logout successfuly'));

        return redirect()->route('home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $worker = Worker::find($id);
        $worker->name = $request->name;
        $worker->company_id  = $request->company_id ;
        $worker->nationality = $request->nationality;
        $worker->religion = $request->religion;
        $worker->DOB  = $request->DOB ;
        // $worker->social_status = 0;
        $worker->place_of_birth = $request->place_of_birth;
        $worker->living = $request->living;
        $worker->social_status  = $request->social_status;
        $worker->number_of_child = $request->number_of_child;
        $worker->weight = $request->weight;
        $worker->height  = $request->height ;
        $worker->skin_colour = $request->skin_colour;
        $worker->governorate_id = $request->governorate_id;
        $worker->state_id = $request->state_id;
        $worker->degree = $request->degree;
        $worker->salary  = $request->salary ;
        
        $array=[];
        if($request->test != null){
        foreach($request->test as $r){
            
            array_push($array,$r);
        }
    }
        if($request->image != null){
            foreach($request->image as $image){
                array_push($array,$image->store('worker_image'));
            }
        }
       
        
        $worker->image  = json_encode($array);

        $worker->age = Carbon::parse( $request->DOB)->diff(Carbon::now())->y;
        $worker->skill=['ar'=>$request->skill_ar ,'en'=>$request->skill_en];
        $worker->dec=['ar'=>$request->dec_ar ,'en'=>$request->dec_en];

        $worker->save();
        $langs = WorkerLang::where('worker_id',$worker->id)->truncate();
        foreach($request->language as $key=>$langd){
        
            $lang =new  WorkerLang();
            $lang -> name =$langd['name'];
            $lang -> value =$langd['value'];
            $lang -> worker_id = $worker->id;
            $lang->save();
        }
        return redirect()->back()->with(['success'=>'???? ?????????????? ??????????']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $worker = Worker::find($id)->delete();
        return redirect()->back()->with(['success'=>'???? ?????????? ??????????']);

    }
}
