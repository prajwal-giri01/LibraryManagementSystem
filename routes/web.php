<?php

use App\Http\Controllers\admin\AuthorController;
use App\Http\Controllers\admin\BookController;
use App\Http\Controllers\admin\GenreController;
use App\Http\Controllers\admin\MembershipController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'landing'])->name('landing');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => ['auth', 'verified','isAdmin'], 'prefix'=>'admin'],function(){
    Route::get('dashboard',[AuthorController::class, 'showDashboard'])->name('admin.dashboard');
    // Author
    Route::get('author',[AuthorController::class, 'index'])->name('admin.author');
    Route::get('author/add',[AuthorController::class, 'show'])->name('admin.author.add');
    Route::post('author/store',[AuthorController::class, 'store'])->name('admin.author.store');
    Route::get('author/edit/{id}',[AuthorController::class, 'edit'])->name('admin.author.edit');
    Route::PUT('author/update/{id}',[AuthorController::class, 'update'])->name('admin.author.update');
    Route::get('author/{id}',[AuthorController::class, 'trash'])->name('admin.author.trash');
    Route::get('trash/author',[AuthorController::class, 'trashshow'])->name('admin.author.trash.index');
    Route::get('restore/author/{id}',[AuthorController::class,'restore'])->name('admin.author.restore');
    Route::delete('delete/author/{id}',[AuthorController::class,'destroy'])->name('admin.author.delete');

    //Genre
    Route::get('genre',[GenreController::class, 'index'])->name('admin.genre');
    Route::get('genre/add',[GenreController::class, 'show'])->name('admin.genre.add');
    Route::post('genre/store',[GenreController::class, 'store'])->name('admin.genre.store');
    Route::get('genre/edit/{id}',[GenreController::class, 'edit'])->name('admin.genre.edit');
    Route::PUT('genre/update/{id}',[GenreController::class, 'update'])->name('admin.genre.update');
    Route::get('genre/{id}',[GenreController::class, 'trash'])->name('admin.genre.trash');
    Route::get('trash/genre',[GenreController::class, 'trashshow'])->name('admin.genre.trash.index');
    Route::get('restore/genre/{id}' ,[GenreController::class,'restore' ])->name('admin.genre.restore');
    Route::delete('delete/genre/{id}' ,[GenreController::class,'destroy' ])->name('admin.genre.delete');

    //Book
    Route::get('book',[BookController::class, 'index'])->name('admin.book');
    Route::get('book/{id}',[BookController::class, 'trash'])->name('admin.book.trash');
    Route::get('trash/book',[BookController::class, 'trashshow'])->name('admin.book.trash.index');
    Route::get('restore/book/{id}' ,[BookController::class,'restore' ])->name('admin.book.restore');
    Route::delete('delete/book/{id}',[BookController::class,'destroy'])->name('admin.book.delete');

    //Membership
    Route::get('membership',[MembershipController::class, 'index'])->name('admin.membership');
    Route::get('membership/{id}',[MembershipController::class, 'trash'])->name('admin.membership.trash');
    Route::get('trash/membership',[MembershipController::class, 'trashshow'])->name('admin.membership.trash.index');
    Route::get('restore/membership/{id}' ,[MembershipController::class,'restore' ])->name('admin.membership.restore');
    Route::delete('delete/membership/{id}',[MembershipController::class,'destroy'])->name('admin.membership.delete');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
