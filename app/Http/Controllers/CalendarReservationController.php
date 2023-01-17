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

    public function get_reservations($day)
    {
        $reservations = DB::table('reservations')
        ->select('start', 'end')
        ->where('day', $day)
        ->get();

        return $reservations;
    }

    public function get_user_reservations($id)
    {
        $reservations = DB::table('reservations')
        ->select('start', 'end', 'day', 'id')
        ->where('user_id', $id)
        ->orderBy('day', 'asc')
        ->get();

        return $reservations;
    }

    public function get_all_reservations()
    {
        $reservations = DB::table('reservations')
        ->join('users', 'user_id', '=', 'users.id')
        ->select('reservations.id', 'day', 'start', 'end', 'users.name', 'users.email', 'users.phone')
        ->orderBy('day', 'asc')
        ->get();

        return $reservations;
    }


}
