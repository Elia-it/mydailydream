<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dream_tag extends Model
{
    //

    protected $table = 'dreams_tags';

    protected $fillable = [
      'dream_id', 'tag_id'
    ];



}
