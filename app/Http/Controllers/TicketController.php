<?php

namespace App\Http\Controllers;
use App\Ticket;
use App\Transaction;
use App\Event;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use PDF;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    //

     public function __construct()
    { 
        $this->middleware('auth');
        
        
    }
    public function index(Request $request,Event $event){
         return view('tickets.manage',[
            
            'event'=>$event
        ]);
    }

    public function buy(Request $request,Event $event){
       
       
        return view('tickets.buy',[
            'event'=>$event
        ]);
    }
//create ticket type
    public function store(Request $request,$event_id){
        
        Ticket::create([
            'event_id'=>$event_id,
            'name'=>$request->name,
            'price'=>$request->price
        ]);
        return redirect('/event/tickets/manage/'.$event_id);
    }

//create transaction
    public function create(Request $request,Event $event){
        $tickets=$event->tickets()->get();
        $input= Input::all();
        
        foreach($tickets as $ticket){
            
            if (isset($input[$ticket->id])){
                $quantity=$input[$ticket->id];
                for($i=0;$i<$quantity;$i++){
                Transaction::create([
                    'event_id'=>$event->id,
                    'user_id'=>$request->user()->id,
                    'amount'=>$ticket->price,
                    'ticket_id'=>$ticket->id,
                    'ticket_no'=>$request->user()->id.$event->id.$ticket->id.rand(1111,9999)
                 ]); 
                }   
            }
        }
       
      
        
        return redirect('/event/ticket/mytickets');
        
    }

    public function download(Request $request,Transaction $transaction){
      $data=['transaction'=>$transaction];
      $pdf = PDF::loadView('tickets.download', $data);
      return $pdf->download('ticket'.$transaction->id.'.pdf');
        
    }


    public function mytickets(Request $request){
        $transactions=$request->user()->transactions()->get();
        return view('tickets.mytickets',[
            'transactions'=>$transactions
        ]);
    }

    public function destroy(Request $request,$event_id,Ticket $ticket){
        $ticket->delete();
        return redirect('/event/tickets/manage/'.$event_id);
    }
}
