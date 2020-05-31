<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attatchment;
use Illuminate\Support\Facades\File;

class AttatchmentController extends Controller
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
        $file = Attatchment::FindOrFail($id);
        $oldPath = $file->value('location');
        File::delete("dream_images/$oldPath");
        $name = $request->file('file')->getClientOriginalName();
        $request->file('file')->move('dream_images', $name);

        $file->update(["location" => $name]);

        return redirect("/dream/$file->dream_id/edit");

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
        $path = Attatchment::findOrFail($id)->value('location');
        File::delete("dream_images/$path");
        Attatchment::find($id)->delete();

        return redirect("/dream/$file->dream_id/edit");
    }
}
