<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Integrations\WalmartController;
use App\Http\Controllers\Integrations\AmazoneController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\WalmartGetAllTemsController;
use App\Http\Controllers\PaymentController;



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

        Route::get('/dashboard' , [DashboardController::class , 'index'])->middleware(['auth' , 'verified'])->name('dashboard');

        Route::get('/dashboard/product' , [WalmartGetAllTemsController::class , 'index'])->name('dashboard.index');
        Route::post('/dashboard/check' , [WalmartGetAllTemsController::class , 'checkProduct'])->name('dashboard.check');

        Route::prefix('dashboard/')->group(function () {
            Route::get('integration-listening-view/{id}' , [WalmartController::class , 'walmartIntegrationLintingView'])->name('integration-listening-view');
            Route::get('integration-listening-destroy/{id}' , [WalmartController::class , 'walmartListeningDelete'])->name('integration-listening-destroy');
        });

        Route::get('/dashboard/select-marketplace', function () {
            return view('marketplace');
        });

        Route::prefix('dashboard/marketplace/')->group(function () {
        Route::get('walmart' , [WalmartController::class , 'index'])->name('marketplace.walmart');
        Route::post('walmart/add' , [WalmartController::class , 'add'])->name('marketplace.walmart');
        Route::get('emailsend/' , [MailController::class , 'sendEmail'])->name('marketplace.emailsend');
        });

        Route::prefix('dashboard/marketplace/')->group(function () {
        Route::get('amazone' , [AmazoneController::class , 'index'])->name('amazone.walmart');
        });

        Route::get('pay' , [PaymentController::class , 'pay'])->name('pay');
        Route::post('/dopay/online' , [PaymentController::class , 'handleonlinepay'])->name('dopay.online');


});

//********** End of middleware */



require __DIR__.'/auth.php';

