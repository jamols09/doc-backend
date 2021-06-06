<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AddressController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::domain('api.'.config('app.url'))->group(function () { //http://api.docmaglana.test <-- appended (api)
    //Authentication Required
    Route::middleware('auth:sanctum')->group(function () {
        
    });

    Route::prefix('patient')->group(function () {
        Route::get('/', [PatientController::class, 'index'])->name('patient.index');
        Route::post('store', [PatientController::class, 'store'])->name('patient.store');
        // Route::get('address/{patient}', [PatientController::class, 'address'])->name('patient.address');
    });

    Route::prefix('address')->group(function () {
        Route::get('{patient}', [AddressController::class, 'show'])->name('address.show');
    });

    // Route::post('register', [AuthController::class, 'register'])->name('register');
});
