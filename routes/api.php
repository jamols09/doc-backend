<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\SymptomsController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\DiagnosisController;
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
        Route::post('/', [PatientController::class, 'store'])->name('patient.store');
        Route::post('/avatar', [PatientController::class, 'avatar'])->name('patient.avatar');
        // Route::get('address/{patient}', [PatientController::class, 'address'])->name('patient.address');
        Route::prefix('history')->group(function () {
            Route::post('/', [HistoryController::class, 'store'])->name('history.store');
            
            Route::prefix('symptoms')->group(function () {
                Route::post('/', [SymptomsController::class, 'store'])->name('symptoms.store');
                Route::get('/dropdown', [SymptomsController::class, 'dropdown'])->name('symptoms.dropdown');
            });
            
            Route::prefix('diagnoses')->group(function () {
                Route::post('/', [DiagnosisController::class, 'store'])->name('diagnosis.store');
                Route::get('/dropdown', [DiagnosisController::class, 'dropdown'])->name('diagnosis.dropdown');
            });
        });
    });

    Route::prefix('address')->group(function () {
        Route::get('{patient}', [AddressController::class, 'show'])->name('address.show');
    });
});
