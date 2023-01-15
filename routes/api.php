<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarSlotController;
use App\Http\Controllers\CalendarHolidaysController;
use App\Http\Controllers\CalendarReservationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('calendar/{day}', [CalendarReservationController::class, 'get_reservations'])
                ->name('get_reservations');

Route::get('calendar-all', [CalendarReservationController::class, 'get_all_reservations'])
                ->middleware('admin')
                ->name('get_reservations');

Route::get('calendar/user/{id}', [CalendarReservationController::class, 'get_user_reservations'])
                ->middleware('auth')
                ->name('get_reservations');

Route::get('calendar/slots/{day}', [CalendarSlotController::class, 'get_slots'])
                ->name('get_slots');

Route::get('conges', [CalendarHolidaysController::class, 'holidays'])
                ->name('holidays');


Route::post('/define-slots', [CalendarSlotController::class, 'define_slots'])
                ->middleware('admin')
                ->name('define_slots');

Route::post('define-holidays', [CalendarHolidaysController::class, 'define_holidays'])
                ->middleware('admin')
                ->name('define_holidays');

Route::post('reservation', [CalendarReservationController::class, 'post_reservation'])
                ->middleware('auth')
                ->name('post_reservation');

Route::delete('delete-reservation/{id}', [CalendarReservationController::class, 'delete_reservation'])
                ->middleware('auth')
                ->name('delete_reservation');