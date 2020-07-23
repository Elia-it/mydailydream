<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mood;

class AdminMoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $moods = Mood::all();

        return view('admin_pages.moods.index', compact('moods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin_pages/moods/create');
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
        $moods = Mood::all();

        foreach ($moods as $mood) {
          if($mood->name == $request->mood_name){
            return redirect()->back()->with('error', 'The mood name or hex is already set');
          }
        }

        mood::create(["name" => $request->mood_name]);
        // return redirect('adminpanel/moods');
        return redirect()->route('admin.mood.index');
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
        $mood = Mood::findOrFail($id);
        return view('admin_pages/moods/edit', compact('mood'));
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
        $total_moods = Mood::all();


        $mood_to_update = Mood::findOrFail($id);

        foreach($total_moods as $mood_all){
          if($mood_all->id == $id){
            continue;
          }
          if($mood_all->name == $request->mood_name){
            return redirect()->back()->with('error', 'The Mood already exist');
          }
        }

        $mood_to_update->update(["name" => $request->mood_name]);
        return redirect()->route('admin.mood.index');
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
        Mood::findOrFail($id)->delete();
        return redirect()->route('admin.mood.index');
    }
}
