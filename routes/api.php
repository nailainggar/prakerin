<?php

use App\Models\provinsi;
use App\Models\kasus2;
use App\Models\Desa;
use App\Models\Rw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProvinsiController;
use App\Http\Controllers\Api\ApiController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//ROUTE ProvinsiController
// Route::get('provinsi',[ProvinsiController::class, 'index']);
// Route::post('provinsi',[ProvinsiController::class, 'store']);
// Route::get('provinsi/{id?}',[ProvinsiController::class, 'show']);
// Route::delete('provinsi/{id?}',[ProvinsiController::class, 'destroy']);


//ROUTE ApiController
Route::get('kasus2',[ApiController::class, 'index']);
// Route::get('hariini',[ApiController::class, 'hari']);
Route::get('provinsikasus/{id}',[ApiController::class, 'provinsi']);
Route::get('provinsikasus2',[ApiController::class, 'provinsikasus']);
