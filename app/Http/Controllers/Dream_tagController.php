<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dream_tag;

class Dream_tagController extends Controller
{
    //

    public function countPivotDreams_TagsByDreamId($id){
      $value = Dream_tag::all()->where('dream_id', $id)->count();

      return $value;
    }

    public function getDreams_tagsTableByDreamId($id){
      $value = Dream_tag::where('dream_id', $id)->get();

      return $value;
    }
}
