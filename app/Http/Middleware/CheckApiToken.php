<?php

namespace App\Http\Middleware;

use Closure;

use App\User;

class CheckApiToken
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
        $token = $request->header('authorization');
        if(empty($token)) {
            return response()->json([
                'success' => false,
                'error' => 'Missing token API'
            ]);
        }
        $api_token = substr($token, 7);
        $user = User::where('api_token', $api_token)->first();
        if(!$user) {
            return response()->json([
                'success' => false,
                'error' => 'Wrong token API'
            ]);
        }
        return $next($request);
    }
}
