<?php

namespace App\Providers;

use App\Models\ApiMeta;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');  // Force HTTPS for assets
        }
        //
        // RateLimiter::for('api', function (Request $request) {
        //     // return Limit::perMinute(10)->by($request->user()?->id ?: $request->ip());

        //     return $request->user()
        //         ? Limit::perMinute(10)->by($request->user()->id)
        //         : Limit::perMinute(5)->by($request->ip());
        // });

        // Clean up metadata for non-existent tables
        ApiMeta::all()->each(function ($meta) {
            if (!Schema::hasTable($meta->related_table)) {
                $meta->delete();  // Remove metadata for the deleted table
            }
        });
    }
}
