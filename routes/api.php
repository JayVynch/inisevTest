<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/users/{website}/subscribes',[SubscriptionController::class, 'store']);

Route::post('/{website}/posts/create',[PostController::class,'store']);


