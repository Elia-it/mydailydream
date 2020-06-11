<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Route;
use App\Dream;

class DreamMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userId = Auth::user()->id;
        $dreamUserId = Dream::whereId($request->route('dream'))->value('user_id');

        if($userId != $dreamUserId){
          return redirect('/home');
        }

        return $next($request);
    }
}
