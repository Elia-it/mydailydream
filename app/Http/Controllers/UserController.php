<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{


  public function __construct(){
    $this->middleware('auth');
    $this->middleware('isAdmin');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $users = User::all();
        return view('admin_pages.users.index', compact('users'));
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
        if($id == auth()->user()->id){
          $user = User::findOrFail($id);
          return view('admin_pages.personal_profile.show', compact('user'));
        }
        else
        {
          return view('admin_pages.users.edit', compact('user'));
        }

        //$user = User::findOrFail($id)->first();
        //return view("admin_pages.profiles.profile", compact('user'));
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
        $user = User::findOrFail($id);
        if($id != auth()->user()->id){

          return view('admin_pages.users.edit', compact('user'));
        }else{
          return view('admin_pages.personal_profile.edit', compact('user'));
        }
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
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('users.table');
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
        $user = User::findOrFail($id);
        $user->delete();
        $link = route('users.table');

        return response()->json([
          'link' => $link,
        ]);
        return redirect()->route('users.table');
    }
}
