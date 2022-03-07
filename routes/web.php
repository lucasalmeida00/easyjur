<?php

use App\Http\Controllers\TipController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dica/{tipId}', [App\Http\Controllers\HomeController::class, 'show'])->name('show.tip');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::resource('tips', TipController::class)->middleware((['auth']));

Route::get('/brands/{typeId}', [App\Http\Controllers\TypeController::class, 'getBrands'])->name('getBrands');


require __DIR__ . '/auth.php';
