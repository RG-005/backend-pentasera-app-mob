<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DetailOrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ETicketController;
use App\Http\Controllers\CheckinController;


#events
Route::post('/events', [EventController::class, 'store']);
Route::get('/events', [EventController::class, 'index']);
#organizer
Route::post('/organizers', [OrganizerController::class, 'store']);
Route::get('/organizers', [OrganizerController::class, 'index']);
#tickets
Route::post('/tickets', [TicketController::class, 'store']);
Route::get('/tickets', [TicketController::class, 'index']);
#orders
Route::post('/orders', [OrderController::class, 'store']);
Route::get('/orders', [OrderController::class, 'index']);
Route::get('/orders/{id}', [OrderController::class, 'show']);
#users
Route::post('/users', [UserController::class, 'store']);
Route::get('/users', [UserController::class, 'index']);
#detail order
Route::post('/detail-orders', [DetailOrderController::class, 'store']);
Route::get('/detail-orders', [DetailOrderController::class, 'index']);
#payments
Route::post('/payments', [PaymentController::class, 'store']);
Route::get('/payments', [PaymentController::class, 'index']);
#e-ticket
Route::post('/e-tickets', [ETicketController::class, 'store']);
Route::get('/e-tickets', [ETicketController::class, 'index']);


Route::post('/checkins', [CheckinController::class, 'store']);
Route::get('/checkins', [CheckinController::class, 'index']);