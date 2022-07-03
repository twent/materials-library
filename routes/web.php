<?php

use App\Http\Controllers\{CategoryController, HomeController, LinkController, MaterialController, TagController};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [MaterialController::class, 'index'])->name('home')->middleware('guest');

/* Dashboard for Verified Admin Users */
Route::group(['middleware' => 'auth', 'prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('/', [MaterialController::class, 'index'])->name('home');

    /* Categories CRUD routes */
    Route::resource('categories', CategoryController::class)->except('show');;

    /* Tags CRUD routes */
    Route::resource('tags', TagController::class)->except('show');

    /* Links CRUD routes */
    Route::resource('links', LinkController::class)->except('show');;

    /* Materials routes */
    Route::resource('materials', MaterialController::class);
    Route::put('/materials/{material}/tag-attach', [MaterialController::class, 'tagAttach'])->name('materials.tag-attach');
    Route::put('/materials/{material}/tag-detach', [MaterialController::class, 'tagDetach'])->name('materials.tag-detach');
    Route::put('/materials/{material}/link-detach', [MaterialController::class, 'linkDetach'])->name('materials.link-detach');
});
