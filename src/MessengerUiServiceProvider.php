<?php

namespace RTippin\MessengerUi;

use Illuminate\Support\ServiceProvider;

class MessengerUiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'messenger');

        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    private function bootForConsole(): void
    {
        $this->publishes([
            __DIR__.'/../config/messenger.php' => config_path('messenger.php'),
        ], 'messenger.config');

        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/messenger'),
        ], 'messenger.views');

        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/messenger'),
        ], 'messenger.assets');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }
}
