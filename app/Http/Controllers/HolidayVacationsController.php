<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HolidayVacation;

class HolidayVacationsController extends Controller
{
    public function index()
    {
        $vacations = HolidayVacation::all();

        return view('components.parts.vacations', compact('vacations'));
    }
}