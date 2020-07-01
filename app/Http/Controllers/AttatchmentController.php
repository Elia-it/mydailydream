<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attatchment;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Validator;

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
        $old_path = $request->fileUp;
        $op = json_decode($old_path);
        if(!empty($op)){
          foreach ($op as $old) {
            Storage::delete($old);
          }
        }



        $images = $request->file('file');
        $arr_path = [];

        foreach($images as $image){
          if(preg_match("/\.(jpeg|png|jpg|pdf)$/", $image)){
            return response()->json([
              'message' => 'Invalid file(s)'
            ]);
          }
        }

        foreach($images as $image){
          $path = $image->store('dreams_images');
          $arr_path[] = $path;
        }

        return response()->json([
          'path' => $arr_path,
           'message'   => 'File(s) uploaded',
         ]);


        // $images = json_decode(stripslashes($request->data));
        // $lal = $request->file('select_file');
        // $images = $request->array;
        //
        // foreach ($images as $image) {
        //     // $validation = Validator::make($image, [
        //     //   'select_file' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        //     // ]);
        //     //
        //     // if($validation->passes()){
        //       $image->store('dreams_images');
        //     // }
        // }
        // return response()->json([
        //   'message'   => 'dhdhdhd',
        //   // 'uploaded_image' => '<img src="/images/'.$images.'" class="img-thumbnail" width="300" />',
        //   'class_name'  => 'alert-success'
        // ]);
      //
      //   foreach ($files as $image) {
      //     $validation = Validator::make($image, [
      //   'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
      //  ]);
      //  if($validation->passes())
      //  {
      //   $image = $request->file('select_file');
      //   $new_name = rand() . '.' . $image->getClientOriginalExtension();
      //   $image->move(public_path('images'), $new_name);
      //   return response()->json([
      //    'message'   => 'Image Upload Successfully',
      //    'uploaded_image' => '<img src="/images/'.$new_name.'" class="img-thumbnail" width="300" />',
      //    'class_name'  => 'alert-success'
      //   ]);
      //  }
      //  else
      //  {
      //   return response()->json([
      //    'message'   => $validation->errors()->all(),
      //    'uploaded_image' => '',
      //    'class_name'  => 'alert-danger'
      //   ]);
      //  }
      // }
      //   }
     //    $validation = Validator::make($request->all(), [
     //  'select_file' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
     // ]);
    //  if($validation->passes())
    //  {
    //   $image = $request->file('select_file');
    //   $new_name = rand() . '.' . $image->getClientOriginalExtension();
    //   $image->move(public_path('images'), $new_name);
    //   return response()->json([
    //    'message'   => 'Image Upload Successfully',
    //    'uploaded_image' => '<img src="/images/'.$new_name.'" class="img-thumbnail" width="300" />',
    //    'class_name'  => 'alert-success'
    //   ]);
    //  }
    //  else
    //  {
    //   return response()->json([
    //    'message'   => $validation->errors()->all(),
    //    'uploaded_image' => '',
    //    'class_name'  => 'alert-danger'
    //   ]);
    //  }
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
        // $file = Attatchment::FindOrFail($id);
        // $oldPath = $file->value('location');
        // File::delete("dream_images/$oldPath");

        if(!empty($request->file('update_file'))){
          $file = Attatchment::FindOrFail($id);
          $oldPath = $file->value('location');
          Storage::delete("$oldPath");

          // $uniqueId = Str::random(9);
          // $name = "id=".$uniqueId."_".$request->file('update_file')->getClientOriginalName();
          // $request->file('update_file')->move('dream_images', $name);
          $newPath = $request->file('update_file')->store('dreams_images');

          $file->update(["location" => $newPath]);

          return redirect("/dream/$file->dream_id/edit");

        }else{
          return redirect()->back()->with('no_file', "Nessun file selezionato");
        }





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
        $path = Attatchment::whereId($id)->value('location');
        Storage::delete($path);
        Attatchment::find($id)->delete();

         return redirect()->back()->with('delete_success', "il file è stato eliminato correttamente");
    }

}
