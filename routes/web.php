<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
// use Illuminate\Support\Facades\DB;

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
})->name('index'); 

Route::post('/signup', [UserController::class, 'signup']);
Route::get('/signup', [UserController::class, 'showSignupForm'])->name('signup');

Route::get('/login', function () {
    return view('login');
})->name('login'); 

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::get('/adminpage', [UserController::class, 'showAdminpage'])->name('adminpage');
});
Route::get('/adminpage', [PostController::class, 'adminPage'])->name('adminpage');

Route::middleware('auth')->group(function () {
    Route::get('/users/{userId}/edit', 'PostController@editUser');
    Route::delete('/users/{userId}', 'PostController@deleteUser');
});

Route::get('edit-user/{id}', [UserController::class, 'editUser']);
Route::get('delete-user/{id}', [UserController::class, 'deleteUser']);
Route::post('update-user', [UserController::class, 'updateUser']);

Route::get('/add_item', function () {
    return view('add_item');
});

Route::post('/add_item',[PostController::class,'addPost']);
Route::get('edit-item/{item_id}', [PostController::class, 'editItem']);
Route::post('update-item', [PostController::class, 'updateItem']);
Route::get('delete-item/{item_id}', [PostController::class, 'deleteItem']);

Route::get('/collection', [PostController::class, 'collection'])->name('collection');

Route::get('/collection/{category}/{subcategory}', [PostController::class, 'filtered_collection'])->name('filtered_collection');

Route::get('/details/{itemId}', [PostController::class, 'showDetails'])->name('details');

Route::post('/cart', [CartController::class, 'addToCart'])->name('cart');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart');
Route::post('/cart/remove/{item_id}', [CartController::class, 'remove'])->name('cart.remove');


Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::post('/update-profile', [UserController::class, 'updateProfile'])->name('update-profile');



Route::get('/logout', [UserController::class, 'logout'])->name('logout');

