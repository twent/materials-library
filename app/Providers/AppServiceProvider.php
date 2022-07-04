<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Query\Builder;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register Laravel IDE Helper Service in local environment
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /* Pagination for Bootstrap */
        Paginator::useBootstrap();

        /* Morph mapping */
        Relation::enforceMorphMap([
            'category' => 'App\Models\Category',
            'tag' => 'App\Models\Tag',
            'link' => 'App\Models\Link',
            'material' => 'App\Models\Material',
            'user' => 'App\Models\User',
        ]);

    }
}
