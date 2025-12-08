<?php

use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/our-story', [PageController::class, 'ourStory'])->name('our-story');
Route::get('/careers', [PageController::class, 'careers'])->name('careers');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');


Route::post('sendContact', [MailController::class, 'sendContact'])->name('sendContact');
Route::post('sendCareer', [MailController::class, 'sendCareer'])->name('sendCareer');
