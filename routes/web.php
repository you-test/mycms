<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Admin\ShowDisplayController;
use App\Http\Controllers\Admin\FacilitiesController;
use App\Http\Controllers\Admin\ReservationStockController;
use App\Http\Controllers\Admin\ReservationListController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;


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

Route::get('/', [ReservationController::class, 'index'])->name('site.index');
Route::post('/result', [ReservationController::class, 'showResult'])->name('site.result');
Route::get('/info', [ReservationController::class, 'redirectToInfo']);
Route::post('/info', [ReservationController::class, 'showInfo'])->name('site.info');
Route::post('/confirm', [ReservationController::class, 'showConfirm'])->name('site.confirm');
Route::get('/complete', [ReservationController::class, 'showComplete'])->name('site.complete');

Route::get('/admin', [ShowDisplayController::class, 'showIndex'])->name('admin.index');
Route::get('/admin/facilities', [FacilitiesController::class, 'index'])->name('facilities.index');
Route::post('/admin/facilities', [FacilitiesController::class, 'update'])->name('facilities.update');
Route::get('/admin/reservation_stock', [ReservationStockController::class, 'index'])->name('reservationStock.index');
Route::get('/admin/reservation_list', [ReservationListController::class, 'index'])->name('reservationList.index');


// users



Route::get('/admin/user/registerform', function() {
    return view('auth.register');
});

Route::get('/admin/login', [LoginController::class, 'showLoginForm']);
Route::post('/admin/login', [LoginController::class, 'login']);

Route::post('/admin/login/register', [RegisterController::class, 'register'])->name('user.exec.register');
