<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Closure;

class VerifyApiProvider
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        // Allow access if user has an associated API provider
        if ($user && $user->apiProvider) {
            Auth::guard('web')->login($user);  // Ensure user is logged in
            return $next($request);
        }

        dd('User is NOT an API provider!');
        // Redirect them to the API provider registration form if they are not a provider

        // return redirect()->route('api-provider.form');
    }
}
