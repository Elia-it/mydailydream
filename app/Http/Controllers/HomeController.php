<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dream;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     private $user;
     private $dreams;
    public function __construct()
    {
        // $p = Dream::all()->where('user_id', '=', Auth::id());
        // $num = $p->count();
        $this->middleware('auth');

        // $this->middleware(function ($request, $next) {
        //   $this->user = Auth::user();
        //   $this->dreams = Dream::all()->where('user_id', '=', Auth::id());
        //   $num = $this->dreams->count();
        //   if($num > 10){
        //     $this->middleware('verified');
        //   }
        //   return $next($request);
        // });

        // if($num > 10){
        //   // $this->middleware('verified');
        // }else{
        //      $this->middleware('verified');
        // };


    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user()->id;
        $dreams = Dream::all()->where('user_id', '=', $id);
        $count = $dreams->count();
        return view('home', compact('dreams', 'count'));
    }
}
