<?php

use App\Http\Controllers\admin\AuthorController;
use App\Http\Controllers\admin\GenreController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('landing');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => ['auth', 'verified','isAdmin'], 'prefix'=>'admin'],function(){
    Route::get('dashboard',[AuthorController::class, 'showDashboard'])->name('admin.dashboard');
    // Author
    Route::get('author/add',[AuthorController::class, 'show'])->name('admin.author.add');
    Route::get('author',[AuthorController::class, 'index'])->name('admin.author');
    Route::get('author/{id}',[AuthorController::class, 'trash'])->name('admin.author.trash');
    Route::get('trash/author',[AuthorController::class, 'trashshow'])->name('admin.author.trash.index');
    Route::get('restore/author/{id}',[AuthorController::class,'restore'])->name('admin.author.restore');

    Route::delete('delete/author/{id}',[AuthorController::class,'destroy'])->name('admin.author.delete');

    //Genre
    Route::get('genre',[GenreController::class, 'index'])->name('admin.genre');
    Route::get('genre/{id}',[GenreController::class, 'trash'])->name('admin.genre.trash');
    Route::get('trash/genre',[GenreController::class, 'trashshow'])->name('admin.genre.trash.index');
    Route::get('restore/genre/{id}' ,[GenreController::class,'restore' ])->name('admin.genre.restore');
    Route::delete('delete/genre/{id}' ,[GenreController::class,'destroy' ])->name('admin.genre.delete');


});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
