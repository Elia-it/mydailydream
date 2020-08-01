<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Dream;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\UserAttachment;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
      $this->middleware('checkProfile')->except('setNewsletter');
    }


    public function index()
    {
        //

        return view('user_pages/profile/profile');
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
        $user = User::findOrFail($id);
        $dreams = Dream::where('user_id', $id)->get();
        $asset = UserAttachment::where('user_id', $id)->first();
        return view('user_pages/profile/profile', compact('dreams', 'user', 'asset'));
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
        $asset = UserAttachment::where('user_id', $id)->first();
        return view('user_pages/profile/edit', compact('user', 'asset'));
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

        return redirect("profile/$id");
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function setNewsletter(Request $req, $id){


      $user = User::findOrFail($id);

      if($req->email_sub == $user->email){
        $user->update(['newsletter' => '1']);

        return response()->json([
          'status' => 'success',
          'message'   => 'You\'re now subscribed to our newsletter',

         ]);

        // return view('user_pages/newsletter/subscribe_success')->with('success', 'Now you\'re subscribed to our newsletter');
        // return redirect()->back()->with('email_success', 'You are now subscribed to our newsletter!');

      }
        return response()->json([
          'status' => 'failure',
          'message'   => 'Incorrect email',
         ]);
        // return redirect()->back()->with('email_error', 'The email is not valid');

    }
}
