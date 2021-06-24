<?php

namespace RTippin\MessengerUi;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use RTippin\MessengerUi\Commands\PublishCommand;

class MessengerUiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/messenger-ui.php', 'messenger-ui');

        $router = $this->app->make(Router::class);

        $router->group($this->webRouteConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });

        $router->group($this->webRouteConfiguration(true), function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/invite.php');
        });

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
        $this->commands([
            PublishCommand::class,
        ]);

        $this->publishes([
            __DIR__.'/../config/messenger-ui.php' => config_path('messenger-ui.php'),
        ], 'messenger-ui.config');

        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/messenger'),
        ], 'messenger-ui.views');

        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/messenger'),
        ], 'messenger-ui.assets');
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

    /**
     * Get the Messenger API route group configuration array.
     *
     * @param bool $invite
     * @return array
     */
    private function webRouteConfiguration(bool $invite = false): array
    {
        return [
            'domain' => config('messenger-ui.routing.domain'),
            'prefix' => trim(config('messenger-ui.routing.prefix'), '/'),
            'middleware' => $invite
                ? config('messenger-ui.routing.invite_web_middleware')
                : config('messenger-ui.routing.middleware'),
        ];
    }
}
