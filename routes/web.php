<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ComandesController;
  
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


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Auth::routes();



Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('Dashboard', [App\Http\Controllers\HomeController::class, 'Admindashboard'])->name('Admindashboard')->middleware('is_admin');
    Route::get('/Categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('Categories')->middleware('is_admin');
    Route::get('/Produits', [App\Http\Controllers\ProductController::class, 'index'])->name('Produits')->middleware('is_admin');
});
// admin Route
Route::get('/Profile', [App\Http\Controllers\HomeController::class, 'Profile'])->middleware('auth','is_admin');
Route::post('/Profile/Modidier', [App\Http\Controllers\HomeController::class, 'ModifierProfil'])->middleware('auth','is_admin');
Route::post('/Categories/Add', [App\Http\Controllers\CategoryController::class, 'AddCategorie'])->middleware('auth','is_admin');
Route::post('/Categories/Modifier', [App\Http\Controllers\CategoryController::class, 'ModifierCategorie'])->middleware('auth','is_admin');
Route::get('/Categories/{id}/Delete', [App\Http\Controllers\CategoryController::class, 'DeleteCategorie'])->middleware('auth','is_admin');

Route::post('/Produit/Add', [App\Http\Controllers\ProductController::class, 'AddProduit'])->middleware('auth','is_admin');
Route::post('/Produit/Modifier', [App\Http\Controllers\ProductController::class, 'ModifierProduit'])->middleware('auth','is_admin');
Route::get('/Produit/{id}/Delete', [App\Http\Controllers\ProductController::class, 'DeleteProduit'])->middleware('auth','is_admin');

// guest page
Route::get('/', [GuestController::class, 'home'])->name('/');
Route::get('/Produit/Detail/{id}', [GuestController::class, 'ProduitsDetail']);
Route::get('/Produit/Filter/{idcategorie}', [GuestController::class, 'Shop']);
Route::post('/Produit/Search', [GuestController::class, 'Search']);
//user  
Route::get('User/Dashboard', [UserController::class, 'UserDashboard'])->name('UserDashboard')->middleware('auth');
Route::get('/ProfileUser', [UserController::class, 'UserProfile'])->middleware('auth');
Route::post('/ProfileUser/Modidier', [App\Http\Controllers\UserController::class, 'ModifierProfil'])->middleware('auth');
Route::post('/AddCommande', [ComandesController::class, 'AddCommande'])->middleware('auth');
Route::get('/ClientCart', [UserController::class, 'Cart'])->name('ClientCart')->middleware('auth');
Route::get('/DeleteCommande/{idc}', [ComandesController::class, 'DeleteComande'])->middleware('auth');
Route::post('/Check', [UserController::class, 'Check'])->middleware('auth');
