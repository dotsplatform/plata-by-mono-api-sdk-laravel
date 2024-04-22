<?php
/**
 * Description of PlataByMonoServiceProvider.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\PlataByMono\App;

use Illuminate\Support\ServiceProvider;

class PlataByMonoServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../../config/plata-by-mono.php' => config_path('plata-by-mono.php'),
        ]);
    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/plata-by-mono.php',
            'plata-by-mono',
        );
    }
}
