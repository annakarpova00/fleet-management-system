<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FleetServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Регистрация сервисов пакета
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Загрузка маршрутов
        $this->loadRoutesFrom(base_path('routes/web.php'));

        // Загрузка миграций
        $this->loadMigrationsFrom(base_path('database/migrations'));

        // Загрузка представлений
        $this->loadViewsFrom(base_path('resources/views'), 'fleet');

        // Публикация конфигурации
        $this->publishes([
            base_path('config/fleet.php') => config_path('fleet.php'),
        ], 'fleet-config');
    }
}
