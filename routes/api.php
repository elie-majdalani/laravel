<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::get('/palindrome/{request?}', [TestController::class, 'palindrome'])->name("palindrome");
Route::get('/seconds', [TestController::class, 'seconds'])->name("seconds");
Route::get('/text', [TestController::class, 'text'])->name("text");
Route::get('/beer', [TestController::class, 'beer'])->name("beer");
Route::get('/teams', [TestController::class, 'teams'])->name("teams");
Route::get('/nominee', [TestController::class, 'nominee'])->name("nominee");
