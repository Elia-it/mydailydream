<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

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

    public function dashboard(){
      $user = auth()->user();
      return view('admin_pages/dashboard/dashboard', compact('user'));
    }
}
