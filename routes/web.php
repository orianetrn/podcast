<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PodcastsController;


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


// PAGE ACCUEIL
Route::get('/',[PodcastsController::class, 'home'])-> name('home');

Route::resource('podcasts', PodcastsController::class);

// PAGE GÉRER LES/MES PODCASTS
Route::get('/podcasts',[PodcastsController::class, 'index'])-> name('podcasts.index')->middleware('auth');

// PAGE INFO PODCAST
Route::get('/podcasts/{podcast}',[PodcastsController::class, 'show'])-> name('podcasts.show');

// PAGE AJOUTER UN PODCAST
Route::get('/podcasts/create',[PodcastsController::class, 'create'])-> name('podcasts.create')->middleware('auth');

// CREATE PODCAST
Route::post('/podcasts',[PodcastsController::class, 'store'])-> name('podcasts.store')->middleware('auth');

// PAGE ÉDITION PODCAST
Route::get('/podcasts/{podcast}/edit',[PodcastsController::class, 'edit'])-> name('podcast.edit')->middleware('auth');

//UPDATE PODCAST
Route::put('/podcasts/{podcast}',[PodcastsController::class, 'update'])-> name('podcast.update')->middleware('auth');





//??
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
