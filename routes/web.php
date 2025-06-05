<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DroitController;
use App\Http\Controllers\Admin\DashbordController;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\FormateurController;
use App\Http\Controllers\Frontend\FrontendFormationController;
use App\Http\Controllers\AuthFormateur\LoginFormateurController;
use App\Http\Controllers\Formateur\DashboardFormateurController;
use App\Http\Controllers\Formateur\FormationFormateurController;
use App\Http\Controllers\AuthFormateur\RegisterFormateurController;




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

Auth::routes();
Route::get('/', function () {
    return view('frontend.index');
});

// Routes Frontend
Route::controller(FrontendFormationController::class)->group(function () {
    Route::get('formations', 'index');
});

// Route pour l'authentification Formateur
Route::prefix('formateur')->middleware(['guest_formateur'])->group(function () {

    Route::controller(RegisterFormateurController::class)->group(function () {
        Route::get('register', 'index');
    });
    Route::controller(LoginFormateurController::class)->group(function () {
        Route::get('login', 'index');
    });
});

Route::prefix('formateur')->middleware('auth_formateur')->group(function () {

    Route::controller(DashboardFormateurController::class)->group(function () {
        Route::get('/dashboard', 'index');
        Route::post('/logout','logout')->name('formateur/logout');
    });

    Route::controller(FormationFormateurController::class)->group(function(){
        Route::get('formations','index');
        Route::get('formations/create','create');
    });
});



// Routes Admin
Route::get('/admin/dashboard', [DashbordController::class, 'index'])->name('admin.dashboard');
Route::get('admin/404', [DashbordController::class, 'page404'])->name('admin.404');
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
        Route::post('roles/delete', 'destroy')->name('role.delete');
    });

    Route::controller(DroitController::class)->group(function () {
        Route::get('droits', 'index')->name('droit.index');
    });

    Route::controller(CategorieController::class)->group(function () {
        Route::get('categories', 'index')->name('categorie.index');
    });

    Route::controller(FormateurController::class)->group(function () {
        Route::get('formateurs', 'index')->name('formateur.index');
    });
});
