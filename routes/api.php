<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Models\Provider;
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
Route::post('/sair', [AuthController::class, 'logout']);

Route::get('/produtos', [ProductController::class, 'index']);
Route::get('/produto/{id}', [ProductController::class, 'show']);

Route::get('/fornecedores', [Provider::class, 'index']);


Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/produto/cadastrar',[ProductController::class, 'store']);
    Route::put('/produto/atualizar/{id}', [ProductController::class, 'update']);
    Route::delete('/produto/remover/{id}', [ProductController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
