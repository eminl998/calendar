<?php

namespace App\Http\Controllers;

use App\Models\HolidayVacation;
use Illuminate\Http\Request;

class HolidayVacationsController extends Controller
{
    public function index()
    {
        $holidays = HolidayVacation::all();

        return view('holidays', compact('holidays'));
    }


    public function store(Request $request)
    {
        $holiday = new HolidayVacation;
        $holiday->title = $request->input('title');
        $holiday->holiday_date = $request->input('holiday_date');
        $holiday->rest_date = $request->input('rest_date');
        $holiday->save();

        return redirect()->route('holidays.index')->with('success', 'Holiday created successfully');
    }

    public function destroy($title)
    {
        $holiday = HolidayVacation::find($title);
        $holiday->delete();

        return redirect()->route('holidays.index')->with('success', 'Holiday deleted successfully');
        ;
    }

}