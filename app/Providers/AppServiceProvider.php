<?php

namespace App\Providers;

use App\Models\Netapp;
use App\Models\PurchasedNetapp;
use Auth;
use View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        //        if($this->app->environment('production')) {
        //            URL::forceScheme('https');
        //        }
        if (\Auth::check() !== null) {
            View::Composer('*', function ($view) {
                $netapps = Netapp::where('user_id', \Auth::id())->get();
                $purchasednetapps = PurchasedNetapp::where('user_id', \Auth::id())->get();

                $view->with(['netapps' => $netapps, 'purchasednetapps' => $purchasednetapps]);
            });
        }
    }
}
