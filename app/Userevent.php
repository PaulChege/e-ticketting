<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userevent extends Model
{
    //

    public function user(){
        $this->belongsTo(User::class);
    }

    public function event(){
        $this->belongsTo(Event::class);
    }
}
