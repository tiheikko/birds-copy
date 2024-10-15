<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\SearchController;

use App\Http\Controllers\GalleryAllController;
use App\Http\Controllers\GalleryRareController;
use App\Http\Controllers\GalleryRedListController;
use App\Http\Controllers\GalleryClassificationController;

use App\Http\Controllers\ArticleController;

use App\Http\Controllers\ImageController;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\GenusController;
use App\Http\Controllers\SpeciesController;



use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



// GALLERY PAGES

Route::get('/', [GalleryAllController::class, 'index'])->name('gallery.index');
Route::get('/rare', [GalleryRareController::class, 'index'])->name('gallery_rare.index');
Route::get('/red_list', [GalleryRedListController::class, 'index'])->name('gallery_red_list.index');

Route::get('/classification', [GalleryClassificationController::class, 'index'])->name('gallery_classification.index');
Route::get('/classification/order/{order}', [GalleryClassificationController::class, 'order'])->name('gallery.order');
Route::get('/classification/family/{family}', [GalleryClassificationController::class, 'family'])->name('gallery.family');
Route::get('/classification/genus/{genus}', [GalleryClassificationController::class, 'genus'])->name('gallery.genus');


Route::get('/search_results', [SearchController::class, 'search'])->name('search');


//ARTICLES PAGES
Route::get('/article/{species}', [ArticleController::class, 'index'])->name('article.index');




// ADMIN PAGES
Route::resources([
    '/dashboard/image' => ImageController::class,
    '/dashboard/order' => OrderController::class,
    '/dashboard/family' => FamilyController::class,
    '/dashboard/species' => SpeciesController::class,
]);

// laravel made weird routes like "/dashboard/genus/{genu}" so it didn't work correctly
Route::get('/dashboard/genus', [GenusController::class, 'index'])->name('genus.index');
Route::get('/dashboard/genus/create', [GenusController::class, 'create'])->name('genus.create');
Route::post('/dashboard/genus', [GenusController::class, 'store'])->name('genus.store');
Route::get('/dashboard/genus/{genus}', [GenusController::class, 'edit'])->name('genus.edit');
Route::patch('/dashboard/genus/{genus}', [GenusController::class, 'update'])->name('genus.update');
Route::delete('/dashboard/genus/{genus}', [GenusController::class, 'destroy'])->name('genus.destroy');


Route::get('/dashboard/article/create', [ArticleController::class, 'create'])->name('article.create');
Route::post('/dashboard/article', [ArticleController::class, 'store'])->name('article.store');
Route::get('/dashboard/articles/', [ArticleController::class, 'show'])->name('article.show');
Route::get('/dashboard/articles/{article}', [ArticleController::class, 'edit'])->name('article.edit');
Route::patch('/dashboard/articles/{article}', [ArticleController::class, 'update'])->name('article.update');
Route::delete('/dashboard/articles/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');