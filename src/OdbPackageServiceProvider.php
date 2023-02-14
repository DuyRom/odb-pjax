<?php

namespace odinbi\pjax;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class OdbPackageServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->loadHelpers();
        $this->registerPublish();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('odb-pjax', function () {
            return `<script defer="" src="/pjax/assets/jquery-pjax.js"></script>
                    <script defer="" src="/pjax/assets/fn-pjax.js"></script>
            `;
        });
    }


    /**
     * Register publishable assets.
     *
     * @return void
     */
    protected function registerPublish()
    {
        $publishable = [
            'odb.pjax'    => [
                 __DIR__.'/resources/assets/' => public_path('pjax/assets'),
            ],
        ];

        foreach ($publishable as $group => $paths) {
            $this->publishes($paths, $group);
        }

    }

    /**
     * Load all helpers.
     *
     * @return void
     */
    protected function loadHelpers()
    {
        foreach (glob(__DIR__.'/Helpers/*.php') as $filename) {
            require_once $filename;
        }
    }
}
