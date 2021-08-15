<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
class AuthSystem
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = User::where('api_token',session('TOKEN'));   
        if ($user->exists() && Carbon::parse($user->first()->token_expired)->gte(Carbon::now())) {
            return $next($request);
        }else{
            return response()->json([
                'msg'=>'Unauthorized'
            ], 401);
        }
    }
}
