<?php

namespace App\Http\Controllers;
use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //

    public function _construct(){
        $this->middlware('auth');
    }

    public function index(Request $request){
        $events = $request->user()->events()->get();
        return view('events.index',[
            'events' => $events
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
                'name' => 'required|max:255',
        ]);
        $request->user()->events()->create([
              'name'=> $request->name,
        ]);

        return redirect('/events');
    }

    public function destroy(Request $request, Event $event)
    {
    
        $event->delete();
        return redirect('/events');
    }

}