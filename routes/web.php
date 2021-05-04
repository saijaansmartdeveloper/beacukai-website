<?php

use App\Http\Controllers\AdminController;
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

Route::get('/', [AdminController::class, 'isGUest']);
Route::get('post/list', [App\Http\Controllers\AdminController::class, 'list_post'])->name('post.list');
Route::get('post/{slug}', [App\Http\Controllers\AdminController::class, 'single_post'])->name('post.single');

Route::get('page/{slug}', [App\Http\Controllers\AdminController::class, 'single_page'])->name('page.single');
Route::get('peraturan', [App\Http\Controllers\AdminController::class, 'peraturan'])->name('peraturan');


Auth::routes();

Route::middleware('auth')->group(function() {

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
 * Banners Routes
 */
Route::resource('banners', App\Http\Controllers\BannerController::class);

/*
 * Pages Routes
 */
Route::resource('pages', App\Http\Controllers\PageController::class);

/*
 * Posts Routes
 */
Route::resource('posts', App\Http\Controllers\PostController::class);

/*
 * Socials Routes
 */
Route::resource('socials', App\Http\Controllers\SocialController::class);

/*
 * Surveys Routes
 */
Route::resource('surveys', App\Http\Controllers\SurveyController::class);

/*
 * Sirings Routes
 */
Route::resource('sirings', App\Http\Controllers\SiringController::class);

/*
 * KotabaruLinks Routes
 */
Route::resource('kotabaru_links', App\Http\Controllers\KotabaruLinkController::class);

/*
 * Testimonis Routes
 */
Route::resource('testimonis', App\Http\Controllers\TestimoniController::class);

/*
 * Layanans Routes
 */
Route::resource('layanans', App\Http\Controllers\LayananController::class);

/*
 * Kurs Routes
 */
Route::resource('kurs', App\Http\Controllers\KursController::class);

/*
 * Footers Routes
 */
Route::resource('footers', App\Http\Controllers\FooterController::class);

/*
 * Directories Routes
 */
Route::resource('directories', App\Http\Controllers\DirectoryController::class);


});
