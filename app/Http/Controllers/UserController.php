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

    public function downloadPdf(Request $request, $email)
{
    // Get the user data from your database
    $user1 = User::where('email', $email)->first();

    if (!$user1) {
        abort(404);
    }

    // Generate the HTML table as you did before
    $table = view('users', compact('users'))->render();

    // Create a new instance of Dompdf class
    $pdf = new Dompdf();

    // Load the HTML content into the PDF generator
    $pdf->loadHtml($table);

    // Set the paper size and orientation
    $pdf->setPaper('A4', 'portrait');

    // Render the PDF
    $pdf->render();

    // Generate a unique filename for the PDF
    $filename = 'user-' . $user1->id . '-' . date('YmdHis') . '.pdf';

    // Return the PDF as a download
    return $pdf->stream($filename);
}


}