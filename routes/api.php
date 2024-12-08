<?php

use App\Http\Controllers\API\BookController;

Route::apiResource('books', BookController::class);
