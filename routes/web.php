<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmsController;
use App\Http\Controllers\ActeursController;
use App\Http\Controllers\UsagersController;

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

// Route::get('/', function () {
//     return view('welcome');
// });




Route::group(['middleware' => 'prevent-back-history'],function(){

    Route::get('/',
    [UsagersController::class, 'showLoginForm'])->name('usagers.login')->middleware('guest');

    Route::post('login',
    [UsagersController::class, 'login'])->name('login')->middleware('guest');

    Route::post('logout',
    [UsagersController::class, 'logout'])->name('logout')->middleware('auth');

    Route::get('usagers/register',
    [UsagersController::class, 'create'])->name('usagers.create')->middleware('guest');

    Route::post('usagers',
    [UsagersController::class, 'store'])->name('usagers.store')->middleware('guest');

    Route::get('usagers',
    [UsagersController::class, 'index'])->name('usagers.index')->middleware('auth');

    Route::get('usagers/{id}',
    [UsagersController::class, 'show'])->name('usagers.show')->middleware('auth');

    Route::get('usagers/{id}/edit',
    [UsagersController::class, 'edit'])->name('usagers.edit')->middleware('auth');

    Route::patch('usagers/{id}',
    [UsagersController::class, 'update'])->name('usagers.update')->middleware('auth');

    Route::delete('usagers/{id}/supprimer',
    [UsagersController::class, 'destroy'])->name('usagers.destroy')->middleware('auth');

    Route::get('films',
    [FilmsController::class, 'index'])->name('films.index')->middleware('auth');

    Route::get('acteurs/create',
    [ActeursController::class, 'create'])->name('acteurs.create')->middleware('auth');

    Route::post('acteurs',
    [ActeursController::class, 'store'])->name('acteurs.store')->middleware('auth');

    Route::post('acteurs/createActeurFilm',
    [ActeursController::class, 'storeActeurFilm'])->name('acteurs.storeActeurFilm')->middleware('auth');

    Route::get('acteurs/createActeurFilm',
    [ActeursController::class, 'createActeurFilm'])->name('acteurs.createActeurFilm')->middleware('auth');

    Route::get('films/create',
    [FilmsController::class, 'create'])->name('films.create')->middleware('auth');

    Route::post('films',
    [FilmsController::class, 'store'])->name('films.store')->middleware('auth');

    Route::get('films/{film}',
    [FilmsController::class, 'show'])->name('films.show')->middleware('auth');

    Route::get('films/{id}/modifier',
    [FilmsController::class, 'edit'])->name('films.edit')->middleware('auth');

    Route::patch('films/{id}/modifier',
    [FilmsController::class, 'update'])->name('films.update')->middleware('auth');

    Route::delete('films/{id}/supprimer',
    [FilmsController::class, 'destroy'])->name('films.destroy')->middleware('auth');

    Route::get('acteurs/{id}',
    [ActeursController::class, 'show'])->name('acteurs.show')->middleware('auth');

    Route::get('acteurs/{id}/modifier',
    [ActeursController::class, 'edit'])->name('acteurs.edit')->middleware('auth');

    Route::patch('acteurs/{id}/modifier',
    [ActeursController::class, 'update'])->name('acteurs.update')->middleware('auth');

    Route::delete('acteurs/{id}/supprimer',
    [ActeursController::class, 'destroy'])->name('acteurs.destroy')->middleware('auth');

    Route::delete('acteurs/{id}/films/{idFilm}/supprimerActeurFilm',
    [ActeursController::class, 'destroyActeurFilm'])->name('acteurs.destroyActeurFilm')->middleware('auth');

});