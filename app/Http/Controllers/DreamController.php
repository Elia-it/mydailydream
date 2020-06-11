<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Dream;
use App\Attatchment;
use App\Color;
use App\Emotion;
use App\Mood;
use App\Tag;
use App\Technique;
use App\Type;
use App\Dream_tag;

class DreamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
      $this->middleware('auth');
      $this->middleware('checkDream')->except('create');
    }

    public function index()
    {
        //
        // $dream = Dream::FindOrFail(1)->first();
        //
        // return view('user_pages.dreams.index', compact('dream'));

        return redirect('/home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $colors = Color::all();
        $emotions = Emotion::all();
        $moods = Mood::all();
        $techniques = Technique::all();
        $types = Type::all();
        $tags = Tag::all();

        return view('user_pages.dreams.create', compact('colors', 'emotions', 'moods', 'techniques', 'types', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // almeno una request!!!
        $dream = Dream::create($request->all());

        // if(empty($request->input('date'))){
        //   Dream::insert(['date' => Carbon::today()]);
        // }
        $prova = $request->input('date');


        $tags = $request->input('tag');



        if(!empty($request->input('tag'))){
          foreach($tags as $tag){
            $dream->tags()->attach($tag);
          }

        }


        // if(!empty($request->file('file'))){

          $files = $request->file('file');

          if($request->hasFile('file')){
            foreach($files as $file){
              $uniqueId = Str::random(9);
              $name = "id=".$uniqueId."_".$file->getClientOriginalName();
              $file->move('dream_images', $name);
              Attatchment::create(['location' => $name, 'dream_id' => $dream->id]);
            }
          }
          // foreach ($request->file('file') as $file){
          //   $name = $file->getClientOriginalName();
          //   $file->move('dream_images', $name);
          //   Attatchment::create(['location' => $name, 'dream_id' => $dream->id]);
          //   echo 1;
          // }
          // $name = $request->file('file')->getClientOriginalName();
          // $request->file('file')->move('dream_images', $name);
          // Attatchment::create(['location' => $name, 'dream_id' => $dream->id]);

         // }

        return redirect('/home');

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

        $dream = Dream::findOrFail($id);

        return view('user_pages.dreams.show', compact('dream'));
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
        $colors = Color::all();
        $emotions = Emotion::all();
        $moods = Mood::all();
        $techniques = Technique::all();
        $types = Type::all();
        $tags = Tag::all();

        $dream = Dream::findOrFail($id);

        return view('user_pages.dreams.edit', compact('dream', 'colors', 'emotions', 'moods', 'techniques', 'types', 'tags'));

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
        $dream = Dream::findOrFail($id);

        $dream->update($request->all());

        // $tags = $request->input('tag');
        // if(!empty($tags)){
        //   foreach($tags as $tag){
        //     if(!empty($tag)){
        //
        //       $dream->tags()->attach($tag);
        //     }else{
        //       $dream->tags()->detach($tag);
        //     }
        //   }
        // }




        $files = $request->file('add_file');

        if($request->hasFile('add_file')){
          foreach($files as $file){
            $uniqueId = Str::random(9);
            $name = "id=".$uniqueId."_".$file->getClientOriginalName();
            $file->move('dream_images', $name);
            Attatchment::create(['location' => $name, 'dream_id' => $dream->id]);
          }
        }

        $tags = $request->input('tag');

        if(!empty($tags)){

          $dream->tags()->sync($tags);


        }else{
          $dream->tags()->detach();
        }

        // if(!empty($request->file('file'))){
        //   $name = $request->file('file')->getClientOriginalName();
        //   $request->file('file')->move('dream_images', $name);
        //   Attatchment::create(['location' => $name, 'dream_id' => $dream->id]);
        //
        // }

         return redirect("dream/$dream->id");
         // return $allTags;

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
        $dream = Dream::findOrFail($id);
        $dream->delete();

        return redirect('/home');
    }
}
