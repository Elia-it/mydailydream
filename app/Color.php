<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //
    protected $fillable = [
      'name' , 'hex',
    ];

    public function dream(){
      return $this->belongsTo('App\Dream', 'color_id', 'id');
    }
}
