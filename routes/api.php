<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ProfileController;
use App\Http\Controllers\Api\V1\SpaceController;
use App\Http\Controllers\Api\V1\SpaceRequestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1/auth')->group(function () {
    Route::post('/send-code', [AuthController::class, 'sendCode'])
        ->middleware('throttle:5,1'); // 5 requests per minute

    Route::post('/verify-code', [AuthController::class, 'verifyCode'])
        ->middleware('throttle:5,1');
});

Route::get('v1/spaces', [SpaceController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('v1/spaces', [SpaceController::class, 'store']);
    Route::put('v1/spaces/{space}', [SpaceController::class, 'update']);
    Route::delete('v1/spaces/{space}/images/{image}', [SpaceController::class, 'deleteImage']);
    Route::post('v1/spaces/{space}/images', [SpaceController::class, 'addImages']);
    Route::get('v1/my-spaces', [SpaceController::class, 'mySpaces']);
    Route::put('v1/profile', [ProfileController::class, 'update']);
    Route::delete('v1/account', [ProfileController::class, 'destroy']);
    Route::post('v1/space-requests', [SpaceRequestController::class, 'store']);
    Route::get('v1/space-requests/mine', [SpaceRequestController::class, 'myRequests']);
    Route::get('v1/space-requests/incoming', [SpaceRequestController::class, 'incomingRequests']);
    Route::put('v1/space-requests/{spaceRequest}/status', [SpaceRequestController::class, 'updateStatus']);
});
