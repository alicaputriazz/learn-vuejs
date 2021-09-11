<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Posts\PostController as PostController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('posts')->group(function(){
    Route::post('/create-new-post', [PostController::class, 'store']);
});


