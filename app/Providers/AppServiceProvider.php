<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\System;
use App\Category;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    

    public function boot()
    {   
        view()->composer('master', function($view)
        {
            $view->with('systems', System::all());
            $view->with('categories', Category::all());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
