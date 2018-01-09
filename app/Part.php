<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    public function user(){
        return $this->belongsTo(User::class); // User::class <=> App\User
    }
}
