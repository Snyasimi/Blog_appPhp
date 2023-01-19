<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\{BlogController,ProfileController,CommentController};

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
	return redirect(route('blog.index'));
});


//REGISTER AND LOGIN PAGES
Route::get('/login',[LoginController::class,'loginPage'])->name('loginpage');
Route::get('/register',[LoginController::class,'registerPage'])->name('registerpage');

//REGISTER,LOGIN,LOGOUT ROUTES
Route::post('/login',[LoginController::class,'Login'])->name('login');
Route::post('/register',[LoginController::class,'Register'])->name('register');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');




//PROTECTED ROUTES
Route::resource('profile',ProfileController::class);
Route::resource('/blog',BlogController::class);
Route::middleware(['auth'])->group(function(){
      Route::resource('comments',CommentController::class)->only('update');
      Route::resource('/blog',BlogController::class)->only('create','edit','destroy');
   });

