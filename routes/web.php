<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\FrontViewController;
use App\Http\Controllers\Web\ReservationController;

Route::get('/',[FrontViewController::class,'home'])->name('home');
Route::get('/rooms',[FrontViewController::class,'rooms'])->name('room');
Route::get('/meeting-event',[FrontViewController::class,'meetingsEvents'])->name('meeting-event');
Route::get('/restaurant',[FrontViewController::class,'restaurant'])->name('restaurant');;
Route::get('/reservation',[FrontViewController::class,'reservation'])->name('reservation');
Route::post('/reservation-check', [ReservationController::class, 'reservationCheck'])->name('reservationCheck');
Route::get('/specialOffer',[FrontViewController::class,'specialOffer'])->name('specialOffer');
Route::get('/gallery',[FrontViewController::class,'gallery'])->name('gallery');;
Route::get('/contact',[FrontViewController::class,'contact'])->name('contact');
Route::get('/slide',[FrontViewController::class,'slide'])->name('slide');

// Send reservation mail //
Route::post('/reservation',[ReservationController::class,'reservationMail'])->name('reservationMail');
Route::post('/send-reservation-mail',[ReservationController::class,'reservationMail'])->name('send-mail');
Route::post('/send-contact-mail',[ReservationController::class,'contactMail'])->name('sendContactMail');
