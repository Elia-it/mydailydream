<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mood extends Model
{
    //
    public function dream(){
      return $this->hasMany('App\Dream');
    }
}
