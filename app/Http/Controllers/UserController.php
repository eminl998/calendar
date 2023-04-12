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
        // Fetch the user by email
        $user = User::where('email', $email)->first();
        

        // If the user does not exist, abort with 404 error
        if (!$user) {
            abort(404);
        }

        // Pass the user data to the view
        $data = [
            'user' => $user,
            'daysOff' => [
                'Annual leave' => $user->daysOff['Annual leave'],
                'Parental leave' => $user->daysOff['Parental leave'],
                'Sick leave' => $user->daysOff['Sick leave'],
                'Compassionate leave' => $user->daysOff['Compassionate leave'],
                'Daily rest' => $user->daysOff['Daily rest'],
            ]
        ];

        // Render the view as a PDF using Dompdf
        $pdf = new Dompdf();
        $pdf->loadView('users', $data);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        // Generate a unique filename for the PDF
        $filename = 'user-' . $user->id . '-' . date('YmdHis') . '.pdf';

        // Return the PDF as a download
        return $pdf->download($filename);
    }


}