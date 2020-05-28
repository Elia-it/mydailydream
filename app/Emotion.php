<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emotion extends Model
{
    //

    protected $fillable = [
        'name',
    ];

    public function dream(){
      return $this->belongsTo('App\dream', 'emotion_id');
    }
}
