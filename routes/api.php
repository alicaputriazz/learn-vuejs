<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Notes\NoteController as NoteController;
use App\Http\Controllers\Notes\SubjectController as SubjectController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('notes')->group(function(){
    Route::post('/create-new-note', [NoteController::class, 'store']);
});

Route::prefix('subjects')->group(function(){
    Route::get('/', [SubjectController::class, 'index']);
});

