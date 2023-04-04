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
        $holiday->description = $request->input('description');
        $holiday->start_date = $request->input('start_date');
        $holiday->end_date = $request->input('end_date');

        return redirect()->route('holidays')->with('success', 'Holiday created successfully');
    }

    public function update(Request $request, $id)
    {
        $holiday = HolidayVacation::find($id);
        $holiday->name = $request->input('name');
        $holiday->description = $request->input('description');
        $holiday->start_date = $request->input('start_date');
        $holiday->end_date = $request->input('end_date');
        $holiday->save();

        return redirect()->route('holidays')->with('success', 'Holiday updated successfully');
    }

    public function destroy($id)
    {
        $holiday = HolidayVacation::find($id);
        $holiday->delete();

        return redirect()->route('holidays')->with('success', 'Holiday deleted successfully');
    }
}