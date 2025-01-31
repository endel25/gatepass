<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\GatepassController;

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

// Route::get('/hello',function(){
//     return['message'=>'hello'];
// });


// Route::get('/products-api', function () {

//     return Product::all();

// });
Route::post('/vehicleweight',[App\Http\Controllers\GatepassController::class, 'VehicleweightAPI']);

Route::post('/gatepassweighmast',[App\Http\Controllers\GatepassController::class, 'weighmastAPI']);

Route::post('/updategateweighmast',[App\Http\Controllers\GatepassController::class, 'update_weighmastAPI']);


// Route::post('/Transaction-gatepass',[App\Http\Controllers\GatepassController::class, 'TransactionAPI']);

