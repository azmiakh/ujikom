<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FormTablesController;
use App\Http\Controllers\LoginTableController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminRegisterController;

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
    $peserta = Auth::user();

    return view('dashboard', compact('peserta'));
})->name('dashboard');

// Route::get('/admin', function () {
//     return view('administrator/dashboard');
// })->name('administrator.dashboard');

Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');

Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::get('/admin/register', [AdminRegisterController::class, 'showRegisterForm'])->name('admin.register');
Route::post('/admin/register', [AdminRegisterController::class, 'register'])->name('register');


Route::get('/admin', function () {
    return view('administrator/dashboard');
})->middleware('auth:admin')->name('administrator.dashboard');

Route::get('/admin/tables/logintables', [LoginTableController::class, 'index'])->name('admin.logintables');
Route::get('/admin/tables/logintables/create', [LoginTableController::class, 'create'])->name('admin.logintables.create');
Route::post('/admin/tables/logintables/store', [LoginTableController::class, 'store'])->name('admin.logintables.store');
Route::get('/admin/tables/logintables/{id}/edit', [LoginTableController::class, 'edit'])->name('admin.logintables.edit');
Route::put('/admin/tables/logintables/{id}', [LoginTableController::class, 'update'])->name('admin.logintables.update');
Route::delete('/admin/tables/logintables/{id}', [LoginTableController::class, 'destroy'])->name('admin.logintables.destroy');

Route::get('/admin/tables/formtables', [FormTablesController::class, 'index'])
    ->middleware('auth:admin')
    ->name('admin.formtables');
Route::get('/admin/tables/formtables/create', [FormTablesController::class, 'create'])->name('admin.formtables.create');
Route::post('/admin/tables/formtables/store', [FormTablesController::class, 'store'])->name('admin.formtables.store');
Route::get('/admin/tables/formtables/{id}/edit', [FormTablesController::class, 'edit'])->name('admin.formtables.edit');
Route::put('/admin/tables/formtables/{id}', [FormTablesController::class, 'update'])->name('admin.formtables.update');

Route::delete('/admin/tables/formtables/{id}', [FormTablesController::class, 'destroy'])->name('admin.formtables.destroy');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('/form', [FormController::class, 'showForm'])->name('form');
    Route::post('/submit-form', [FormController::class, 'submitForm'])->name('submit-form');
    
});

Route::get('/admin/tables/ekstrakurikuler/create', [EkstrakurikulerController::class, 'create'])->name('ekstrakurikuler.create');

Route::post('/admin/tables/ekstrakurikuler/create', [EkstrakurikulerController::class, 'store'])->name('ekstrakurikuler.store');

Route::get('/admin/tables/ekstrakurikuler', [EkstrakurikulerController::class, 'index'])->name('admin.ekstrakurikuler');
Route::delete('/admin/tables/ekstrakurikuler/{id}', [EkstrakurikulerController::class, 'destroy'])->name('admin.ekstrakurikuler.destroy');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');