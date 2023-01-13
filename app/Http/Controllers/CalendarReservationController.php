<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Holiday;
use App\Models\Reservation;

class CalendarReservationController extends Controller
{
    public function define_holidays($req)
    {
        $holiday = new Reservation();

       
        $data=

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
