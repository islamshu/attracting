<?php

namespace App\Http\Controllers;

use App\City;
use App\FirstSection;
use App\FrontReplay;
use App\Menu;
use App\MessageLetter;
use App\Page;
use App\SendFront;
use App\Service;
use App\Slider;
use App\Work;
use App\Worker;
use Session;
use App\Statistic;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status',1)->get();
        $services = Service::where('status',1)->get();

        $fetures = FirstSection::first();
        $workers = Worker::with('company')->where('is_show',1)->whereHas('company', function ($q)  {
            $q->where('status', 1);
        })->inRandomOrder(6)->get();
        $how_works = Work::orderBy('order','asc')->get();
        $statstic = Statistic::first();
        
    
        
       return view('frontend.index',compact('sliders','fetures','workers','services','how_works','statstic'));
    }
    public function contact_us(){
        return view('frontend.contact_us');
    }
    public function post_contact_us(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'massage'=>'required',
        ]);

        SendFront::create($request->all());
        toastr()->success(trans('Send successfuly'));

        return redirect()->back();
    }
    public function get_single_work($id)
    {
        $worker = Worker::find(decrypt($id));
        return view('frontend.workers.details',compact('worker'));

    }
    public function FrontReplay(Request $request){
        $message = new FrontReplay();
        $message->message_id = $request->message_id;
        $message->user_type = $request->user_type;
        $message->body = $request->body;
        $message->save();
        return redirect()->back()->with(['success'=>'تم الارسال بنجاح']);
    }
    public function change_lang($lang){
        Session::put('lang', $lang);
        return redirect()->back();
    }
    public  function page($slug)
    {
       $page = Page::where('slug',$slug)->first();
       return view('frontend.page',compact('page'));
    }
    public function MessageLetter(Request $request){
        $meesage = MessageLetter::where('email',$request->email)->first();
        if($meesage){
            return 'false';
        }else{
            $meesage = new MessageLetter();
            $meesage->email = $request->email;
            $meesage->save();
            return 'true';
        }

    }
   
    public function fillter(Request $request)
    {
        // $workers =Worker::get(); 
        $goverments = City::where('parent_id',0)->get();
        $query  = Worker::query()->where('is_show',1)->with('company')->whereHas('company', function ($q) use ($request) {
            $q->where('status', 1);
        });

        $query->when($request->title, function ($q) use ($request) {
            return $q->where('name', $request->title);
        });
        $query->when($request->governorate_id, function ($q) use ($request) {
            // if($request->governorate_id != )
            return $q->where('governorate_id', $request->governorate_id);
        });
        $query->when($request->state_id, function ($q) use ($request) {
            // if($request->governorate_id != )
            return $q->where('state_id', $request->state_id);
        });
        $query->when($request->natonality, function ($q) use ($request) {
            return $q->where('nationality', $request->natonality);

        });
        
        $query->when($request->learn, function ($q) use ($request) {
            if($request->learn == 0 ){
                return ;
            }else{
                return $q->where('degree', $request->learn - 1);

            }
        });
        $query->when($request->states, function ($q) use ($request) {
            if($request->states == 0 ){
                return ;
            }else{
                return $q->where('social_status', strval($request->states - 1));
            }
        });
        $query->when($request->states, function ($q) use ($request) {
            if($request->states == 0 ){
                return ;
            }else{
                return $q->where('social_status', strval($request->states - 1));
            }
        });
        if($request->min_price != null || $request->max_price != null )
        $query->whereBetween('salary', [$request->min_price, $request->max_price]);

        
        $workers = $query->paginate(8);
        
        return view('frontend._fillter',compact('goverments','workers','request'));
    }
 
}
