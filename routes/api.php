<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\StatusController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ChannelController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PriorityController;
use App\Http\Controllers\Api\AuthController;


use App\Models\Priority;

// Route::apiResource('/tickets', App\Http\Controllers\Api\TicketController::class);''

Route::post('/login',[AuthController::class,'login']);
Route::middleware('auth:sanctum')->group(function() {
    Route::get("/ok", function(){
    return "test";
    });
    Route::post('/logout',[AuthController::class,'logout']);
    Route::post('/refresh',[AuthController::class,'refresh']);

});

Route::get('/get-open-tickets', [TicketController::class, 'ticketOpen']);
Route::get('/get-closed-tickets', [TicketController::class, 'ticketClosed']);
Route::get('/get-show-detail-tickets/{id}', [TicketController::class, 'showTicketDetail']);
Route::post('/createtickets', [TicketController::class, 'store']);
Route::post('/updatetickets/{id}', [TicketController::class, 'update']);



Route::get('/get-status', [StatusController::class, 'getStatus']);

Route::get('/get-users', [UserController::class, 'getUser']);

Route::get('/get-channels', [ChannelController::class, 'getChannel']);

Route::get('/get-categorys', [CategoryController::class, 'getCategory']);

Route::get('/get-prioritys', [PriorityController::class, 'getPriority']);



// Route::middleware('auth:sanctum')->group(function() {
    
// });


