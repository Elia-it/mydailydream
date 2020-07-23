<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Technique;

class AdminTechniqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         //
         $techniques = Technique::all();

         return view('admin_pages.techniques.index', compact('techniques'));
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         //
         return view('admin_pages/techniques/create');
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
         $techniques = Technique::all();

         foreach ($techniques as $technique) {
           if($technique->name == $request->technique_name){
             return redirect()->back()->with('error', 'The technique name or hex is already set');
           }
         }

         Technique::create(["name" => $request->technique_name]);
         // return redirect('adminpanel/techniques');
         return redirect()->route('admin.technique.index');
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
         $technique = technique::findOrFail($id);
         return view('admin_pages/techniques/edit', compact('technique'));
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
         $total_techniques = Technique::all();


         $technique_to_update = Technique::findOrFail($id);

         foreach($total_techniques as $technique_all){
           if($technique_all->id == $id){
             continue;
           }
           if($technique_all->name == $request->technique_name){
             return redirect()->back()->with('error', 'The technique already exist');
           }
         }

         $technique_to_update->update(["name" => $request->technique_name]);
         return redirect()->route('admin.technique.index');
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
         Technique::findOrFail($id)->delete();
         return redirect()->route('admin.technique.index');
     }
}
