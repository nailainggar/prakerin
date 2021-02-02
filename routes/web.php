<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\ProvinsiController;
use App\http\Controllers\KotaController;
use App\http\Controllers\KecamatanController;
use App\http\Controllers\DesaController;
use App\http\Controllers\RwController;
use App\http\Controllers\KasusController;
use App\http\Controllers\Kasus2Controller;



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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('test',function(){
    return view('layouts.admin');
});

Route::group(['prefix' => 'admin', 'middleware'=>['auth']],function  (){
    Route::get('/',function()
    {
        return view('admin.index');
    });
    Route::resource('provinsi',ProvinsiController::class);
    Route::resource('kota',KotaController::class);
    Route::resource('kecamatan',KecamatanController::class);
    Route::resource('desa',DesaController::class);
    Route::resource('rw',RwController::class);
    Route::resource('kasus2',KasusController::class);
    Route::resource('kasus2',Kasus2Controller::class);

});

