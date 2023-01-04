<?php

use Illuminate\Support\Facades\Route;





Route::get('/',[\App\Http\Controllers\SiteController::class,'index']);
Route::get('modules/{title}',[\App\Http\Controllers\SiteController::class,'module']);
Route::get('modules/{title}/{lesson}',[\App\Http\Controllers\SiteController::class,'lesson']);

Auth::routes();



Route::prefix('admin')->group(function () {
    Route::view('profile','admin.profile');
    Route::resource('semesters',\App\Http\Controllers\SemesterController::class);
    Route::resource('modules',\App\Http\Controllers\ModuleController::class);
    Route::resource('lessons',\App\Http\Controllers\LessonController::class);
})->middleware(['auth']);
