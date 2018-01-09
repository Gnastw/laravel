<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spending extends Model
{
    protected $fillable = [
        'title', 'price', 'description'
    ];

    public function users(){
        return $this->belongsToMany(User::class)->withPivot('price');
    }
}
