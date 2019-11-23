<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class AuthenticateToken
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
        $api_token = $request->header('Authorization');
        if (!$api_token) {
            return response('Unauthorized', 401);
        }
        $valid_token = User::where('api_token', $api_token)->exists();

        if ($valid_token) {
            return $next($request);
        }

        return response('Unauthorized', 401);
    }
}
