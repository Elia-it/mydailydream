<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Dream;
use App\Attachment;
use App\Color;
use App\Emotion;
use App\Mood;
use App\Tag;
use App\Technique;
use App\Type;
use App\DreamTag;

class DreamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
      $this->middleware('auth');
      // $this->middleware('verified');
      $this->middleware('checkDream')->only('edit', 'update', 'delete');
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



        if(!empty($request->fileUp)){
          $files_path = json_decode($request->fileUp);

          foreach ($files_path as $file_path) {
            $file_ext = pathinfo($file_path, PATHINFO_EXTENSION);
            if($file_ext === 'pdf'){
              Attachment::create(['type' => 'pdf', 'location' => $file_path, 'dream_id' => $dream->id]);
            }elseif($file_ext === 'png' OR $file_ext === 'jpg' OR $file_ext === 'jpeg'){
              Attachment::create(['type' => 'img', 'location' => $file_path, 'dream_id' => $dream->id]);
            }else{
              return redirect()->back()->with('error', 'Extension not supported');
            }
          }
        }




// dd($files_path);
//           $files = $request->file('fileUp');
//
//
//
//
//
// dd($files);
//           if($request->hasFile('fileUp')){
//
//             foreach($files as $file){
//               $file_name = $file->getClientOriginalName();
//               $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
//               if($file_extension === 'pdf'){
//
//                 Attachment::create(['type' => 'pdf', 'location' => $pathFile, 'dream_id' => $dream->id]);
//
//               }elseif($file_extension === 'png' OR $file_extension === 'jpg' OR $file_extension === 'jpeg'){
//
//                 Attachment::create(['type' => 'img', 'location' => $pathFile, 'dream_id' => $dream->id]);
//
//               }
//
//
//
//
//               // $uniqueId = Str::random(9);
//               // $name = "id=".$uniqueId."_".$file->getClientOriginalName();
//               // $file->move('dream_images', $name);
//
//               // $pathFile = $file->store('dreams_images');
//               // Attachment::create(['location' => $pathFile, 'dream_id' => $dream->id]);
//
//
//             }
//           }
          // foreach ($request->file('file') as $file){
          //   $name = $file->getClientOriginalName();
          //   $file->move('dream_images', $name);
          //   Attachment::create(['location' => $name, 'dream_id' => $dream->id]);
          //   echo 1;
          // }
          // $name = $request->file('file')->getClientOriginalName();
          // $request->file('file')->move('dream_images', $name);
          // Attachment::create(['location' => $name, 'dream_id' => $dream->id]);

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

        if(!empty($request->fileUp)){
          $files_path = json_decode($request->fileUp);

          foreach ($files_path as $file_path) {
            $file_ext = pathinfo($file_path, PATHINFO_EXTENSION);
            if($file_ext === 'pdf'){
              Attachment::create(['type' => 'pdf', 'location' => $file_path, 'dream_id' => $dream->id]);
            }elseif($file_ext === 'png' OR $file_ext === 'jpg' OR $file_ext === 'jpeg'){
              Attachment::create(['type' => 'img', 'location' => $file_path, 'dream_id' => $dream->id]);
            }else{
              return redirect()->back()->with('error', 'Extension not supported');
            }
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
        //   Attachment::create(['location' => $name, 'dream_id' => $dream->id]);
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
