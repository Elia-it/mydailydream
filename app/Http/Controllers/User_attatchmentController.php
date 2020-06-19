<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User_attatchment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class User_attatchmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $attatch = User_attatchment::FindOrFail($id);
        $background = $attatch->background;
        if($request->hasFile('background')){
          $file = $request->file('background');
          $backgroundId = Str::random(5);
          $newBackground = 'id=' . $backgroundId . '_' .$file->getClientOriginalName();

          if($background[0] != '#'){

            File::delete("profiles/backgrounds/$background");

          }

          $attatch->update([
            'background_type' => 'img',
            'background' => $newBackground
          ]);

          $file->move('profiles/backgrounds', $newBackground);

        }elseif(!empty($request->background)){
          if($background[0] != '#'){

            File::delete("profiles/backgrounds/$background");

          }

          $newColor = $request->background;
          $attatch->update([
            'background_type' => 'hex',
            'background' => $newColor
          ]);

        }



        if($request->hasFile('path_avatar')){
          $file = $request->file('path_avatar');
          $uniqueId = Str::random(5);
          $name = "id=".$uniqueId."_".$file->getClientOriginalName();
          $file->move('profiles/avatars', $name);

          // $attatch = User_attatchment::findOrFail($id);
          if(!is_null($attatch->path_avatar)){
            if($attatch->checkImg()){
              File::delete("profiles/avatars/$attatch->path_avatar");
            }
          }

          $attatch->update([
            'path_avatar' => $name,
          ]);
        }

        return redirect("profile/Auth::user()->id/edit");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = Auth::user();
        $attatch = User_attatchment::findOrFail($id);
        if($attatch->path_avatar != 'no_gender.jpg' && $attatch->path_avatar != "male.png" && $attatch->path_avatar != "female.png"){
          File::delete("profiles/avatars/$attatch->path_avatar");

          if($user->gender === 'prefer_not_to_say'){
            $attatch->update(['path_avatar' => 'no_gender.jpg']);
          }elseif($user->gender === 'male'){
            $attatch->update(['path_avatar' => 'male.png']);
          }elseif($user->gender === 'female'){
            $attatch->update(['path_avatar' => 'female.png'
            ]);
          }
        }


        return redirect("profile/Auth::user()->id/edit");
    }
}
