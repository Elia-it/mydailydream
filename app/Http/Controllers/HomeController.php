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
    public function __construct()
    {
        $this->middleware('auth');

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
        return view('home', compact('dreams'));
    }
}
