<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Admin\ShowDisplayController;
use App\Http\Controllers\Admin\FacilitiesController;
use App\Http\Controllers\Admin\ReservationStockController;
use App\Http\Controllers\Admin\ReservationListController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\UsersController;


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




// users

Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('login.index');
Route::post('/admin/login', [LoginController::class, 'login']);
Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/admin/user/registerform', function() {
        return view('auth.register');
    })->name('user.register');
    Route::post('/admin/register', [RegisterController::class, 'register'])->name('user.exec.register');
    Route::get('/admin', [ShowDisplayController::class, 'showIndex'])->name('admin.index');
    Route::get('/admin/facilities', [FacilitiesController::class, 'index'])->name('facilities.index');
    Route::post('/admin/facilities', [FacilitiesController::class, 'update'])->name('facilities.update');
    Route::get('/admin/reservation_stock', [ReservationStockController::class, 'index'])->name('reservationStock.index');
    Route::get('/admin/reservation_list', [ReservationListController::class, 'index'])->name('reservationList.index');
    Route::get('/admin/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/admin/users/detail', [UsersController::class, 'showDetail'])->name('users.detail');
    Route::post('/admin/users/update', [UsersController::class, 'update'])->name('users.update');
    Route::post('/admin/users/delete', [UsersController::class, 'delete'])->name('users.delete');
});
