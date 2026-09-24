<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailUploadController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/emails/upload', [EmailUploadController::class, 'showForm'])->name('emails.form');
Route::post('/emails/upload', [EmailUploadController::class, 'upload'])->name('emails.upload');
Route::post('/emails/delete-all', [EmailUploadController::class, 'deleteAll'])->name('emails.deleteAll');
