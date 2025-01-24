<?php

namespace App\Http\Middleware;

use App\Models\Device;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = $request->header('X-API-KEY');

        if (!$apiKey) {
            return response()->json(['message' => 'Authorization token not provided'], 401);
        }
        
        $device = Device::find($request->id);

        if ($device->device_api_key !== $apiKey) {
            return response()->json(['message' => 'Unauthorized, invalid API key'], 401);
        }
        
        return $next($request);
    }
}
