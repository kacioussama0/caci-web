<?php

use Illuminate\Support\Facades\Route;





Route::get('/',[\App\Http\Controllers\SiteController::class,'index']);
Route::get('modules/{title}',[\App\Http\Controllers\SiteController::class,'module']);
Route::get('modules/{title}/{lesson}',[\App\Http\Controllers\SiteController::class,'lesson']);
Route::post('/uploadAttachment',[\App\Http\Controllers\FileController::class,'uploadMultiple']);
Auth::routes();



Route::prefix('admin')->group(function () {
    Route::get('profile',[\App\Http\Controllers\UserController::class,'profile'])->name('admin/profile');
    Route::post('updateProfile',[\App\Http\Controllers\UserController::class,'updateProfile'])->name('updateProfile');
    Route::post('updatePassword',[\App\Http\Controllers\UserController::class,'updatePassword'])->name('updatePassword');
    Route::patch('updateImage',[\App\Http\Controllers\UserController::class,'updateImage'])->name('updateImage');
    Route::resource('users',\App\Http\Controllers\UserController::class);
    Route::resource('semesters',\App\Http\Controllers\SemesterController::class);
    Route::resource('modules',\App\Http\Controllers\ModuleController::class);
    Route::resource('lessons',\App\Http\Controllers\LessonController::class);
    Route::resource('exercices',\App\Http\Controllers\ExerciceController::class);
})->middleware(['auth']);
