<?php

namespace App\Providers;

use App\BusinessLogicLayer\BlockchainTransaction\BlockchainTransactionManager;
use App\BusinessLogicLayer\BlockchainTransaction\EthereumAPIBlockchainTransactionManager;
use App\BusinessLogicLayer\TMForumAPI\ForumAPIManager;
use App\BusinessLogicLayer\TMForumAPI\TMForumAPIManager;
use App\Models\Netapp;
use App\Models\PurchasedNetApp;
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
        $this->app->bind(ForumAPIManager::class, function ($app) {
            return $app->make(TMForumAPIManager::class);
        });
        $this->app->bind(BlockchainTransactionManager::class, function ($app) {
            return $app->make(EthereumAPIBlockchainTransactionManager::class);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       // if ($this->app->environment('production')) {
            URL::forceScheme('https');
       // }
        if (\Auth::check() !== null) {
            View::Composer('*', function ($view) {
                $netapps = Netapp::where('user_id', \Auth::id())->get();
                $view->with(['netapps' => $netapps]);
            });
        }
    }
}
