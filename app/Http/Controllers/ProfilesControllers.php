<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilesControllers extends Controller
{
    //

    public function userUpdate(Request $request, $id){
      return view('/profile/profile');
    }
}
