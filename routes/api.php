<?php


use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\MessageController;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
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

Route::get('home', [ProjectController::class, 'home']);

Route::get('projects', [ProjectController::class, 'index']);

Route::get('projects/{slug}', [ProjectController::class, 'show']);

Route::post('messages/store', [MessageController::class, 'store']);