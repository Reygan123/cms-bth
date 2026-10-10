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
Route::get('/slider-home', [SliderController::class, 'indexHome'])->name('slider.home');
Route::get('/sidebanner', [SliderController::class, 'indexSideBanner'])->name('banner');
Route::get('/side-baner', [SliderController::class, 'indexSideBanner'])->name('side-baner');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/partner', [PartnerController::class, 'index'])->name('partner');
Route::get('/partner-home', [PartnerController::class, 'indexHome'])->name('partner.home');
Route::get('/partner/{id}', [PartnerController::class, 'show'])->name('partner.show');
Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni');
Route::get('/testimoni/fakultas/{id}', [TestimoniController::class, 'testimoniFakultas'])->name('testimoniFakultas');
Route::get('/testimoni-home', [TestimoniController::class, 'indexHome'])->name('testimoni.home');
Route::get('/testimoni-departement/{id}', [TestimoniController::class, 'show'])->name('testimoni.show');
Route::get('/unggulan', [UnggulanController::class, 'index'])->name('unggulan');
Route::get('/unggulan-home', [UnggulanController::class, 'indexHome'])->name('unggulan.home');
Route::get('/unggulan/{id}', [UnggulanController::class, 'show'])->name('unggulanSlug');
Route::get('/unggulan/fakultas/{id}', [UnggulanController::class, 'showFakultas'])->name('showFakultas');
Route::get('/galery', [GaleryController::class, 'index'])->name('galery');
Route::get('/inovasi-home', [GaleryController::class, 'indexHome'])->name('inovasi.home');
Route::get('/inovasi-home/{slug}', [GaleryController::class, 'showInovasi'])->name('inovasi.show');
Route::get('/dukungan', [DukunganController::class, 'index'])->name('dukungan');
Route::get('/legal', [LegalController::class, 'index'])->name('legal');
Route::get('/team', [OurTeamController::class, 'indexAll'])->name('team.all');
Route::get('/team-home', [OurTeamController::class, 'indexHome'])->name('team.home');
Route::get('/team/{id}', [OurTeamController::class, 'index'])->name('team');
Route::get('/post', [BeritaController::class, 'index'])->name('post');
Route::get('/postall', [BeritaController::class, 'postall'])->name('postall');
Route::get('/post/{slug}', [BeritaController::class, 'show'])->name('post');
Route::get('/agenda', [BeritaController::class, 'indexAgenda'])->name('agenda');
Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi');
Route::get('/prestasi-home', [PrestasiController::class, 'indexHome'])->name('prestasi.home');
Route::get('/prestasi/{slug}', [PrestasiController::class, 'getByProgramSlug'])->name('prestasi.byProgram');
Route::get('/prestasi/fakultas/{id}', [PrestasiController::class, 'getByFakultas'])->name('getByFakultas');
Route::get('/prestasi-statistik', [PrestasiController::class, 'indexStstistik'])->name('indexStstistik');
Route::get('/fasilitasUnggulan', [FasilitasController::class, 'index'])->name('fasilitas');
Route::get('/fasilitas-home', [FasilitasController::class, 'indexHome'])->name('fasilitas.home');
Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas.list');
Route::get('/fasilitas/fakultas/{id}', [FasilitasController::class, 'fasilitasFakultas'])->name('fasilitasFakultas');
Route::get('/organisasi', [OrganisasiController::class, 'index'])->name('organisasi');
Route::get('/organisasi-home', [OrganisasiController::class, 'indexHome'])->name('organisasiHome');
Route::get('/organisasi/departement/{id}', [OrganisasiController::class, 'indexDepartementOrganisasi'])->name('indexDepartementOrganisasi');
Route::get('/kategori-organisasi', [OrganisasiController::class, 'indexKategoriOrganisasi'])->name('indexKategoriOrganisasi');
Route::get('/organisasi/fakultas/{id}', [OrganisasiController::class, 'organisasiFakultas'])->name('organisasiFakultas');
Route::get('/prodi', [FakultasController::class, 'index'])->name('prodi');
Route::get('/prodi/{slug}', [FakultasController::class, 'show'])->name('prodiSlug');
Route::get('/fakultas', [FakultasController::class, 'indexFakultas'])->name('fakultas');
Route::get('/fakultas/{slug}', [FakultasController::class, 'showOneFakultas'])->name('fakultas.slug');

Route::get('/registration', [RegistrationController::class, 'index'])->name('registration');
Route::get('/registration/{slug}', [RegistrationController::class, 'indexSlug'])->name('registration.slug');

Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
Route::get('/pengumuman/{slug}', [PengumumanController::class, 'show'])->name('pengumuman.show');


// SEO
Route::get('/meta-pixel', [SliderController::class, 'indexPixel'])->name('meta-fixel');
Route::get('/google-analytics', [SliderController::class, 'indexAnalytics'])->name('google-analytics');
Route::get('/chat', [SliderController::class, 'indexChat'])->name('chats');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// get Statistik
Route::get('/statistik', [DataApiController::class, 'statistikUniv'])->name('statistikUniv');
Route::get('/hero-home', [DataApiController::class, 'heroHome'])->name('heroHome');
Route::get('/fakultas-detail', [DataApiController::class, 'fakultasDetail'])->name('fakultasDetail');
Route::get('/akademik', [DataApiController::class, 'akademik'])->name('akademik');
