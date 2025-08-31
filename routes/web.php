<?php

use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return redirect()->route('antrianBriPage');
})->name('Main');

Route::get('/antrian', [RegisterController::class, 'antrian'])->name('antrianBriPage');
Route::get('/puskesmas', [RegisterController::class, 'Puskesmas'])->name('antrianPuskesmasPage');

Route::post('/register_company', [RegisterController::class, 'create'])->name('RegisterCompany');
Route::post('/register_puskesmas', [RegisterController::class, 'createPuskesmas'])->name('RegisterPuskesmas');
