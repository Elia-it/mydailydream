<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emotion extends Model
{
    //
    public function dream(){
      return $this->hasMany('App\dream');
    }
}
