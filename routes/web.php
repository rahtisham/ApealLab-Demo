<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Profile\AdminProfileController;
use App\Http\Controllers\Admin\Walmart\WalmartController;
// use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserRegistrationFornController;


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

// Start middleware

Route::group(['middleware' => 'auth'] , function(){

    Route::get('/dashboard', function () {
        return view('dashboard');
    });
   // Dashboard Route

   Route::prefix('admin')->group(function () {

        Route::prefix('user')->group(function () {
            Route::get('/' , '\App\Http\Controllers\User\UserController@index'); 
            Route::get('/user-registration-form' , '\App\Http\Controllers\User\UserController@create'); 
            Route::post('/store' , '\App\Http\Controllers\User\UserController@store'); 
        });    
        // User Table layout

        Route::get('/profile' , [AdminProfileController::class , 'index'])->name('admin.profile'); 
        // Show profile Layout Route

        Route::get('/walmart' , [WalmartController::class , 'index'])->name('admin.walmart'); 
    //******* Walmart API's Route */ 

   });

  //********** Prefix admin */ 

});

// End of middleware



require __DIR__.'/auth.php';
