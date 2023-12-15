<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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



// web.php

Route::middleware(['auth'])->group(function () {
    Route::get('/adminpage', function () {
        return view('adminpage'); // You can return the appropriate view here
    })->name('adminpage');
});


Route::get('/index', function () {
    return view('index');
});

// web.php

Route::get('/collection', function () {
    return view('collection');
})->name('collection');


// Route::get('/signup', function () {
//     return view('signup');
// });

Route::get('/signup', [UserController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [UserController::class, 'signup']);


Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);

