<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
{
    if (auth('sanctum')->user()->role == 'admin') {
        return $next($request);
    }

    return response()->json([
        'message' => 'دسترسی غیر مجاز!',
        'status' => 403
    ], 403);
}
}
