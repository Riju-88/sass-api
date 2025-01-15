<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Log::info(Inspiring::quote()));
})->purpose('Display an inspiring quote')->everyFifteenSeconds();
