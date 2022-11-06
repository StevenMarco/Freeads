<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnnonceController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\MessagesController;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [IndexController::class, 'showIndex']);

// register action
Route::get('/register/', [RegisterController::class, 'showRegister']);
Route::post('/register/', [RegisterController::class, 'store']);

// login action
Route::get('/login/', [LoginController::class, 'showLogin']);
Route::post('/login/', [LoginController::class, 'store']);

// logout action
Route::get('/logout/', [LoginController::class, 'destroy']);

// profile action
Route::get('/profile/', [ProfileController::class, 'showProfile']);
Route::post('/profile/', [ProfileController::class, 'update']);

// annonce action
Route::get('/annonce/', [AnnonceController::class, 'showAnnonce']);
Route::post('/annonce/', [AnnonceController::class, 'store']);
Route::post('/annonce/search/', [AnnonceController::class, 'search']);
Route::get('/annonce/edit/{id}/', [AnnonceController::class, 'showAnnonceEdit']);
Route::post('/annonce/edit/{id}/', [AnnonceController::class, 'updateAnnonce']);

// message action
Route::get('/messages/', [MessagesController::class, 'showMessages']);
Route::post('/messages/', [MessagesController::class, 'store']);


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');