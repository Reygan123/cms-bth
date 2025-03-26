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

Route::get('/faqs-kategori', [FaqController::class, 'indexKategori'])->name('Kategori.faq');
Route::get('/faqs/{id}', [FaqController::class, 'show'])->name('Kategori.faq');
Route::get('/faqs', [FaqController::class, 'index'])->name('faq');
Route::get('/identity', [IdentityController::class, 'index'])->name('identity');
Route::get('/slider', [SliderController::class, 'index'])->name('slider');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/partner', [PartnerController::class, 'index'])->name('partner');
Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni');
Route::get('/unggulan', [UnggulanController::class, 'index'])->name('unggulan');
Route::get('/unggulan/{id}', [UnggulanController::class, 'show'])->name('unggulanSlug');
Route::get('/galery', [GaleryController::class, 'index'])->name('galery');
Route::get('/dukungan', [DukunganController::class, 'index'])->name('dukungan');
Route::get('/legal', [LegalController::class, 'index'])->name('legal');
Route::get('/team/{id}', [OurTeamController::class, 'index'])->name('team');
Route::get('/post', [BeritaController::class, 'index'])->name('post');
Route::get('/post/{slug}', [BeritaController::class, 'show'])->name('post');
Route::get('/agenda', [BeritaController::class, 'indexAgenda'])->name('agenda');
Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi');
Route::get('/prestasi/{slug}', [PrestasiController::class, 'getByProgramSlug'])->name('prestasi.byProgram');
Route::get('/fasilitasUnggulan', [FasilitasController::class, 'index'])->name('fasilitas');
Route::get('/organisasi', [OrganisasiController::class, 'index'])->name('organisasi');
Route::get('/prodi', [FakultasController::class, 'index'])->name('prodi');
Route::get('/prodi/{slug}', [FakultasController::class, 'show'])->name('prodiSlug');
Route::get('/fakultas', [FakultasController::class, 'indexFakultas'])->name('fakultas');
Route::get('/fakultas/{slug}', [FakultasController::class, 'showOneFakultas'])->name('fakultas.slug');

Route::get('/registration', [RegistrationController::class, 'index'])->name('registration');


// SEO
Route::get('/meta-pixel', [SliderController::class, 'indexPixel'])->name('meta-fixel');
Route::get('/google-analytics', [SliderController::class, 'indexAnalytics'])->name('google-analytics');
Route::get('/chat', [SliderController::class, 'indexChat'])->name('chats');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
