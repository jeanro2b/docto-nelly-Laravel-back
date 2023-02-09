<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CalendarHolidaysController extends Controller
{
   
    public function holidays() {
        $holidays = DB::table('holidays')->get();

        return $holidays;
    }

    public function define_holidays(Request $req)
    {

        $holiday = Holiday::create([
            'start' => $req->start,
            'end' => $req->end,
        ]);

        return $holiday; 
    }
}
