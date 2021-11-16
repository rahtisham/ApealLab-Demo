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


    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {

            Route::prefix('user')->group(function () {
                Route::get('/' , '\App\Http\Controllers\User\UserController@index'); 
                Route::get('/user-registration-form' , '\App\Http\Controllers\User\UserController@create'); 
                Route::post('/store' , '\App\Http\Controllers\User\UserController@store'); 
                Route::get('edit/{id}' , '\App\Http\Controllers\User\UserController@edit'); 
                Route::post('update/{id}' , '\App\Http\Controllers\User\UserController@update'); 
                Route::post('destroy/{id}' , '\App\Http\Controllers\User\UserController@destroy'); 
            });
            
            Route::prefix('user')->group(function () {
                Route::get('/profile' , [AdminProfileController::class , 'index'])->name('admin.profile'); 
            });

            Route::prefix('walmart')->group(function () {
                Route::get('/' , [WalmartController::class , 'index'])->name('admin.walmart'); 
            });   

    });

  //********** Prefix Admin */ 


    Route::group(['middleware' => 'role:user', 'prefix' => 'user', 'as' => 'user.'], function() {
    
            // Route::prefix('profile')->group(function () {
            //     Route::get('/' , [AdminProfileController::class , 'index'])->name('admin.profile');
            // });

    });

  //********** Prefix Users */ 


});

//********** End of middleware */



require __DIR__.'/auth.php';
