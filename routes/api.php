<?php

use App\Http\Controllers\Admin\ServicesCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('services-categories',[ServicesCategoryController::class,'index'])->name('services_categories.api');
Route::post('services-categories-add',[ServicesCategoryController::class,'store'])->name('services_categories.store.api');
