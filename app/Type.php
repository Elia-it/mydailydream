<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    protected $fillable =[
      'name'
    ];

    public function dream(){
      return $this->belongsTo('App\Dream', 'type_id');
    }
}
