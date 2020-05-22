<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function dream(){
      return $this->belongsToMany('App\Dream');
    }
}
