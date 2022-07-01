<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Relation::enforceMorphMap([
            'category' => 'App\Models\Category',
            'tag' => 'App\Models\Tag',
            'link' => 'App\Models\Link',
            'material' => 'App\Models\Material',
            'user' => 'App\Models\User',
        ]);

    }
}
