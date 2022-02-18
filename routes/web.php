<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NetappController;
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
Route::view('/product-catalogue', 'product-catalogue')->name('product-catalogue');
Route::view('/about', 'about')->name('about');
Route::view('/netapp-creators', 'netapp-creators')->name('netapp-creators');
Route::view('/netapp-single', 'netapp-single')->name('netapp-single');
Route::view('/welcome-dashboard', 'welcome-dashboard')->name('welcome-dashboard');
Route::view('/edit-dashboard-temp', 'edit-dashboard-temp')->name('edit-dashboard-temp');



Route::middleware(['auth'])->group(function () {
    Route::prefix('administration')->middleware("can:manage-platform")->name('administration.')->group(function () {
        Route::resource('users', UserController::class)->except([
            'create', 'edit', 'show'
        ]);
    });
    Route::view('/support', 'support')->name('support');
    Route::post('api/upload-file', [NetappController::class, 'uploadFile']);
    Route::post('api/create-netapp', [NetappController::class, 'store']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
