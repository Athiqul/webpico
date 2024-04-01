<?php

use App\Http\Controllers\Admin\Contact;
use App\Http\Controllers\Admin\SocialMedia;
use App\Http\Controllers\Admin\Testimonal;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\Home;
use Illuminate\Support\Facades\Route;


//Public image
Route::get('image/{folder}/{image}',[Testimonal::class,'image'])->name('public.image');

Route::get('/',[Home::class,'index'])->name('web.home');

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

    Route::controller(Contact::class)->group(function (){
      Route::get('contact','index')->name('admin.contact');
      Route::post('contact','update');
    });

    Route::controller(SocialMedia::class)->group(function (){
      Route::get('social-media','index')->name('admin.social.list');
      Route::get('social-media/{id}','edit')->name('admin.social.edit');
      Route::post('social-media/{id}','update');
      Route::get('social-media-status-change/{id}','statusChange')->name('admin.social.status');
    });

});

require __DIR__.'/auth.php';
