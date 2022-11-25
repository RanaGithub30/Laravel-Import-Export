<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDetailsController;

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

Route::get('/', [UserDetailsController::class, 'home'])->name('/');
Route::get('user-save/{type}/{id}', [UserDetailsController::class, 'save'])->name('user-save');

Route::any('user-post-save/{type}/{id}', [UserDetailsController::class, 'postSave'])->name('user-post-save');
Route::get('delete-data/{id}', [UserDetailsController::class, 'delete'])->name('delete-data');
Route::get('export-data', [UserDetailsController::class, 'export'])->name('export-data');