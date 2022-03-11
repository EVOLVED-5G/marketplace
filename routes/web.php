<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NetappController;
use App\Http\Controllers\ProductCatalogueController;
use App\Http\Controllers\Resource\PatientResourceController;
use App\Http\Controllers\Resource\CarerResourceController;
use App\Http\Controllers\Resource\ResourceController;
use App\Http\Controllers\UserController;
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
Route::get('/netapp-details/{id}', [NetappController::class, 'show'])->name('show-netapp');

Route::middleware(['auth'])->group(function () {
    Route::prefix('administration')->middleware("can:manage-platform")->name('administration.')->group(function () {
        Route::resource('users', UserController::class)->except([
            'create', 'edit', 'show'
        ]);
    });
    Route::prefix('api')->group(function () {
        Route::post('/upload-file', [NetappController::class, 'uploadFile']);
        Route::post('/create-netapp', [NetappController::class, 'store']);
        Route::post('update-netapp/{id}', [NetappController::class, 'update']);
    });
    Route::view('/welcome-dashboard', 'welcome-dashboard')->name('welcome-dashboard');
    Route::view('/support', 'support')->name('support');
    Route::get('/create-netapp', [NetappController::class, 'index'])->name('create-netapp');
    Route::get('/edit-netapp/{id}', [NetappController::class, 'edit'])->name('edit-netapp');
    Route::view('/my-account-settings-dashboard', 'my-account-settings-dashboard')->name('my-account-settings-dashboard');
});
