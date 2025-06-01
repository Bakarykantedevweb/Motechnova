<?php

use App\Http\Controllers\Admin\DashbordController;
use App\Http\Controllers\Admin\DroitController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
});

Auth::routes();

Route::get('/admin/dashboard', [DashbordController::class, 'index']);
Route::prefix('admin')->middleware(['auth'])->group(function () {

    Route::controller(UserController::class)->group(function () {
        Route::get('users', 'index')->name('user.index');
    });

    Route::controller(RoleController::class)->group(function () {
        Route::get('roles', 'index')->name('role.index');
        Route::post('roles/store', 'store')->name('role.store');
        Route::post('/getDroit', 'getDroit');
        Route::post('/exceptDroit', 'exceptDroit');
        Route::post('roles/update', 'update')->name('role.update');
        Route::post('roles/delet', 'destroy')->name('role.delete');
    });

    Route::controller(DroitController::class)->group(function () {
        Route::get('droits', 'index')->name('droit.index');
    });

});
