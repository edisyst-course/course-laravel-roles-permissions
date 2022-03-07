<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

//Route::group([], function (){}); //[] è un array di regole
Route::group([
    'middleware' => 'auth'
], function (){
    Route::resource('articles', \App\Http\Controllers\ArticleController::class);
    Route::view('invite', 'invite')->name('invite');

    Route::get('join', [\App\Http\Controllers\JoinController::class, 'create'])->name('join.create');
    Route::post('join', [\App\Http\Controllers\JoinController::class, 'store'])->name('join.store');

    Route::get('organization/{organization_id}', [\App\Http\Controllers\JoinController::class, 'organization'])->name('organization');

    // Administrator routes
    Route::group(['middleware' => 'is_admin'], function () {
        Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    });

});


