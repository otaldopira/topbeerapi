<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
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

Route::post('/usuario/cadastro', [AuthController::class, 'register']);
Route::post('/entrar', [AuthController::class, 'login']);

Route::get('/produtos', [ProductController::class, 'index']);
Route::get('/produto/{id}', [ProductController::class, 'show']);

Route::get('/fornecedores', [ProviderController::class, 'index']);
Route::get('/fornecedor/{id}', [ProviderController::class, 'show']);

Route::get('/enderecos', [AddressController::class, 'index']);
Route::get('/endereco/{id}', [AddressController::class, 'show']);


Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/produto/cadastrar',[ProductController::class, 'store']);
    Route::put('/produto/atualizar/{id}', [ProductController::class, 'update']);
    Route::delete('/produto/remover/{id}', [ProductController::class, 'destroy']);
    
    Route::post('/fornecedor/cadastrar',[ProviderController::class, 'store']);
    Route::put('/fornecedor/atualizar/{id}', [ProviderController::class, 'update']);
    Route::delete('/fornecedor/remover/{id}', [ProviderController::class, 'destroy']);

    Route::post('/endereco/cadastrar',[AddressController::class, 'store']);
    Route::put('/endereco/atualizar/{id}', [AddressController::class, 'update']);
    Route::delete('/endereco/remover/{id}', [AddressController::class, 'destroy']);

    Route::post('/sair', [AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
