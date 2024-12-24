<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Closure;

class GetFeatureCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth('sanctum')->user();

        if (!$user || !$user->hasFeature('api-requests')) {
            return response()->json([
                'error' => 'You must subscribe to a plan to access this resource.'
            ], 403);
        }

        if (!$user->canConsume('api-requests', 1.0)) {
            return response()->json([
                'error' => 'Plan usage limit exceeded. Please upgrade your plan.'
            ], 403);
        }

        // Consume the resource
        $user->consume('api-requests', 1.0);

        return $next($request);
    }
}
