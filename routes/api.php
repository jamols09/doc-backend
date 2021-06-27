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
        
        Route::get('{patient}/history/diagnoses', [PatientController::class, 'patientsDiagnoses'])->name('patient.history.diagnoses');
        Route::get('{patient}/history/symptoms', [PatientController::class, 'patientsSymptoms'])->name('patient.history.symptoms');
        Route::get('{patient}/history/files', [PatientController::class, 'patientFiles'])->name('patient.files');

        Route::prefix('history')->group(function () {
            Route::post('/', [HistoryController::class, 'store'])->name('history.store');
            Route::post('/file', [HistoryController::class, 'file'])->name('history.file');

            Route::prefix('symptoms')->group(function () {
                Route::post('/', [SymptomsController::class, 'store'])->name('symptoms.store');
                Route::get('/', [SymptomsController::class, 'dropdown'])->name('patient.symptoms.dropdown');
            });
            
            Route::prefix('diagnoses')->group(function () {
                Route::post('/', [DiagnosisController::class, 'store'])->name('diagnosis.store');
                Route::get('/', [DiagnosisController::class, 'dropdown'])->name('patient.diagnoses.dropdown');
            });
        });
    });

    Route::prefix('address')->group(function () {
        Route::get('{patient}', [AddressController::class, 'show'])->name('address.show');
    });
});
