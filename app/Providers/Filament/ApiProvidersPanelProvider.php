<?php

namespace App\Providers\Filament;

use App\Http\Middleware\VerifyApiProvider;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Support\Colors\Color;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class ApiProvidersPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('api-providers')
            ->path('api-providers')
            ->login() // Still needed for Filament but will be bypassed
        ->authGuard('web')
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/ApiProviders/Resources'), for: 'App\Filament\ApiProviders\Resources')
            ->discoverPages(in: app_path('Filament/ApiProviders/Pages'), for: 'App\Filament\ApiProviders\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/ApiProviders/Widgets'), for: 'App\Filament\ApiProviders\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                VerifyApiProvider::class,  // Custom middleware to check if they're an API provider
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
