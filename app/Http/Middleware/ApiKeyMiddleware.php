<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyMiddleware
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
        $apiKey = $request->header('API_KEY');

        if ($apiKey != '018e49f5-72c7-73bb-ab27-eed506d8667b') {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
