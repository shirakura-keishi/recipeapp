<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function getData(){
        return $this->user->name;
    }
}
