<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

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


// API routes
Route::get("list-blog", [ApiController::class, "listBlog"]);
Route::get("single-blog/{id}", [ApiController::class, "getSingleBlog"]);
Route::post("add-blog", [ApiController::class, "CreateBlog"]);
Route::put("update-blog/{id}", [ApiController::class, "updateBlog"]);
Route::delete("delete-blog/{id}", [ApiController::class, "deleteBlog"]);