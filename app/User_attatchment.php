<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_attatchment extends Model
{
    //
    protected $table = 'users_attatchments';

    protected $fillable=[
      'user_id', 'path_avatar', 'background',
    ];

    public function user_attatchment(){
      $this->hasOne('App\User', 'id', 'user_id');
    }
}
