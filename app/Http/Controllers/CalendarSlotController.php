<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalendarslotController extends Controller
{
    public function get_reservations($day)
    {
        $reservations = DB::table('reservations')->where('day', $day)->get();

        return $reservations;
    }

    public function define_slots($req)
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
