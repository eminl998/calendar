<?php

namespace App\Http\Controllers;

use App\Models\HolidayVacation;
use Illuminate\Http\Request;

class HolidayVacationsController extends Controller
{
    public function index()
    {
        $vacations = HolidayVacation::all();
        dd($vacations);
        return view('dashboard', compact('vacations'));
    }


    public function create()
    {
        return view('vacations.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'holiday_date' => 'required|date',
            'rest_date' => 'required|date',
        ]);

        HolidayVacation::create($validatedData);

        return redirect()->route('vacations.index');
    }

    public function show(HolidayVacation $vacation)
    {
        return view('vacations.show', compact('vacation'));
    }

    public function edit(HolidayVacation $vacation)
    {
        return view('vacations.edit', compact('vacation'));
    }

    public function update(Request $request, HolidayVacation $vacation)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'holiday_date' => 'required|date',
            'rest_date' => 'required|date',
        ]);

        $vacation->update($validatedData);

        return redirect()->route('vacations.index');
    }

    public function destroy(HolidayVacation $vacation)
    {
        $vacation->delete();

        return redirect()->route('vacations.index');
    }
}