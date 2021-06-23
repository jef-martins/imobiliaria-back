<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\ImovelController;
use App\Http\Controllers\ComodoController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

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

route::prefix('foto')->group(function(){
    route::post('/', [FotoController::class, 'add']);
    route::get('/', [FotoController::class, 'list']);
    route::get('/{id}', [FotoController::class, 'select']);
    route::put('/{id}', [FotoController::class, 'update']);
    route::delete('/{id}', [FotoController::class, 'delete']);
});

route::prefix('imovel')->group(function(){
    route::post('/', [ImovelController::class, 'add']);
    route::get('/ordem/{sort}', [ImovelController::class, 'list']);
    route::get('/{id}', [ImovelController::class, 'select']);
    route::put('/{id}', [ImovelController::class, 'update']);
    route::delete('/{id}', [ImovelController::class, 'delete']);
});

route::prefix('comodo')->group(function(){
    route::post('/', [ComodoController::class, 'add']);
    route::get('/', [ComodoController::class, 'list']);
    route::get('/{id}', [ComodoController::class, 'select']);
    route::put('/{id}', [ComodoController::class, 'update']);
    route::delete('/{id}', [ComodoController::class, 'delete']);
});