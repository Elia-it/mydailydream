<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Dream;
use Route;

class countDream
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
        $user = auth()->user();
        $num_dreams = Dream::where('user_id', "$user->id")->count();

        if($num_dreams > 10){
          return true;
        }

        return $next($request);
    }
}
