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
use App\Http\Controllers\Auth\FirstRegisterController;
use App\Http\Controllers\Admin\RoomController;


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

// site
Route::get('/', [ReservationController::class, 'index'])->name('site.index');
Route::post('/result', [ReservationController::class, 'showResult'])->name('site.result');
Route::get('/info', [ReservationController::class, 'redirectToInfo']);
Route::post('/info', [ReservationController::class, 'showInfo'])->name('site.info');
Route::post('/confirm', [ReservationController::class, 'showConfirm'])->name('site.confirm');
Route::get('/complete', [ReservationController::class, 'showComplete'])->name('site.complete');

// login, Logout, firstRegister
Route::get('/admin/first', [FirstRegisterController::class, 'index'])->name('first.index');
Route::post('/admin/first/register', [FirstRegisterController::class, 'register'])->name('first.register');
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('login.index');
Route::post('/admin/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Auth::routes();

// after login
Route::group(['middleware' => ['auth']], function() {

    // dashboard
    Route::get('/admin', [ShowDisplayController::class, 'showIndex'])->name('admin.index');

    // facilities
    Route::get('/admin/facilities', [FacilitiesController::class, 'index'])->name('facilities.index');
    Route::post('/admin/facilities', [FacilitiesController::class, 'update'])->name('facilities.update');

    // room
    Route::get('/admin/room', [RoomController::class, 'index'])->name('room.index');
    Route::get('/admin/room/register', [RoomController::class, 'showRegisterForm'])->name('room.register');
    Route::post('/admin/room/register,', [RoomController::class, 'register'])->name('room.exec.register');

    // reservationStock
    Route::get('/admin/reservation_stock', [ReservationStockController::class, 'index'])->name('reservationStock.index');
    Route::post('/admin/reservation_stock/get', [ReservationStockController::class, 'getStocks'])->name('reservationStock.get');
    Route::post('/admin/reservation_stock/register', [ReservationStockController::class, 'registerStock'])->name('reservation.register');

    // reservationList
    Route::get('/admin/reservation_list', [ReservationListController::class, 'index'])->name('reservationList.index');

    // user
    Route::get('/admin/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/admin/users/detail', [UsersController::class, 'showDetail'])->name('users.detail');
    Route::post('/admin/users/update', [UsersController::class, 'update'])->name('users.update');
    Route::post('/admin/users/delete', [UsersController::class, 'delete'])->name('users.delete');
    Route::get('/admin/user/registerform', function() {
        return view('auth.register');
    })->name('user.register');
    Route::post('/admin/register', [RegisterController::class, 'register'])->name('user.exec.register');
});
