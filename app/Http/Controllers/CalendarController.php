<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(string $date)
    {
        $calendar = DB::table('openning_days')
            ->join('cinemas', 'openning_days.cinema_id', '=', 'cinemas.id')
            ->join('show_times', 'openning_days.id', '=', 'show_times.openning_day_id')
            ->where('openning_days.date', $date)
            ->select('openning_days.*', 'cinemas.name', 'show_times.time')
            ->get();
        $result = [];
        foreach($calendar as $item){
            $cinema_id = $item->cinema_id;

            if(!isset($result[$cinema_id])){
                $result[$cinema_id] = [
                    'id' => $item->id,
                    'cinema_id' => $item->cinema_id,
                    'date' => $item->date,
                    'name' => $item->name,
                    'times' => []
                ];
            }

            $result[$cinema_id]['times'][] = $item->time;
        }

        $result = array_values($result);
        return $result;
    }
}
