<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CartController;
use App\Models\Post;
use App\Models\User;


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
    return view('index');
})->name('index'); // Add ->name('index') to give the route a name

Route::get('/add_item', function () {
    return view('add_item');
});

Route::get('/login', function () {
    return view('login');
})->name('login'); // Add ->name('login') to give the route a name

Route::middleware(['auth'])->group(function () {
    Route::get('/adminpage', [UserController::class, 'showAdminpage'])->name('adminpage');
});


Route::get('/index', function () {
    return view('index');
});

Route::get('/cart', [CartController::class, 'showCart'])->name('cart');

Route::get('/profile', [UserController::class, 'profile'])->name('profile');

Route::get('/collection', [PostController::class, 'collection'])->name('collection');

Route::get('/details/{itemId}', [PostController::class, 'showDetails'])->name('details');

Route::post('/addToCart/{itemId}', [PostController::class, 'addToCart'])->name('addToCart');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/signup', [UserController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [UserController::class, 'signup']);

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::post('/add-post', 'PostController@addPost')->name('addPost');



