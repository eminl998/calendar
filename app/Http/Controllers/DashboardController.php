<?php

namespace App\Http\Controllers;

use App\Models\HolidayVacation;
use Illuminate\Support\Facades\Auth;
use App\Models\VacationRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\VacationRequestApproved;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        date_default_timezone_set('Europe/Paris');
        $holidays = HolidayVacation::get();
        $user = Auth::user();

        if ($user->is_admin) {
            $pendingRequests = VacationRequest::where('status', 'pending')
                ->get();
            $rejectedRequests = VacationRequest::where('status', 'rejected')
                ->get();
            $approvedRequests = VacationRequest::where('status', 'approved')
                ->get();
        } else {
            $pendingRequests = VacationRequest::where('user_id', $user->id)
                ->where('status', 'pending')
                ->get();
            $rejectedRequests = VacationRequest::where('user_id', $user->id)
                ->where('status', 'rejected')
                ->get();
            $approvedRequests = VacationRequest::where('status', 'approved')
                ->with('user')
                ->get();
        }
        $holidays = HolidayVacation::get();
        return view('dashboard', compact('pendingRequests', 'approvedRequests', 'rejectedRequests', 'holidays'));
    }


    public function approve(VacationRequest $request)
    {
        $request->status = 'approved';
        $request->save();

        // Retrieve the user associated with the vacation request
        $user = $request->user;

        // Send the email
        Mail::to($user->email)
            ->send(new VacationRequestApproved($request, $user));

        return redirect()->back()->with('success', 'Vacation request approved successfully.');
    }


    public function reject(VacationRequest $request)
    {
        $request->status = 'rejected';
        $request->save();

        return redirect()->back()->with('success', 'Vacation request rejected successfully.');
    }

}