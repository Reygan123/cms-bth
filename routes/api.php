<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\IdentityController;
use App\Http\Controllers\API\SliderController;
use App\Http\Controllers\API\AboutController;
use App\Http\Controllers\API\PartnerController;
use App\Http\Controllers\API\TestimoniController;
use App\Http\Controllers\API\UnggulanController;
use App\Http\Controllers\API\GaleryController;
use App\Http\Controllers\API\DukunganController;
use App\Http\Controllers\API\BeritaController;

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

Route::get('/identity', [IdentityController::class, 'index'])->name('identity');
Route::get('/slider', [SliderController::class, 'index'])->name('slider');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/partner', [PartnerController::class, 'index'])->name('partner');
Route::get('/testimoni', [TestimoniController::class, 'index'])->name('partner');
Route::get('/unggulan', [UnggulanController::class, 'index'])->name('partner');
Route::get('/galery', [GaleryController::class, 'index'])->name('galery');
Route::get('/dukungan', [DukunganController::class, 'index'])->name('galery');
Route::get('/post', [BeritaController::class, 'index'])->name('galery');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
