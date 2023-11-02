<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        $title = "Manage User";
        if (auth()->user()->is_admin == true) {
            return $next($request);
        }
        // return response()->json('Halaman Ini Hanya Dapat Diakses Oleh Admin !!!');
        return abort(404);
    }
}
