<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CalendarHolidaysController extends Controller
{
   
    public function holidays() {
        // $holidays = DB::table('holidays')->get();

        return 'hello World';
    }

    public function define_holidays(Request $req)
    {
        $holiday = new Holiday();

        $holiday->start = $req->start;
        $holiday->end = $req->end;

        $data=DB::insert('insert into holidays (start, end) values (?, ?)', [$holiday->start, $holiday->end]);

;
        if(!$data) {
            return response()->json([
                'status'=>400,
                'error'=> 'Something went wrong'
            ]);
        }
        else {
            return response()->json([
                'status'=>200,
                'error'=> 'Data succesfully saved',
            ]);
        }
         
    }
}
