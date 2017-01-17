<?php

namespace App\Http\Controllers;

use App\Event;
use App\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class EventController extends Controller
{
    //

    public function __construct()
    { 
        $this->middleware('auth');
    }

    public function index(Request $request){
        $events = $request->user()->events()->get();
        
        return view('events.index',[
            'events' => $events
        ]);
    }
    public function create(Request $request){
        return view('events.create');
    }

    public function store(Request $request){
        
        $this->validate($request,[
                'name' => 'required|max:255',
                'image' => 'required|image'
        ]);
      
       
        $merchant= $request->user()->merchant()->value('id');
       
        if($request->hasFile('image') && Input::file('image')->isValid()) {
            $file = Input::file('image');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            
            $name = $timestamp. '-' .Input::file('image')->getClientOriginalName();
         

            $file->move(public_path().'/images/', $name);
            Event::create([
                'merchant_id'=>$merchant,
                'name'=> $request->name,
                'imagepath'=>$name
            ]);
         return redirect('/events')->with('success','Event has been created');
      
        }
        else{
            return redirect('/event/create');
        }
       
    }

    public function destroy(Request $request, Event $event){
    
        $event->delete();
        return redirect('/events');
    }

}