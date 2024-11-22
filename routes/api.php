<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiUserController;

Route::prefix('api')->group(function() {
    Route::get('/users', [ApiUserController::class, 'loadAllUsers']);
    Route::post('/users/addUser', [ApiUserController::class, 'addUser']);
    Route::get('/users/{id}', [ApiUserController::class, 'loadUser']);
    Route::put('/users/{id}', [ApiUserController::class, 'editUser']);
    Route::delete('/users/{id}', [ApiUserController::class, 'deleteUser']);
});




