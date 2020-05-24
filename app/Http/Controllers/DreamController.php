<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dream;

class DreamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct(){
    //   $this->middleware('auth');
    // }

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
        return view('user_pages.dreams.create');
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
        Dream::create($request->all());
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

        $dream = Dream::findOrFail($id);

        return view('user_pages.dreams.edit', compact('dream'));

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

        return redirect('/home');
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
