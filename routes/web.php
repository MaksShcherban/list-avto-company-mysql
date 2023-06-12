<?php

use App\Http\Controllers\AdminCarController;
use App\Http\Controllers\AdminCompanyController;
use App\Http\Controllers\CarController;
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


Route::get('/', [CarController::class, 'list']);
// Route::get('/', [CompanyController::class, 'list_comp']);
Route::get('car', [CarController::class, 'list']);
Route::get('comp', [CarController::class, 'list']);
// Route::get('comp', [CompanyController::class, 'list']);
Route::get('compani/{compani_id}', [CarController::class, 'company']);
Route::resource('/admin/car', AdminCarController::class)->middleware('auth');
Route::resource('/admin/company', AdminCompanyController::class)->middleware('auth');

Auth::routes([
    'register' => true,
    'verify' => false,
    'reset' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
