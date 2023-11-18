<?php

namespace App\Http\Middleware;

use App\Http\Resources\UserResource;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class activeAccount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $request->merge(['user'=>new UserResource(auth()->guard('api')->user())]);
        if(auth()->guard('api')->user() && auth()->guard('api')->user()->is_deactivate)
            return response()->json(['message' => 'failed', 'error'=> 'This account is deactivated right now'], 401);

        return $next($request);
    }
}
