<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dream extends Model
{
    //
    protected $fillable = [
      'status', 'user_id', 'type_id', 'emotion_id', 'technique_id', 'mood_id', 'color_id', 'title', 'content', 'date', 'is_in_first_person',
    ];


    public function isFirstPerson(){
      if($this->is_in_first_person == 1){
        return true;
      }

      return false;
    }


    public function isPublish(){
      if($this->status == "publish"){
        return true;
      }
      return false;
    }

    public function getDreamsByUserId($id){
      $dreams = Dream::where('user_id', $id)->get();
      return $dreams;
    }

    public function type(){
      return $this->hasOne('App\Type', 'id', 'type_id');
    }

    public function technique(){
      return $this->hasOne('App\Technique', 'id', 'technique_id');
    }

    public function mood(){
      return $this->hasOne('App\Mood', 'id', 'mood_id');
    }

    public function emotion(){
      return $this->hasOne('App\Emotion', 'id', 'emotion_id');
    }

    public function color(){
      return $this->hasOne('App\Color', 'id', 'color_id');
    }

    public function attatchment(){
      return $this->hasMany('App\Attatchment', 'dream_id', 'id');
    }

    public function tags(){
      return $this->belongsToMany('App\Tag', 'dreams_tags');
    }

}
