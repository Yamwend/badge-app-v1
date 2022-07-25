<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonneController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/print', function () {
    return view('print');
});

Route::get('generate-pdf', [PdfController::class, 'generatepdf'])->name('generate-pdf');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource("/personne", PersonneController::class);

require __DIR__.'/auth.php';
