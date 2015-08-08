<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category, App\Classified;
use Cache;

class ViewPresenters extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = Cache::rememberForever('categories', function() {
            return Category::main()->get()->lists('name', 'id')->all();
        });

        view()->composer('*', function($view) use($categories) {
            $view->with('categories', $categories);
        });

        view()->composer('pages.classifieds.form', function($view) {
            $subcategories = Category::with('parent')->children()->get()->groupBy(function($item) {
                return $item->parent->name; 
            })->map(function($item) {
                return $item->lists('name', 'id')->all();
            })->all();

            $view->with('subcategories', $subcategories);
        });

        view()->composer('_partials.left_menu', function($view) {
            $popular = Cache::remember('popular', 15, function() {
                return Classified::active()->popular()->recent()->limit(3)->get();
            });

            $view->with('popular', $popular);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
