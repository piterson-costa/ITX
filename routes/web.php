<?php

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
use \App\Http\Controllers\ProviderController;
use \App\Http\Controllers\EventsController;
use \App\Http\Controllers\Controller;

Auth::routes();

Route::get('/', function () {return view('home');})->middleware('auth');
Route::resource('providers', ProviderController::class)->middleware('auth');
Route::resource('events', EventsController::class)->middleware('auth');

Route::get('/dashboard',[Controller::class, 'dashboard'])->middleware('auth');
Route::get('/receipt',[Controller::class, 'receipt'])->middleware('auth');
Route::post('/getreceipt',[Controller::class, 'getReceipt'])->middleware('auth')->name('receipt.getreceipt');

Route::get('/reports.analytical',[Controller::class, 'analytical'])->middleware('auth');
Route::post('/getreports.analytical',[Controller::class, 'getReportsAnalytical'])->middleware('auth')->name('reports.getreports.analytical');
Route::get('/reports.synthetic',[Controller::class, 'synthetic'])->middleware('auth');
Route::post('/getreports.synthetic',[Controller::class, 'getReportsSynthetic'])->middleware('auth')->name('reports.getreports.synthetic');

Route::group(['prefix' => 'error-pages'], function () {
    Route::get('error-404', function () {
        return view('pages.error-pages.error-404');
    });
});
// 404 for undefined routes
Route::any('/{page?}', function () {
    return View::make('pages.error-pages.error-404');
})->where('page', '.*');
