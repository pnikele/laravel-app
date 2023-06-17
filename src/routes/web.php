<?php

use App\Http\Controllers\AddressesController;
use App\Http\Controllers\AdminReadersController;
use App\Http\Controllers\AdminReaders_installationsController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Reader_installationsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminAddressesController;

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

Route::group(['middleware'=>'guest'],function(){
    Route::get('register', [RegisterController::class, 'create']);
    Route::post('register', [RegisterController::class, 'store']);
    Route::get('login', [SessionsController::class, 'create'])->name('login');
    Route::post('login', [SessionsController::class, 'store']);
});

Route::group(['middleware'=>'auth'],function(){
    Route::post('logout', [SessionsController::class, 'destroy']);
    Route::get('/addresses', [AddressesController::class, 'index']);
    Route::get('/addresses/create', [AddressesController::class, 'create']);
    Route::post('/addresses', [AddressesController::class, 'store']);
    Route::get('/addresses/{address}/edit', [AddressesController::class, 'edit']);
    Route::get('/addresses/{address}', [AddressesController::class, 'show']);
    Route::patch('/addresses/{address}', [AddressesController::class, 'update']);
    Route::get('/readers', [Reader_installationsController::class, 'index']);
    Route::get('/readers/{reader}', [Reader_installationsController::class, 'show']);
});

Route::middleware('can:admin')->group(function () {
    Route::get('admin/addresses', [AdminAddressesController::class, 'index']);
    Route::get('admin/addresses/create', [AdminAddressesController::class, 'create']);
    Route::post('admin/addresses', [AdminAddressesController::class, 'store']);
    Route::get('admin/addresses/{address}', [AdminAddressesController::class, 'show']);
    Route::get('admin/addresses/{address}/edit', [AdminAddressesController::class, 'edit']);
    Route::patch('admin/addresses/{address}', [AdminAddressesController::class, 'update']);

    Route::get('admin/users', [AdminUsersController::class, 'index']);
    Route::get('admin/users/create', [AdminUsersController::class, 'create']);
    Route::get('admin/users/{user}', [AdminUsersController::class, 'show']);
    Route::get('admin/users/{user}/edit', [AdminUsersController::class, 'edit']);
    Route::patch('admin/users/{user}', [AdminUsersController::class, 'update']);

    Route::get('admin/readers', [AdminReadersController::class, 'index']);
    Route::get('admin/readers/create', [AdminReadersController::class, 'create']);
    Route::post('admin/readers', [AdminReadersController::class, 'store']);
    Route::get('admin/readers/{reader}', [AdminReadersController::class, 'show']);
    Route::get('admin/readers/{reader}/edit', [AdminReadersController::class, 'edit']);
    Route::patch('admin/readers/{reader}', [AdminReadersController::class, 'update']);

    Route::get('admin/reader_installations', [AdminReaders_installationsController::class, 'index']);
    Route::get('admin/reader_installations/create', [AdminReaders_installationsController::class, 'create']);
    Route::post('admin/reader_installations', [AdminReaders_installationsController::class, 'store']);
    Route::get('admin/reader_installations/{readers_installation}', [AdminReaders_installationsController::class, 'show']);
    Route::get('admin/reader_installations/{readers_installation}/edit', [AdminReaders_installationsController::class, 'edit']);
    Route::patch('admin/reader_installations/{readers_installation}', [AdminReaders_installationsController::class, 'update']);


});






