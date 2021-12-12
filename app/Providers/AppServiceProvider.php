<?php

namespace Larateam\Mailing\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private const MAILING_DIR = __DIR__ . '/../../';

    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                self::MAILING_DIR . 'resources/lang' => resource_path('lang/vendor/ltmailing'),
            ], 'languages');
        }
        $this->loadTranslationsFrom(self::MAILING_DIR . 'resources/lang', 'ltmailing');
        $this->loadViewsFrom(self::MAILING_DIR . 'resources/views', 'ltmailing');
    }

}
