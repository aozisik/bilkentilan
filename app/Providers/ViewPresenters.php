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
        view()->composer('pages.classifieds.form', function($view) {
            $subcategories = Category::with('parent')->children()->get()->groupBy(function($item) {
                return $item->parent->name; 
            })->map(function($item) {
                return $item->lists('name', 'id')->all();
            })->all();

            $view->with('subcategories', $subcategories);
        });

        view()->composer('_partials.left_menu', function($view) {
            $categories = Cache::rememberForever('categories', function() {
                return Category::main()->get()->lists('name', 'id')->all();
            });            

            $popular = Cache::remember('popular', 15, function() {
                return Classified::active()->popular()->recent()->limit(3)->get();
            });

            $view->with(compact('popular'))->with(compact('categories'));
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
