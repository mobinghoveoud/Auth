<?php

use App\Http\Controllers\AdminHomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get( '/', function () {
    return view( 'welcome' );
} );

Auth::routes();

Route::get( '/home', [ App\Http\Controllers\HomeController::class, 'index' ] )->name( 'home' );

Route::get( '/not-approved', [ App\Http\Controllers\HomeController::class, 'notApproved' ] )
    ->name( 'not_approved' );

Route::middleware( [ 'auth', 'approve' ] )->prefix( '/profile' )->name( 'profile.' )->group( function () {
    Route::get( '/update-profile', [ App\Http\Controllers\ProfileController::class, 'showUpdateProfileForm' ] )
        ->name( 'update' );

    Route::put( '/update-profile', [ App\Http\Controllers\ProfileController::class, 'updateProfile' ] )
        ->name( 'update' );
} );


Route::middleware( [ 'admin', 'auth' ] )->
prefix( '/admin' )->name( 'admin.' )
    ->group( function () {
        Route::get( '/home', [ AdminHomeController::class, 'index' ] )->name( 'home' );

        Route::get( '/users', [ AdminHomeController::class, 'users' ] )->name( 'users' );

        Route::get( '/users/approve/{id}', [ AdminHomeController::class, 'userApprove' ] )->name( 'user.approve' );
        Route::delete( '/users/delete/{id}', [ AdminHomeController::class, 'userDelete' ] )->name( 'user.delete' );
    } );
