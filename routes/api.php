<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum'])->group(function() {

    Route::name('user-profile')
    ->get('/v1/user', function (Request $request) {
        return $request->user();
    });

    Route::name('token-create')
    ->post('/v1/token/create', function (Request $request) {
        $token = $request->user()->createToken($request->token_name ?? 'general');

        return ['token' => $token->plainTextToken];
    });
});
