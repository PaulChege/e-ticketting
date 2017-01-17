<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable=[
        'event_id','user_id','amount','ticket_id','ticket_no'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }
    

    public function event(){
        return $this->belongsTo(Event::class);
    }
}
