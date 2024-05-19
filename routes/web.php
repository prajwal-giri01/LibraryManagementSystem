<?php

use App\Http\Controllers\admin\AuthorController;
use App\Http\Controllers\admin\BookController;
use App\Http\Controllers\admin\DeliveryController;
use App\Http\Controllers\admin\GenreController;
use App\Http\Controllers\admin\MembershipController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'landing'])->name('landing');
Route::get('genre/{id}', [HomeController::class, 'genre'])->name('genre');
Route::get('genre', [HomeController::class, 'genreAll'])->name('genre.all');
Route::get('search', [HomeController::class, 'search'])->name('search');
Route::get('book/{id}', [HomeController::class, 'book'])->name('book');
Route::post('feedback', [HomeController::class, 'feedback'])->name('feedback');


Route::group(['middleware' => ['auth', 'verified']], function (){
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/membership', [UserController::class, 'membership'])->name('membership');
    Route::get('book', [UserController::class, 'bookOrder'])->name('user.book.order');
    Route::get('rent/history', [UserController::class, 'bookOrderHistory'])->name('user.book.order.history');
    Route::post('/membership/{id}', [UserController::class, 'membershipPurchase'])->name('membership.purchase');
    Route::post('/book/rent/pickup/{id}', [UserController::class, 'bookPurchasePickup'])->name('book.purchase.pickup');
    Route::post('/book/rent/delivery/{id}', [UserController::class, 'bookPurchaseDelivery'])->name('book.purchase.delivery');
});


Route::group(['middleware' => ['auth', 'verified','isAdmin'], 'prefix'=>'admin'],function(){
    Route::get('dashboard',[AuthorController::class, 'showDashboard'])->name('admin.dashboard');

    //rented book
    Route::get('book/rent',[BookController::class,'rent'])->name('admin.book.rent');
    Route::get('book/rent/single/{id}',[BookController::class,'rentSingle'])->name('admin.rented.book.single');
    Route::get('book/status/ongoing/{id}',[BookController::class,'statusOngoing'])->name('admin.book.status.ongoing');
    Route::post('book/status/completed/{id}',[BookController::class,'statusCompleted'])->name('admin.book.status.completed');

    //feedback
    Route::get('feedback',[AuthorController::class, 'feedback'])->name('admin.feedback');
    Route::get('feedback/{id}',[AuthorController::class, 'feedbackSingle'])->name('admin.feedback.single');
    Route::delete('feedback/{id}',[AuthorController::class, 'destroyFeedback'])->name('admin.feedback.delete');

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

    // location
    Route::get('location',[DeliveryController::class, 'index'])->name('admin.location');
    Route::get('location/add',[DeliveryController::class, 'show'])->name('admin.location.add');
    Route::post('location/store',[DeliveryController::class, 'store'])->name('admin.location.store');
    Route::get('location/edit/{id}',[DeliveryController::class, 'edit'])->name('admin.location.edit');
    Route::PUT('location/update/{id}',[DeliveryController::class, 'update'])->name('admin.location.update');
    Route::get('location/{id}',[DeliveryController::class, 'trash'])->name('admin.location.trash');
    Route::get('trash/location',[DeliveryController::class, 'trashshow'])->name('admin.location.trash.index');
    Route::get('restore/location/{id}',[DeliveryController::class,'restore'])->name('admin.location.restore');
    Route::delete('delete/location/{id}',[DeliveryController::class,'destroy'])->name('admin.location.delete');

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
    Route::get('book/add',[BookController::class, 'show'])->name('admin.book.add');
    Route::post('book/store',[BookController::class, 'store'])->name('admin.book.store');
    Route::get('book/edit/{id}',[BookController::class, 'edit'])->name('admin.book.edit');
    Route::put('book/edit/{id}',[BookController::class, 'update'])->name('admin.book.update');
    Route::get('book/{id}',[BookController::class, 'trash'])->name('admin.book.trash');
    Route::get('trash/book',[BookController::class, 'trashshow'])->name('admin.book.trash.index');
    Route::get('restore/book/{id}',[BookController::class,'restore'])->name('admin.book.restore');
    Route::delete('delete/book/{id}',[BookController::class,'destroy'])->name('admin.book.delete');

    //Membership
    Route::get('membership',[MembershipController::class, 'index'])->name('admin.membership');
    Route::get('membership/add',[MembershipController::class, 'show'])->name('admin.membership.add');
    Route::post('membership/store',[MembershipController::class, 'store'])-> name('admin.membership.store');
    Route::get('membership/edit/{id}',[MembershipController::class, 'edit'])-> name('admin.membership.edit');
    Route::put('membership/update/{id}',[MembershipController::class, 'update'])-> name('admin.membership.update');
    Route::get('membership/{id}',[MembershipController::class, 'trash'])->name('admin.membership.trash');
    Route::get('trash/membership',[MembershipController::class, 'trashshow'])->name('admin.membership.trash.index');
    Route::get('restore/membership/{id}' ,[MembershipController::class,'restore' ])->name('admin.membership.restore');
    Route::delete('delete/membership/{id}',[MembershipController::class,'destroy'])->name('admin.membership.delete');

    //userHasMembership
    Route::get('user/membership',[MembershipController::class, 'userMembership'])->name('admin.user.membership');
    Route::get('user/membership/purchase',[MembershipController::class, 'userMembershipPurchase'])->name('admin.membership.purchase');
    Route::post('user/membership/purchase/store',[MembershipController::class, 'userMembershipPurchaseStore'])->name('admin.membership.purchase.store');
    Route::get('user/membership/approve/{id}',[MembershipController::class, 'userMembershipPurchaseApprove'])->name('admin.membership.approve');
    Route::get('user/membership/approve/store/{id}',[MembershipController::class, 'userMembershipPurchaseApproveStore'])->name('admin.membership.approve.store');



});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
