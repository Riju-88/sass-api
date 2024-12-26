<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Closure;

class DynamicCors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth('sanctum')->user();

        // Check if user has the required feature using soulbscription
        $featureName = 'xxxxxxxx';  // Replace with the actual feature name
        if ($user && $user->hasFeature($featureName)) {
            // Dynamically allow the Origin if the user has the feature
            $origin = $request->header('Origin');
            if ($origin) {
                config(['cors.allowed_origins' => array_merge(
                    config('cors.allowed_origins'),
                    [$origin]
                )]);
            }
        }
        return $next($request);
    }
}
