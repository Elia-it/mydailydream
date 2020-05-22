<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminControllers extends Controller
{
    //
    public function __construct(){
      $this->middleware('isAdmin');
    }

    Public function allUsers(){
      $user = User::with('role')->first();
      return view('/test', compact('user'));
    }

}
