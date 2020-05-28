<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emotion;

class EmotionController extends Controller
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

        if(Emotion::where('name', '=', $emotion)->exists()){
          return redirect('/adminpanel/emotions/');
        }else{
        Emotion::create(['name' => $emotion]);


        return redirect('/adminpanel/emotions/');
      }

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
        $emotion = Emotion::findOrFail($id)->update(['name' => $request->emotion]);
        return redirect('adminpanel/emotions');
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
        $emotion= Emotion::findOrFail($id);
        $emotion->delete();

        return redirect('/adminpanel/emotions');
    }
}
