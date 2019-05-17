<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Tag;
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
//        View::composer(['home/layouts/_header'], function ($view) {
//
//            $categories = Cache::remember('users', static::MINUTES, function () {
//                return Category::orderBy('sort','desc')->get();
//            });
//
//            $tags = Cache::remimber('tags',static::MINUTES,function (){
//                return Tag::all();
//            });
//
//            $view->with(compact('categories','tags'));
//        });

        view()->composer(['home/layouts/_header','home/layouts/_nav'], function ($view) {
            $categories = Cache::remember('users', static::MINUTES, function () {
                return Category::orderBy('sort','desc')->get();
            });
            $view->with(compact('categories'));
        });

        view()->composer('home/layouts/right', function ($view) {
            $tags = Cache::remember('tags',static::MINUTES,function (){
                return Tag::all();
            });
            $view->with(compact('tags'));
        });

//        View::composer('home/layouts/right', function ($view) {
//
//            $tags = Cache::remimber('tags',static::MINUTES,function (){
//                return Tag::all();
//            });
//
//            $view->with(compact('tags'));
//        });
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