<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Holiday;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CalendarReservationController extends Controller
{
    public function post_reservation(Request $req)
    {
        Log::debug($req);

        $reservation = Reservation::create([
            'start' => $req->start,
            'end' => $req->end,
            'day' => $req->day,
            'user_id' => auth()->user()->id,
            'slot_id' => $req->slot_id
        ]);

        Log::debug($reservation);

        return $reservation;
         
    }

    public function delete_reservation($id)
    {
        $reservations = DB::table('reservations')
        ->where('id', $id)
        ->delete();
        return $reservations;
    }
}
