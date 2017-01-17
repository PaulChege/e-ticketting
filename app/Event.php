<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = ['merchant_id','name','imagepath'];

    public function  merchant(){
        return $this->belongsTo(Merchant::class);
    }
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
    public static function boot()
    {
        parent::boot();    
    
        // cause a delete of a product to cascade to children so they are also deleted
        static::deleted(function($event)
        {
            $event->tickets()->delete();
          
        });
    }    
}
