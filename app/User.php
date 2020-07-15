<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'gender', 'email', 'password', 'newsletter',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin(){

      if($this->role->role == 'admin'){
        return true;
      }
      return false;
    }


    public function role(){
      return $this->belongsTo('App\Role');
    }

    public function tag(){
      return $this->belongsToMany('App\Tag');
    }

    public function user_attatchment(){
      return $this->hasOne('App\User_attatchment', 'user_id', 'id');
    }

    public function isSubToNewsletter(){
      if($this->newsletter == 1){
        return true;
      }
      return false;
    }

    public function pathForGender(){
      if($this->gender === 'male'){
        $img = 'male.png';
      }elseif($this->gender === 'female'){
        $img = 'female.png';
      }elseif($this->gender === 'prefer_not_to_say'){
        $img = 'no_gender.jpg';
      }

      return $img;
    }

}
