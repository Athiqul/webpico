<?php

use App\Http\Controllers\Admin\ServicesCategoryController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\ServicesSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('services-categories',[ServicesCategoryController::class,'index'])->name('services_categories.api');
Route::post('services-categories-add',[ServicesCategoryController::class,'store'])->name('services_categories.store.api');
Route::get('services-categories-update/{id}',[ServicesCategoryController::class,'edit'])->name('services_categories.update.api');
Route::post('services-categories-update/{id}',[ServicesCategoryController::class,'update']);

Route::get('services-sub-categories',[ServicesSubCategory::class,'index'])->name('services_sub_categories.api');
Route::post('services-sub-categories-add',[ServicesSubCategory::class,'store'])->name('services_sub_categories.store.api');
Route::get('services-sub-categories-update/{id}',[ServicesSubCategory::class,'edit'])->name('services_sub_categories.update.api');
Route::post('services-sub-categories-update/{id}',[ServicesSubCategory::class,'update']);
Route::get('category-wise-subcategory/{id}',[ServicesController::class,'categoryWiseSub'])->name('category_wise_sub_categories.api');
