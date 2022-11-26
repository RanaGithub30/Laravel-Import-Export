<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDetailsController;
use App\Http\Controllers\CsvController;
use App\Http\Controllers\PdfController;

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

// Csv Export & Import..

Route::get('export-data', [CsvController::class, 'export'])->name('export-data');

Route::get('import-csv-page', [CsvController::class, 'import_csv_page'])->name('import-csv-page');
Route::any('import-csv', [CsvController::class, 'import_csv'])->name('import-csv');

// Pdf Export..

Route::get('generate-pdf', [PdfController::class, 'generate_pdf'])->name('generate-pdf');