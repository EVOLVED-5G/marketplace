<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MarketplaceOverviewController;
use App\Http\Controllers\NetappController;
use App\Http\Controllers\ProductCatalogueController;
use App\Http\Controllers\PurchasedNetAppController;
use App\Http\Controllers\Resource\PatientResourceController;
use App\Http\Controllers\Resource\CarerResourceController;
use App\Http\Controllers\Resource\ResourceController;
use App\Http\Controllers\SaveNetappController;
use App\Http\Controllers\UserController;
use App\Jobs\TestJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'home')->name('home');
Route::get('/product-catalogue', [ProductCatalogueController::class, 'index'])->name('product-catalogue');
Route::view('/about', 'about')->name('about');
Route::view('/netapp-creators', 'netapp-creators')->name('netapp-creators');
Route::view('/netapp-single', 'netapp-single')->name('netapp-single');
Route::view('/history-tables', 'history-tables')->name('history-tables');
Route::view('/admin-dashboard', 'admin-dashboard')->name('admin-dashboard');

Route::view('/privacy-policy', 'privacy-policy')->name('privacy-policy');
Route::post('api/filter-netapp', [ProductCatalogueController::class, 'filter'])->name('filter-netapp');
Route::get('/netapp-details/{slug}', [NetappController::class, 'show'])->name('show-netapp');

Route::middleware(['auth'])->group(function () {
    Route::prefix('administration')->middleware("can:manage-platform")->name('administration.')->group(function () {

        Route::get('/phpinfo', function (Request $request) {
            phpinfo();
        });

        Route::get('/test-queue', function (Request $request) {
            TestJob::dispatch();
        });

        Route::resource('users', UserController::class)->except([
            'create', 'edit', 'show'
        ]);
        Route::get('index', [MarketplaceOverviewController::class, 'index'])->name('marketplace.overview.index');
        Route::prefix('api')->group(function () {
            Route::get('/netapps', [MarketplaceOverviewController::class, 'netappTable'])->name('marketplace.overview.netappTable');
            Route::get('/companies', [MarketplaceOverviewController::class, 'companyTable'])->name('marketplace.overview.companyTable');
            Route::get('/purchased-netapp', [MarketplaceOverviewController::class, 'purchasedNetappTable'])->name('marketplace.overview.purchasedNetappTable');
            Route::get('/users', [MarketplaceOverviewController::class, 'userTable'])->name('marketplace.overview.userTable');
        });
    });
    Route::get('user-details', [DashboardController::class, 'index'])->name('user.details');
    Route::post('update-user-details', [DashboardController::class, 'update'])->name('update.user.details');
    Route::prefix('api')->group(function () {
        Route::post('/upload-file', [NetappController::class, 'uploadFile']);
        Route::post('/create-netapp', [NetappController::class, 'store']);
        Route::post('update-netapp/{id}', [NetappController::class, 'update']);
        Route::post('/save-netapp', [SaveNetappController::class, 'store']);
        Route::patch('/unsave-netapp', [SaveNetappController::class, 'destroy']);
        Route::post('/purchase-netapp', [PurchasedNetAppController::class, 'purchase']);
        Route::post('slug-validation', [NetappController::class, 'slugValidation']);
    });
    Route::view('/welcome-dashboard', 'welcome-dashboard')->name('welcome-dashboard');
    Route::get('/saved-netapp', [SaveNetappController::class, 'index'])->name('saved-netapp');
    Route::get('/revenue-page/{id}', [PurchasedNetAppController::class, 'showRevenue'])->name('revenue-page');
    Route::get('/netapps/purchased', [PurchasedNetAppController::class, 'myPurchasedNetApps'])->name('my-purchased-netapps');
    Route::view('/support', 'support')->name('support');
    Route::get('/create-netapp', [NetappController::class, 'index'])->name('create-netapp');
    Route::get('/edit-netapp/{id}', [NetappController::class, 'edit'])->name('edit-netapp');
    Route::view('/my-account-settings-dashboard', 'my-account-settings-dashboard')->name('my-account-settings-dashboard');
});
