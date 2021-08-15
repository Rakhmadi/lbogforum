<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class authApiService
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
        $user = User::where('api_token',$request->token);
        if ($user->exists() && $user->first()->ip_ === $request->ip()) {
            # code...
        }else{
           $rand = bcrypt(Str::random(10));
           $user->update([
            'api_token'=>$rand,
           ]);
        }
        if ($user->exists() && Carbon::parse($user->first()->token_expired)->gte(Carbon::now()) && $user->first()->ip_ === $request->ip()) {
            return $next($request);
        }else{
            return response()->json([
                'msg'=>'Unauthorized'
            ], 401);
        }
    }
}
