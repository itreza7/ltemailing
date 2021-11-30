<?php

namespace Larateam\Emailing\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private const MAILING_DIR = __DIR__ . '/../../';

    public function boot()
    {
        if (!File::exists(config_path('ltmailing.php'))) {
            $this->mergeConfigFrom(self::MAILING_DIR . 'config/ltmailing.php', 'ltmailing');
        }
        if ($this->app->runningInConsole()) {
            $this->publishes([
                self::MAILING_DIR . 'config/ltmailing.php' => config_path('ltmailing.php'),
            ], 'config');
        }
        $this->loadTranslationsFrom(self::MAILING_DIR . 'resources/lang', 'ltmailing');
        $this->loadViewsFrom(self::MAILING_DIR . 'resources/views', 'ltmailing');
    }

}
