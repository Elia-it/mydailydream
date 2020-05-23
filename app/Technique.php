<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technique extends Model
{
    //
    public function dream(){
      return $this->hasMany('App\Dream');
    }
}
