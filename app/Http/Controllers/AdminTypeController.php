<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;

class AdminTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         //
         $types = Type::all();

         return view('admin_pages.types.index', compact('types'));
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         //
         return view('admin_pages/types/create');
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
         $types = Type::all();

         foreach ($types as $type) {
           if($type->name == $request->type_name){
             return redirect()->back()->with('error', 'The type name or hex is already set');
           }
         }

         Type::create(["name" => $request->type_name]);
         // return redirect('adminpanel/types');
         return redirect()->route('admin.type.index');
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
         $type = Type::findOrFail($id);
         return view('admin_pages/types/edit', compact('type'));
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
         $total_types = Type::all();


         $type_to_update = Type::findOrFail($id);

         foreach($total_types as $type_all){
           if($type_all->id == $id){
             continue;
           }
           if($type_all->name == $request->type_name){
             return redirect()->back()->with('error', 'The type already exist');
           }
         }

         $type_to_update->update(["name" => $request->type_name]);
         return redirect()->route('admin.type.index');
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
         Type::findOrFail($id)->delete();
         return redirect()->route('admin.type.index');
     }
}
