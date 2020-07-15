<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emotion;

class AdminEmotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         //
         $emotions = Emotion::all();
         return view('/admin_pages/emotions/index', compact('emotions'));
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         //

         return view('/admin_pages/emotions/create');
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
         $emotion = $request->emotion;
         if(Emotion::where('name', '=', $request->emotion)->exists() OR Emotion::where('emoticon', '=', $request->emoticon)->exists()){
           return redirect()->route('admin.emotion.index')->with('error', 'Emotion is already exist');
         }
         Emotion::create(['name' => $request->emotion, 'emoticon' => $request->emoticon]);
         return redirect()->route('admin.emotion.index');

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

         // $emotion = Emotion::FindOrFail($id);
         // return view('admin_pages.emotions.show', compact('emotion'));
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

         $emotion = Emotion::FindOrFail($id);
         return view('admin_pages.emotions.edit', compact('emotion'));
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
         $all_emotions = Emotion::all();
         $emotion_update = Emotion::findOrFail($id);

         if($emotion_update->name == $request->emotion){
           if($emotion_update->emoticon == $request->emoticon){
             return redirect()->route('admin.emotion.index');
           }
           foreach ($all_emotions as $stored_emotion) {
             if($request->emoticon == $stored_emotion->emoticon){
               return redirect()->back()->with('error', 'The emoticon is already exist');
             }
           }
           $emotion_update->update(["name" => $request->emotion , "emoticon" => $request->emoticon]);

         }

         if($emotion_update->emoticon == $request->emoticon){
           if($emotion_update->name == $request->emotion){
             return redirect()->route('admin.emotion.index');
           }
           foreach ($all_emotions as $stored_emotion) {
             if($request->emotion == $stored_emotion->name){
               return redirect()->back()->with('error', 'The name of emoticon is already exist');
             }
           }
           $emotion_update->update(['name' => $request->emotion, 'emoticon' => $request->emoticon]);

         }
         //
         // $emotion = Emotion::findOrFail($id)->update(['name' => $request->emotion]);
         // return redirect('adminpanel/emotions');
         return redirect()->route('admin.emotion.index');
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
         $emotion = Emotion::findOrFail($id)->delete();

         return redirect()->route('admin.emotion.index');
     }
}
