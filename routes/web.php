<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewsController;
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

//handle redirect register to login
// Route::match(['get','post'], '/register', 
//     function(){
//         return redirect('/login');
// });

//Route Middleware
Route::middleware('auth')->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [\App\Http\Controllers\Profile\ProfileController::class,'index'])->name('profile.index');
    Route::get('/change-password',[\App\Http\Controllers\Profile\ProfileController::class, 'changePassword'])->name('profile.change-password');
    Route::put('/update-password',[\App\Http\Controllers\Profile\ProfileController::class, 'updatePassword'])->name('profile.update-password');
    Route::get('/create-profile',[\App\Http\Controllers\Profile\ProfileController::class, 'createProfile'])->name('profile.create');
    //post profile
    Route::post('/store-profile',[\App\Http\Controllers\Profile\ProfileController::class, 'storeProfile'])->name('profile.store');

    //Route for admin
    // middleware admin diamana kita membuat middleware sendiri
    // middleware ini akan memeriksa apakah user yang login adalah admin
    // jika ya, maka user akan diarahkan ke halaman admin
    // jika tidak, maka user akan diarahkan ke halaman home
    // diambil dari app/Http/Middleware/isAdmin.php 
    // yang didaftrakan di app/Http/Kernel.php
    Route::middleware(['auth', 'admin'])
        ->group(function () {
            //Route for News using Resource
            Route::resource('news', NewsController::class);
            //Route for Category using Resource

            // fungsi except('show') itu untuk menghilangkan fungsi show
            // karena kita tidak akan menggunakan show
            // fungsi only('index') itu untuk menampilkan fungsi index saja
            // karena kita hanya akan menggunakan index
            Route::resource('category', CategoryController::class)->except('show');

            //get user list
            Route::get('/all-user',[\App\Http\Controllers\Profile\ProfileController::class, 'allUser'])->name('profile.all-user');
            // reset password user by admin
            Route::put('/reset-password/{id}',[\App\Http\Controllers\Profile\ProfileController::class, 'resetPasswordByAdmin'])->name('profile.reset-password');
    });
});
