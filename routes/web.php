<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Profile\AdminProfileController;
use App\Http\Controllers\Admin\Walmart\WalmartController;
use App\Http\Controllers\User\UserRegistrationFornController;
use App\Http\Controllers\Plan\PlanController;
use App\Http\Controllers\Subscription\SubscriptionController;


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
                Route::any('destroy/{id}' , '\App\Http\Controllers\User\UserController@destroy'); 
            });
            
            Route::prefix('user')->group(function () {
                Route::get('/profile' , [AdminProfileController::class , 'index'])->name('admin.profile'); 
            });
 
            Route::prefix('walmart')->group(function () {
                Route::get('/' , [WalmartController::class , 'index'])->name('admin.walmart'); 
            });

            Route::prefix('plan')->group(function () {
                Route::get('/' , [PlanController::class , 'index'])->name('plan.index'); 
                Route::post('/store' , [PlanController::class , 'store'])->name('plan.store'); 
            });   

    });

  //********** Prefix Admin */ 


    Route::group(['middleware' => 'role:user', 'prefix' => 'user', 'as' => 'user.'], function() {
    
            Route::prefix('profile')->group(function () {
                Route::get('/index' , [AdminProfileController::class , 'index'])->name('admin.profile');
            });

            Route::prefix('subscription/plan')->group(function () {
                Route::get('/' , [SubscriptionController::class , 'index'])->name('subscription.plan.index');
                Route::get('/show/{plan}' , [PlanController::class , 'show'])->name('subscription.plan.show');
                Route::post('/create' , [SubscriptionController::class , 'create'])->name('subscription.plan.create');
            });

    });

  //********** Prefix Users */ 


});

//********** End of middleware */



require __DIR__.'/auth.php';
