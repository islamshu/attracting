<?php

namespace App\Http\Controllers;

use App\FirstSection;
use App\Menu;
use App\MessageLetter;
use App\Page;
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
        $workers = Worker::inRandomOrder(6)->get();
        $how_works = Work::orderBy('order','asc')->get();
        $statstic = Statistic::first();
    
        
       return view('frontend.index',compact('sliders','fetures','workers','services','how_works','statstic'));
    }
    public function get_single_work($id)
    {
        $worker = Worker::find(decrypt($id));
        return view('frontend.workers.details',compact('worker'));

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
}
