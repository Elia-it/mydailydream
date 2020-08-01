<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAttachment extends Model
{
    //
    protected $table = 'users_attachments';

    protected $fillable=[
      'user_id', 'background_type', 'path_avatar', 'background',
    ];

    public function userAttachment(){
      return $this->belongsTo('App\User', 'id', 'user_id');
    }

    public function checkImg(){
      if($this->path_avatar != 'no_gender.jpg' && $this->path_avatar != 'male.png' && $this->path_avatar != 'female.png'){
        return true;
      }
      return false;
    }

    public function isImg(){
      if($this->background_type === 'img'){
        return true;
      }
      return false;
    }


}
