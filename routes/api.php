<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\User;
use App\Http\Controllers\UserController;

use App\Models\Candidate;
use App\Http\Controllers\CandidateController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::GET('/users', [UserController::class, 'index']);
Route::POST('/users', [UserController::class, 'store']);
Route::GET('/users/{user_id}', [UserController::class, 'show'])->name('user');
Route::PUT('/users/{id}', [UserController::class, 'update']);
Route::DELETE('/users/{id}', [UserController::class, 'destroy']);

Route::POST('/login', [UserController::class, 'login'])->name('login');

Route::GET('/candidates', [CandidateController::class, 'index']);
Route::POST('/candidates', [CandidateController::class, 'store']);
Route::GET('/candidates/{id}', [CandidateController::class, 'show'])->name('candidate');
Route::PUT('/candidates/{id}', [CandidateController::class, 'update']);
Route::DELETE('/candidates/{id}', [CandidateController::class, 'destroy']);
