<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $fillable = [
        'event_id','name','price'
    ];


    public function event(){
        return $this->belongsTo(Event::class);
    }
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

}
