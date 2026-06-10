<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

//Homepage after login
Route::get('/home',function (){
    return view('home');
})->name('home');

//User authentication for login
Route::get('/login',[UserController::class, 'showLogin'])->name('login');
Route::post('/login',[UserController::class, 'login'])->name('login.submit');

//User authentication for sign up
Route::get('/signup',[UserController::class, 'showSignup'])->name('signup');
Route::post('/signup',[UserController::class, 'signup'])->name('signup.submit');

//To show add item form, and view submitted item
Route::get('/items',[ItemController::class,'index'])->name('items');
Route::post('/items',[ItemController::class,'store'])->name('items.store');
Route::get('/view',[ItemController::class,'show'])->name('items.view');

//To edit and softdelete item
Route::get('/items/{id}/edit',[ItemController::class, 'edit'])->name('items.edit');
Route::put('/items/{id}',[ItemController::class, 'update'])->name('items.update');
Route::delete('/items/{id}',[ItemController::class, 'destroy'])->name('items.destroy');

//Trash page that can restore and delete item
Route::get('/trash', [ItemController::class, 'trash'])->name('trash');
Route::post('/items/{id}/restore',[ItemController::class, 'restore'])->name('items.restore');
Route::delete('/items/force-delete/{id}', [ItemController::class, 'forceDelete'])->name('items.forceDelete');

//About us and comment section
Route::get('/aboutus', [CommentController::class, 'aboutus'])->name('aboutus');
Route::post('/aboutus', [CommentController::class, 'store'])->name('comments.store');

//To logout from the system
Route::post('/logout',[UserController::class, 'logout'])->name('logout');