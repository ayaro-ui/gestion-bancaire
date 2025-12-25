<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController; // ← Ajoutez cette 

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

Route::get('/', function () {
    return view('welcome');
});
// Routes pour les clients (CRUD complet)
Route::resource('clients', App\Http\Controllers\ClientController::class);

// Routes pour les comptes (CRUD complet)
Route::resource('comptes', App\Http\Controllers\CompteController::class);

// Routes pour les virements
use App\Http\Controllers\VirementController;

Route::resource('virements', VirementController::class);

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
// Formulaire de login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Route pour soumettre le formulaire (POST)
Route::post('/login', [AuthController::class, 'login']);

// Route pour la déconnexion
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Route pour le profil administrateur
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
Route::get('/admin/profile/edit', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('/admin/profile/update', [AdminController::class, 'update'])->name('admin.update');
});