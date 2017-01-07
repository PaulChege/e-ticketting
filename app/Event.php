<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = ['name'];

    public function  user(){
        return $this->belongsTo(User::class);
    }
    public function userevents(){
        return $this->belongsTo(Userevent::class);
    }
}
