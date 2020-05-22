<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dream extends Model
{
    //
    protected $fillable = [
      'status', 'user_id', 'Type_id', 'emotion_id', 'techniques_id', 'mood_id', 'color_id', 'title', 'content', 'date', 'is_in_first_person',
    ];


    public function isFirstPerson($firstPerson){
        if($firstPerson == '0'){

        $first =  "No, It wasn't in first person";

      }elseif($firstPerson == '0'){

        $first = "Yes, it was in first person";

      }

      return $first;
    }


    public function type(){
      return $this->belongsTo('App\Type');
    }

    public function techniques(){
      return $this->belongsTo('App\Techniques');
    }

    public function mood(){
      return $this->belongsTo('App\Mood');
    }

    public function emotion(){
      return $this->belongsTo('App\Emotion');
    }

    public function color(){
      return $this->belongsTo('App\Color');
    }

    public function attachment(){
      return $this->belongsTo('App\Attachment');
    }

}
