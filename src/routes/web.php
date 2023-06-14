<?php

use App\Http\Controllers\AddressesController;
use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Reader_installationsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

use App\Models\Announcements;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AnnouncementsController::class, 'index'])->name('home');
Route::get('/announcements/{announcement}', [AnnouncementsController::class, 'show']);
Route::get('/about', function () {
    return view('about');
});
Route::get('/contacts', [ContactController::class, 'index']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->name('login')->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('/addresses', [AddressesController::class, 'index'])->middleware('auth');
Route::get('/addresses/create', [AddressesController::class, 'create'])->middleware('auth');
Route::post('/addresses', [AddressesController::class, 'store'])->middleware('auth');
Route::get('/addresses/{address}/edit', [AddressesController::class, 'edit'])->middleware('auth');
Route::get('/addresses/{address}', [AddressesController::class, 'show'])->middleware('auth');
Route::patch('/addresses/{address}', [AddressesController::class, 'update'])->middleware('auth');

Route::get('/readers', [Reader_installationsController::class, 'index'])->middleware('auth');
Route::get('/readers/{reader}', [Reader_installationsController::class, 'show'])->middleware('auth');




