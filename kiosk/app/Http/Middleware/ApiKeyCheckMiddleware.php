<?php

namespace App\Http\Middleware;

use App\Models\ApiKey;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = $request->route('api_key');

        if (!$apiKey || !ApiKey::where('key', $apiKey)->exists()) {
            return response()->json([
                'status' => 401,
                'error' => 'Invalid API key'
            ], 401);
        }

        return $next($request);
    }
}
