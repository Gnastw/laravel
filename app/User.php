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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function part(){

        return $this->hasOne(Part::class); // $this->hasOne('App\Part');

    }

    public function balance(){

        return $this->hasOne(Balance::class); // $this->hasOne('App\Balance');

    }

    public function trip(){

        return $this->hasOne(Trip::class); // $this->hasOne('App\Trip');

    }
    public function picture(){

        return $this->hasOne(Picture::class); // $this->hasOne('App\Picture');

    }
    public function comments(){
        return $this->hasMany(Comment::class); //this->hasMany
    }

    public function spendings(){
        return $this->belongsToMany(Spending::class);
    }
}
