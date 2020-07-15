<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //

    protected $fillable= [
      'role',
    ];

    public function user(){
      return $this->hasMany('App\User');
    }

    public function getRoles(){
      $roles = Role::all();
      return $roles;
    }
}
