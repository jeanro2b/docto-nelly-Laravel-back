<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $slot = new Slot();

        $slot->firstStartMorning = $req->firstStartMorning;
        $slot->firstEndMorning = $req->firstEndMorning;
        $slot->secondStartMorning = $req->secondStartMorning;
        $slot->secondEndMorning = $req->secondEndMorning;
        $slot->thirdStartMorning = $req->thirdStartMorning;
        $slot->thirdEndMorning = $req->thirdEndMorning;
        $slot->firstStartEvening = $req->firstStartEvening;
        $slot->firstEndEvening = $req->firstEndEvening;
        $slot->secondStartEvening = $req->secondStartEvening;
        $slot->secondEndEvening = $req->secondEndEvening;
        $slot->thirdStartEvening = $req->thirdStartEvening;
        $slot->thirdEndEvening = $req->thirdEndEvening;

        $data=DB::insert('insert into slots (firstStartMorning, firstEndMorning, secondStartMorning, secondEndMorning, 
        thirdStartMorning, thirdEndMorning, firstStartEvening, firstEndEvening,
        secondStartEvening, secondEndEvening, thirdStartEvening, thirdEndEvening) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $slot->firstStartMorning,
            $slot->firstEndMorning,
            $slot->secondStartMorning,
            $slot->secondEndMorning,
            $slot->thirdStartMorning,
            $slot->thirdEndMorning,
            $slot->firstStartEvening,
            $slot->firstEndEvening,
            $slot->secondStartEvening,
            $slot->secondEndEvening,
            $slot->thirdStartEvening,
            $slot->thirdEndEvening
    
        ]);


        if(!$data) {
            return response()->json([
                'status'=>400,
                'error'=> 'Something went wrong'
            ]);
        }
        else {
            return response()->json([
                'status'=>200,
                'error'=> 'Data succesfully saved'
            ]);
        }
         
    }
}