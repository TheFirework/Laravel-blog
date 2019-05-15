<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Cache;

class ComposerServiceProvider extends ServiceProvider
{
    protected const MINUTES = 86400;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('home/layouts/_header', function ($view) {
            $categories = Cache::remember('users', static::MINUTES, function () {
                return Category::orderBy('sort','desc')->get();
            });
            $view->with(compact('categories'));
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}