<?php

use App\Http\Api\V1\Modules\Trains\Controllers\TrainController;
use App\Http\Api\V1\Modules\Trips\Controllers\TripController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function() {
    Route::get('/trains', [TrainController::class, 'getTrains']);
    Route::get('/trains/{train_id}', [TrainController::class, 'getTrainById']);
    Route::post('/trains', [TrainController::class, 'addTrain']);
    Route::patch('/trains', [TrainController::class, 'updateTrains']);
    Route::delete('/trains/{train_id}', [TrainController::class, 'deleteTrain']);

    Route::get('/trips', [TripController::class, 'getTrip']);
    Route::get('/trips/{id}', [TripController::class, 'getTripById']);
    Route::post('/trips', [TripController::class, 'addTrip']);
    Route::patch('/trips', [TripController::class, 'updateTrip']);
    Route::delete('/trips/{id}', [TripController::class, 'deleteTrip']);
});