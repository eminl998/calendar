<?php

namespace App\Http\Controllers;

use App\Models\HolidayVacation;
use Illuminate\Http\Request;

class HolidayVacationsController extends Controller
{
    public function index()
    {
        $vacations = HolidayVacation::all();

        return view('dashboard', compact('vacations'));
    }
}