<?php

use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\DashbordController;
use App\Http\Controllers\Admin\DroitController;
use App\Http\Controllers\Admin\FormateurController;
use App\Http\Controllers\Admin\FormationController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthEtudiant\LoginEtudiantController;
use App\Http\Controllers\AuthEtudiant\RegisterEtudiantController;
use App\Http\Controllers\AuthFormateur\LoginFormateurController;
use App\Http\Controllers\AuthFormateur\RegisterFormateurController;
use App\Http\Controllers\Etudiant\DashboardEtudiantController;
use App\Http\Controllers\Etudiant\FormationEtudiantController;
use App\Http\Controllers\FedapayController;
use App\Http\Controllers\Formateur\DashboardFormateurController;
use App\Http\Controllers\Formateur\FormateurProfileController;
use App\Http\Controllers\Formateur\FormationFormateurController;
use App\Http\Controllers\Frontend\FrontendCartController;
use App\Http\Controllers\Frontend\FrontendCheckoutController;
use App\Http\Controllers\Frontend\FrontendFormationController;
use App\Http\Controllers\Frontend\FrontendProduitDigitauxController;
use App\Http\Controllers\PaymentController;
use App\Http\Livewire\Admin\TypeProduitsDigitaux\TypeProduitsDigitaux;
use App\Http\Livewire\Formateur\Commande\Index as CommandeIndex;
use App\Http\Livewire\Formateur\Formation\Edit;
use App\Http\Livewire\Formateur\ProduitsDigitaux\ProduitsDigitaux;
use App\Http\Livewire\Formateur\ProduitsDigitaux\ProduitsDigitauxCreate;
use App\Http\Livewire\Formateur\Profile\Profile;
use App\Http\Livewire\Formateur\Statisque\Index;
use App\Http\Livewire\PaymentForm;
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

Auth::routes();
Route::get('/', function () {
    return view('frontend.index');
});

// Routes Frontend Formations
Route::controller(FrontendFormationController::class)->group(function () {
    Route::get('formations', 'index');
    Route::get('formations/{nom}', 'detail');
    Route::get('formations/{nom}/free', 'detailFree')->middleware(['auth_etudiant']);
    Route::get('formateur/{nom}/detail/{id}', 'detailFormateur');
});

// Routes Frontend Produits Digitaux
Route::controller(FrontendProduitDigitauxController::class)->group(function (){
    Route::get('produits-digitaux','index');
    Route::get('produits-digitaux/{titre}','detail');
});

// Routes Frontend Cart
Route::controller(FrontendCartController::class)->middleware(['auth_etudiant'])->group(function () {
    Route::get('carts', 'index');
});

Route::middleware('auth_etudiant')->group(function () {
    Route::get('/checkout', [PaymentController::class, 'checkoutForm'])->name('checkout');
    Route::post('/checkout/pay', [PaymentController::class, 'payWithFedaPay'])->name('checkout.pay');
    
    // ✅ Correction ici : success redirige vers PaymentController
    Route::get('/checkout/success/{orderId}', [PaymentController::class, 'success'])->name('fedapay.success');
});

Route::post('/fedapay/callback', [PaymentController::class, 'fedapayCallback'])->name('fedapay.callback');

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
    Route::get('formations/edit/{formationId}', Edit::class);

    Route::get('profile',Profile::class);
    Route::get('statistiques', Index::class);
    Route::get('commandes', CommandeIndex::class);

    Route::get('produits-digitaux', App\Http\Livewire\Formateur\ProduitsDigitaux\ProduitsDigitaux::class);
    Route::get('produits-digitaux/create', ProduitsDigitauxCreate::class);
});

// Route pour l'authentification Etudiant
Route::prefix('etudiant')->middleware(['guest_etudiant'])->group(function () {

    Route::controller(RegisterEtudiantController::class)->group(function () {
        Route::get('register', 'index');
    });
    Route::controller(LoginEtudiantController::class)->group(function () {
        Route::get('login', 'index')->name('etudiant.login');
    });
});

Route::prefix('etudiant')->middleware('auth_etudiant')->group(function () {

    Route::controller(DashboardEtudiantController::class)->group(function () {
        Route::get('/dashboard', 'index');
        Route::post('/logout','logout')->name('etudiant/logout');
    });

    Route::controller(FormationEtudiantController::class)->group(function(){
       Route::get('formations/{nom}/free', 'index'); 
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

    Route::controller(FormationController::class)->group(function(){
        Route::get('formations','index')->name('formation.index');
    });

    Route::get('etudiants', App\Http\Livewire\Admin\Etudiant\Index::class)->name('etudiant.index');

    Route::get('types-produits-digitaux',TypeProduitsDigitaux::class)->name('type-produit-digitaux.index');
    Route::get('produits-digitaux',ProduitsDigitaux::class)->name('produit-digitaux.index');

});
