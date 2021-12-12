<?php

namespace Larateam\Mailing\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private const MAILING_DIR = __DIR__ . '/../../';

    public function register()
    {
        $this->loadTranslationsFrom(self::MAILING_DIR . 'resources/lang', 'ltmailing');
        $this->loadViewsFrom(self::MAILING_DIR . 'resources/views', 'ltmailing');
        $this->mergeConfigFrom(self::MAILING_DIR . 'config/mail.php', 'mail');
    }

}
