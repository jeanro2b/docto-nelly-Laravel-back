<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CalendarSlotController extends Controller
{
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

    public function get_slots($day)
    {
        $slots = DB::table('slots')
        ->select('firstStartMorning', 'firstEndMorning', 'secondStartMorning', 'secondEndMorning', 
        'thirdStartMorning', 'thirdEndMorning', 'firstStartEvening', 'firstEndEvening',
        'secondStartEvening', 'secondEndEvening', 'thirdStartEvening', 'thirdEndEvening')
        ->where('id', $day)
        ->get();

        return $slots;
    }

    public function define_slots(Request $req)
    {
        Log::debug($req);

        $slot = Slot::updateOrCreate([
            'id' => $req->id,
        ],
        [
            'firstStartMorning' => $req->firstStartMorning,
            'firstEndMorning' => $req->firstEndMorning,
            'secondStartMorning' => $req->secondStartMorning,
            'secondEndMorning' => $req->secondEndMorning,
            'thirdStartMorning' => $req->thirdStartMorning,
            'thirdEndMorning' => $req->thirdEndMorning,
            'firstStartEvening' => $req->firstStartEvening,
            'firstEndEvening' => $req->firstEndEvening,
            'secondStartEvening' => $req->secondStartEvening,
            'secondEndEvening' => $req->secondEndEvening,
            'thirdStartEvening' => $req->thirdStartEvening,
            'thirdEndEvening' => $req->thirdEndEvening,
        ]);

        return $slot;
         
    }
}