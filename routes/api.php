<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni');
Route::get('/unggulan', [UnggulanController::class, 'index'])->name('unggulan');
Route::get('/unggulan/{slug}', [UnggulanController::class, 'show'])->name('unggulanSlug');
Route::get('/galery', [GaleryController::class, 'index'])->name('galery');
Route::get('/dukungan', [DukunganController::class, 'index'])->name('dukungan');
Route::get('/legal', [LegalController::class, 'index'])->name('legal');
Route::get('/team', [OurTeamController::class, 'index'])->name('team');
Route::get('/post', [BeritaController::class, 'index'])->name('post');
Route::get('/agenda', [BeritaController::class, 'indexAgenda'])->name('agenda');
Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi');
Route::get('/fasilitasUnggulan', [FasilitasController::class, 'index'])->name('fasilitas');
Route::get('/organisasi', [OrganisasiController::class, 'index'])->name('organisasi');
Route::get('/prodi', [FakultasController::class, 'index'])->name('prodi');
Route::get('/prodi/{slug}', [FakultasController::class, 'show'])->name('prodiSlug');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
