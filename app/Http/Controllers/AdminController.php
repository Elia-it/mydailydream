<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    //
    public function __construct(){
      $this->middleware('isAdmin');
    }

    public function allUsers(){
      $user = User::with('role')->first();
      return view('/test', compact('user'));
    }

    
}
