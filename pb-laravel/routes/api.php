<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Modules\User\Controllers\UserController;
use App\Modules\JobPosting\Controllers\JobPostingController;
use App\Modules\Candidate\Controllers\CandidateController;
use App\Modules\Applications\Controllers\ApplicationController;
use App\Modules\Auth\Controllers\AuthController;

Route::prefix('users')->group(function () {
    Route::get('{id}', [UserController::class, 'findbyId']);
    Route::middleware('auth:sanctum')->post('/', [UserController::class, 'create']);
    Route::put('{id}', [UserController::class, 'update']);
    Route::delete('{id}', [UserController::class, 'delete']);
});

Route::prefix('job-postings')->group(function () {
    Route::get('{id}', [JobPostingController::class, 'findbyId']);
    Route::post('/', [JobPostingController::class, 'create']);
    Route::put('{id}', [JobPostingController::class, 'update']);
    Route::delete('{id}', [JobPostingController::class, 'delete']);
});

Route::prefix('candidates')->group(function () {
    Route::get('{id}', [CandidateController::class, 'findbyId']);
    Route::post('/', [CandidateController::class, 'create']);
    Route::put('{id}', [CandidateController::class, 'update']);
    Route::delete('{id}', [CandidateController::class, 'delete']);
});

Route::post('/apply', [ApplicationController::class, 'apply']);

Route::post('/auth/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
