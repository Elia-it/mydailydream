<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProvaController extends Controller
{
    //
    public function prova(){
      return view('prova');
    }

    public function provaUp(Request $req){
      Storage::disk('local')->put('file.txt', 'Contents');
      return back();
    }
}
