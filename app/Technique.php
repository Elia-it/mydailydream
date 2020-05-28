<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technique extends Model
{
    //
    protected $fillable = [
      'name',
    ];


    public function dream(){
      return $this->belongsTo('App\Dream', 'technique_id');
    }
}
