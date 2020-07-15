<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;

class AdminColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $colors = Color::all();
        return view('admin_pages/colors/index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin_pages/colors/create');
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
        $colors = Color::all();

        foreach ($colors as $color) {
          if($color->name == $request->color_name OR $color->hex == $request->hex){
            return redirect()->back()->with('error', 'The color name or hex is already set');
          }
        }

        Color::create(["name" => $request->color_name , "hex" => $request->hex]);
        // return redirect('adminpanel/colors');
        return redirect()->route('admin.color.index');
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
        $color = Color::findOrFail($id)->first();
        return view('admin_pages/colors/edit', compact('color'));
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
        $total_colors = Color::all();


        $color_old = Color::findOrFail($id);

        if($request->color_name == $color_old->name){
          foreach ($total_colors as $color ){
            if($request->hex == $color->hex){
              return redirect()->back()->with('error_hex', "The Hex value is already set, color_id: $color->id");
            }
          }
          return redirect("adminpanel/color/")->with('success', 'Color updated!');
        }

        Color::findOrFail($id)->update(["name" => $request->color , "hex" => $request->hex]);
        return redirect('adminpanel/colors/index');
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
        Color::findOrFail($id)->delete();
        return redirect()->route('admin.color.index');
    }
}
