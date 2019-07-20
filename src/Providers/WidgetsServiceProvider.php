<?php

namespace TinyPixel\Settings\Providers;

// Illuminate framework
use \Illuminate\Support\Collection;

// Roots
use \Roots\Acorn\ServiceProvider;
use function \Roots\config_path;

// Internal
use \TinyPixel\Settings\Widgets;

/**
 * Widgets Service Provider
 *
 * @author  Kelly Mears <kelly@tinypixel.dev>
 * @license MIT
 * @since   1.0.0
 */
class WidgetsServiceProvider extends ServiceProvider
{
    /**
      * Register any application services.
      *
      * @return void
      */
    public function register()
    {
        $this->app->singleton('wordpress.widgets', function () {
            return new Widgets($this->app);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $widgetsConfig =  __DIR__ . '/../config/wordpress/widgets.php';

        $this->publishes([
            $widgetsConfig => config_path('wordpress/widgets.php'),
        ]);

        $this->app->make('wordpress.widgets')->init(Collection::make(
            $this->app['config']->get('wordpress.widgets')
        ));
    }
}
