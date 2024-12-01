<?php
use App\Http\Controllers\CategoriaController as CC;
use App\Http\Controllers\ProductoController as PC;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('categorias')->group(function () {
    Route::get('/', [CC::class, 'index']);
    Route::get('/{id}', [CC::class, 'show']);
    Route::post('/', [CC::class, 'store']);
    Route::put('/{id}', [CC::class, 'update']);
});

Route::prefix('productos')->group(function () {
    Route::get('/', [PC::class, 'index']);
    Route::get('/{id}', [PC::class, 'show']);
    Route::post('/', [PC::class, 'store']);
    Route::put('/{id}', [PC::class, 'update']);
    Route::delete('/{id}', [PC::class, 'destroy']);
});
