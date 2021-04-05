<?php

namespace App\Providers;

use App\Category;
use App\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      $categories = Category::latest()->take(5)->get();
      view::share('categories',$categories);

      $setting = Setting::first();
      view::share('setting',$setting);
    }
}
