<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    //

    protected $fillable =[
      'location', 'dream_id',
    ];

    public function dream(){

      return $this->belongsTo('App\Dream', 'id', 'dream_id');
    }
}
