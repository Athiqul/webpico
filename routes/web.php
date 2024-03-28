<?php

use App\Http\Controllers\Admin\Testimonal;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


//Public image
Route::get('image/{folder}/{image}',[Testimonal::class,'image'])->name('public.image');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::controller(Testimonal::class)->group(function () {
        Route::get('add-testimonial','add')->name('admin.testimonial.add');
        Route::post('add-testimonial','store');
        Route::get('edit-testimonial/{id}','edit')->name('admin.testimonial.edit');
        Route::put('edit-testimonial/{id}','update');
        Route::get('testimonal-status-change/{id}','statusChange')->name('admin.testimonial.status');
        Route::get('testimonal-list','index')->name('admin.testimonial.list');

    });

});

require __DIR__.'/auth.php';
