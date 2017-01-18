<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function events(){
        return $this->hasManyThrough('App\Event', 'App\Merchant');
    }
    public function merchant(){
        return $this->hasOne(Merchant::class);
    }
   
    public function transactions()
    {
        return $this->hasMany(Transaction::class);   
    }
    public static function boot()
    {
        parent::boot();    
    
        // cause a delete of a product to cascade to children so they are also deleted
        static::deleted(function($user)
        {
            $product->events()->delete();
           
        });
    }    
    public function routeNotificationForNexmo()
    {
        return $this->phone_number;
    }
}
