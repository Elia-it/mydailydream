<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mood extends Model
{
    //

    protected $fillable=[
      'name'
    ];

    public function dream(){
      return $this->belongsTo('App\Dream', 'mood_id');
    }
}
