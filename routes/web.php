<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CleanerController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SendEmailController;

Route::get('send-email', [SendEmailController::class, 'index']);

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
Route::get('carHome', function () {
    return view('homepage/carhome');
});
// Route::get('MakeAppointment', function () {
//     return view('appointment/makeappointment');
// });
// Route::get('/carHome', [App\Http\Controllers\HomeController::class, 'carHome'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('cleaner', CleanerController::class);
    Route::resource('vehicles', VehicleController::class);
    Route::resource('appointments', AppointmentController::class);
    Route::resource('payment', PaymentController::class);
    Route::resource('service', ServiceController::class);
    // Route::resource('MakeAppointment', AppointmentController::class);
});
