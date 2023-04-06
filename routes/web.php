<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserGamesController;
use App\Http\Controllers\User\UserGameController;
use App\Http\Controllers\Admin\AdminGameController;

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Auth\CustomAuthController;
use App\Http\Controllers\Admin\AdminGenreController;
use App\Http\Controllers\Admin\AdminLanguageController;
use App\Http\Controllers\Admin\AdminPlatformController;

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
Route::get('/', function () {
    return view('welcome');
});

Route::post('/upload-image', 'ImageController@upload');


Route::get('/admin/document', function () {
    return view('admin.layouts.document');
})->name('admin.layouts.document');

Route::prefix('admin')->name('admin.')->group(function (){
    Route::get('/', [AdminHomeController::class, 'index'])->name('home');
    Route::resource('games', AdminGameController::class);
    Route::resource('platforms', AdminPlatformController::class);
    Route::resource('languages', AdminLanguageController::class);
    Route::resource('genres', AdminGenreController::class);
});


Route::prefix('user')->name('user.')->group(function (){
    Route::resource('games', UserGameController::class)->only(['index', 'show']);
});
