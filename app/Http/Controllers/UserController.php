<?php

namespace App\Http\Controllers;

use App\Models\HolidayVacation;
use App\Models\User;
use App\Models\VacationRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        foreach ($users as $user) {
            $approvedRequests = $user->vacationRequests()->where('status', 'approved')->get();
            $holidays = HolidayVacation::pluck('rest_date')->toArray();
            $daysOff = 0;
            foreach ($approvedRequests as $request) {
                $start_date = Carbon::parse($request->start_date);
                $end_date = Carbon::parse($request->end_date);
                for ($date = $start_date; $date <= $end_date; $date->addDay()) {
                    if (!$date->isWeekend() && !in_array($date->format('Y-m-d'), $holidays)) {
                        $daysOff++;
                    }
                }
            }
            $user->daysOff = $daysOff;
        }

        return view('users', ['users' => $users]);
    }

    private function getDaysOffForLeaveType($user, $leaveType)
    {
        $approvedRequests = $user->vacationRequests()
            ->where('status', 'approved')
            ->where('leave_type', $leaveType)
            ->get();
        $holidays = HolidayVacation::pluck('rest_date')->toArray();
        $daysOff = 0;
        foreach ($approvedRequests as $request) {
            $start_date = Carbon::parse($request->start_date);
            $end_date = Carbon::parse($request->end_date);
            for ($date = $start_date; $date <= $end_date; $date->addDay()) {
                if (!$date->isWeekend() && !in_array($date->format('Y-m-d'), $holidays)) {
                    $daysOff++;
                }
            }
        }
        return $daysOff;
    }


// public function getAnnualLeaveAttribute()
    // {
    //     $users = User::all();

    //     foreach ($users as $user) {
    //         $approvedRequests = $user->vacationRequests()
    //         ->where('status', 'approved')
    //         ->where('leave_type', 'Annual leave')
    //         ->get();
    //         $holidays = HolidayVacation::pluck('rest_date')->toArray();
    //         $daysOff = 0;
    //         foreach ($approvedRequests as $request) {
    //             $start_date = Carbon::parse($request->start_date);
    //             $end_date = Carbon::parse($request->end_date);
    //             for ($date = $start_date; $date <= $end_date; $date->addDay()) {
    //                 if (!$date->isWeekend() && !in_array($date->format('Y-m-d'), $holidays)) {
    //                     $daysOff++;
    //                 }
    //             }
    //         }
    //         $user->daysOff = $daysOff;
    //     }

    //     return view('users', ['users' => $users]);
    // }

    
    // public function getParentalLeaveAttribute()
    // {
    //     $users = User::all();

    //     foreach ($users as $user) {
    //         $approvedRequests = $user->vacationRequests()
    //         ->where('status', 'approved')
    //         ->where('leave_type', 'Parental leave')
    //         ->get();
    //         $holidays = HolidayVacation::pluck('rest_date')->toArray();
    //         $daysOff = 0;
    //         foreach ($approvedRequests as $request) {
    //             $start_date = Carbon::parse($request->start_date);
    //             $end_date = Carbon::parse($request->end_date);
    //             for ($date = $start_date; $date <= $end_date; $date->addDay()) {
    //                 if (!$date->isWeekend() && !in_array($date->format('Y-m-d'), $holidays)) {
    //                     $daysOff++;
    //                 }
    //             }
    //         }
    //         $user->daysOff = $daysOff;
    //     }

    //     return view('users', ['users' => $users]);
    // }

    
    // public function getSickLeaveAttribute()
    // {
    //     $users = User::all();

    //     foreach ($users as $user) {
    //         $approvedRequests = $user->vacationRequests()
    //         ->where('status', 'approved')
    //         ->where('leave_type', 'Sick leave')
    //         ->get();
    //         $holidays = HolidayVacation::pluck('rest_date')->toArray();
    //         $daysOff = 0;
    //         foreach ($approvedRequests as $request) {
    //             $start_date = Carbon::parse($request->start_date);
    //             $end_date = Carbon::parse($request->end_date);
    //             for ($date = $start_date; $date <= $end_date; $date->addDay()) {
    //                 if (!$date->isWeekend() && !in_array($date->format('Y-m-d'), $holidays)) {
    //                     $daysOff++;
    //                 }
    //             }
    //         }
    //         $user->daysOff = $daysOff;
    //     }

    //     return view('users', ['users' => $users]);
    // }

    
    // public function getAnnualCompassionateAttribute()
    // {
    //     $users = User::all();

    //     foreach ($users as $user) {
    //         $approvedRequests = $user->vacationRequests()
    //         ->where('status', 'approved')
    //         ->where('leave_type', 'Compassionate leave')
    //         ->get();
    //         $holidays = HolidayVacation::pluck('rest_date')->toArray();
    //         $daysOff = 0;
    //         foreach ($approvedRequests as $request) {
    //             $start_date = Carbon::parse($request->start_date);
    //             $end_date = Carbon::parse($request->end_date);
    //             for ($date = $start_date; $date <= $end_date; $date->addDay()) {
    //                 if (!$date->isWeekend() && !in_array($date->format('Y-m-d'), $holidays)) {
    //                     $daysOff++;
    //                 }
    //             }
    //         }
    //         $user->daysOff = $daysOff;
    //     }

    //     return view('users', ['users' => $users]);
    // }

    
    // public function getDailyRestAttribute()
    // {
    //     $users = User::all();

    //     foreach ($users as $user) {
    //         $approvedRequests = $user->vacationRequests()
    //         ->where('status', 'approved')
    //         ->where('leave_type', 'Daily rest')
    //         ->get();
    //         $holidays = HolidayVacation::pluck('rest_date')->toArray();
    //         $daysOff = 0;
    //         foreach ($approvedRequests as $request) {
    //             $start_date = Carbon::parse($request->start_date);
    //             $end_date = Carbon::parse($request->end_date);
    //             for ($date = $start_date; $date <= $end_date; $date->addDay()) {
    //                 if (!$date->isWeekend() && !in_array($date->format('Y-m-d'), $holidays)) {
    //                     $daysOff++;
    //                 }
    //             }
    //         }
    //         $user->daysOff = $daysOff;
    //     }

    //     return view('users', ['users' => $users]);
    // }



}