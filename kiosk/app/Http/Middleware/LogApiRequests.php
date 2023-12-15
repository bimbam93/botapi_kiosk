<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class LogApiRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        DB::table('api_request_logs')->insert([
            'method' => $request->method(),
            'path' => $request->path(),
            'request_data' => json_encode($request->all()),
            'response_data' => $response->getContent(),
            'ip_address' => $request->ip(),
            'status_code' => $response->status(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $response;
    }
}
