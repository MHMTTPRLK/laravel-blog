<?php

namespace App\Providers;

use Illuminate\Routing\Route;

use Illuminate\Support\ServiceProvider;
use App\Models\Config;

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
        view()->share('config',Config::find(1));
       /* Route::resourceVerbs([
            'create' => 'crear', 'edit' => 'editar', ]);*/
    }
}
