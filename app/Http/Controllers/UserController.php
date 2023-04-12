<?php

namespace App\Http\Controllers;

use App\Models\HolidayVacation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        foreach ($users as $user) {
            $approvedRequests = $user->vacationRequests()->where('status', 'approved')->get();
            $holidays = HolidayVacation::pluck('rest_date')->toArray();
            $daysOff = [];
            $leaveTypes = ['Annual leave', 'Parental leave', 'Sick leave', 'Compassionate leave', 'Daily rest'];
            foreach ($leaveTypes as $leaveType) {
                $daysOff[$leaveType] = $this->getDaysOffForLeaveType($user, $leaveType);
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

    public function downloadPdf($email)
    {
        // Find the user by email
        $user = User::where('email', $email)->firstOrFail();

        // Generate the PDF content using Dompdf
        $pdf = new Dompdf();
        $pdf->loadHtml(view('users.pdf', compact('user')));

        // Set paper size and orientation
        $pdf->setPaper('A4', 'portrait');

        // Render the PDF document
        $pdf->render();

        // Set the PDF filename
        $filename = $user->name . '_details.pdf';

        // Return the PDF document as a response
        return $pdf->stream($filename);
    }


}