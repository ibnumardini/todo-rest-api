<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomAuthenticateBasicAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        [, $key] = explode(" ", $request->header('authorization'));
        [$user, $pass] = explode(":", base64_decode($key));

        if ($user == "asdf" && $pass == "asdf") {
            return $next($request);
        }

        return response()->json(['error' => 'Unauthenticated.'], 401);
    }
}
