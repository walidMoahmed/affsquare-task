<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    RoleController,
    UserController,
    TableController,
    ReservationController
};

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
    return redirect('login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('/role')->group(function () {
        Route::get('/create', [RoleController::class, 'create']);
        Route::post('/store', [RoleController::class, 'store']);
        Route::get('/edit/{id}', [RoleController::class, 'edit']);
        Route::post('/update/{id}', [RoleController::class, 'update']);
        Route::get('/index', [RoleController::class, 'index']);
        Route::get('/show/{id}', [RoleController::class, 'show']);
        Route::get('/destroy/{id}', [RoleController::class, 'destroy']);
    });

    Route::prefix('/user')->group(function () {
        Route::get('/create', [UserController::class, 'create']);
        Route::post('/store', [UserController::class, 'store']);
        Route::get('/edit/{id}', [UserController::class, 'edit']);
        Route::post('/update/{id}', [UserController::class, 'update']);
        Route::get('/index', [UserController::class, 'index']);
        Route::get('/show/{id}', [UserController::class, 'show']);
        Route::get('/destroy/{id}', [UserController::class, 'destroy']);
    });

    Route::prefix('/table')->group(function () {
        Route::get('/create', [TableController::class, 'create']);
        Route::post('/store', [TableController::class, 'store']);
        Route::get('/edit/{id}', [TableController::class, 'edit']);
        Route::post('/update/{id}', [TableController::class, 'update']);
        Route::get('/index', [TableController::class, 'index']);
        Route::get('/destroy/{id}', [TableController::class, 'destroy']);
    });

    Route::prefix('/reservation')->group(function () {
        Route::get('/create', [ReservationController::class, 'create']);
        Route::get('/create-second-page', [ReservationController::class, 'create_second_page']);
        Route::post('/store', [ReservationController::class, 'store']);

        Route::get('/index' , [ReservationController::class, 'index']);
        Route::post('/index', [ReservationController::class, 'filter']);


        Route::get('/edit/{id}', [ReservationController::class, 'edit']);
        Route::post('/update/{id}', [ReservationController::class, 'update']);
        Route::get('/destroy/{id}', [ReservationController::class, 'destroy']);
    });
});
