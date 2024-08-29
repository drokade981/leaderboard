<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaderBoardController;

Route::get('/', [LeaderBoardController::class, 'index']);


