<?php

use App\Http\Controllers\Admin\Contact;
use App\Http\Controllers\Admin\ServicesCategoryController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\ServicesSubCategory;
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
        Route::get('social-media-add','add')->name('admin.social.add');
        Route::post('social-media-add','store');
      Route::get('social-media','index')->name('admin.social.list');
      Route::get('social-media/{id}','edit')->name('admin.social.edit');
      Route::put('social-media/{id}','update');
      Route::get('social-media-status-change/{id}','statusChange')->name('admin.social.status');
    });

///Services category controller
    Route::get('services-category',[ServicesCategoryController::class,'showServiceCategoryPage'])->name('admin.service.category');

//Services Sub Category
    Route::get('services-sub-category',[ServicesSubCategory::class,'showServiceSubCategoryPage'])->name('admin.service.subcategory');

    //Service
    Route::controller(ServicesController::class)->group(function(){
        Route::get('service-add','add')->name('admin.service.add');
        Route::post('service-add','create');
        Route::get('service-list','index')->name('admin.service.index');
        Route::get('service/{id}','edit')->name('admin.service.edit');
        Route::put('service/{id}','update');
        Route::get('service-status-change/{id}','statusChange')->name('admin.service.status');
        route::get('service-delete/{id}','destroy')->name('admin.service.delete');
    });

});

require __DIR__.'/auth.php';
