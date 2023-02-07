<?php

use Illuminate\Support\Facades\Route;



Route::view('tools/ipv4-calculator','tools.ipv4');
Route::get('tools',[\App\Http\Controllers\SiteController::class,'tools']);
Route::get('/',[\App\Http\Controllers\SiteController::class,'index']);
Route::get('modules/{module}/{lesson?}',[\App\Http\Controllers\SiteController::class,'lesson']);
Route::get('module/{module}',[\App\Http\Controllers\SiteController::class,'module']);
Route::get('books',[\App\Http\Controllers\BookController::class,'books']);
Route::get('modules',[\App\Http\Controllers\SiteController::class,'modules']);
//  Route::get('modules/{title}/{lesson}',[\App\Http\Controllers\SiteController::class,'lesson']);
Route::post('/tmp-upload',[\App\Http\Controllers\FileController::class,'uploadMultiple']);
Route::delete('/tmp-remove',[\App\Http\Controllers\FileController::class,'delete']);
Auth::routes();
Route::post('ckupload',[\App\Http\Controllers\LessonController::class,'uploadImage'])->name('ckeditor.uploadImage');

Route::prefix('admin')->group(function () {

    Route::get('profile',[\App\Http\Controllers\UserController::class,'profile'])->name('admin/profile');
    Route::post('updateProfile',[\App\Http\Controllers\UserController::class,'updateProfile'])->name('updateProfile');
    Route::post('updatePassword',[\App\Http\Controllers\UserController::class,'updatePassword'])->name('updatePassword');
    Route::patch('updateImage',[\App\Http\Controllers\UserController::class,'updateImage'])->name('updateImage');
    Route::resource('users',\App\Http\Controllers\UserController::class);
    Route::resource('semesters',\App\Http\Controllers\SemesterController::class);
    Route::resource('modules',\App\Http\Controllers\ModuleController::class);
    Route::resource('lessons',\App\Http\Controllers\LessonController::class);
    Route::post('lessons/upload',[\App\Http\Controllers\LessonController::class,'upload'])->name('lessons.upload');
    Route::resource('exercices',\App\Http\Controllers\ExerciceController::class);
    Route::resource('books',\App\Http\Controllers\BookController::class);

})->middleware(['auth']);
