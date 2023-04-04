<?php

namespace App\Http\Controllers;

use App\Models\HolidayVacation;
use Illuminate\Support\Facades\Auth;
use App\Models\VacationRequest;

class DashboardController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $pendingRequests = VacationRequest::where('user_id', $user->id)
            ->where('status', 'pending')
            ->get();
        $rejectedRequests = VacationRequest::where('user_id', $user->id)
            ->where('status', 'rejected')
            ->get();

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
            $approvedRequests = VacationRequest::where('user_id', $user->id)
                ->where('status', 'approved')
                ->get();
        }

        return view('dashboard', compact('pendingRequests', 'approvedRequests', 'rejectedRequests'));
    }

    public function approve(VacationRequest $request)
    {
        $request->status = 'approved';
        $request->save();

        return redirect()->back()->with('success', 'Vacation request approved successfully.');
    }

    public function reject(VacationRequest $request)
    {
        $request->status = 'rejected';
        $request->save();

        return redirect()->back()->with('success', 'Vacation request rejected successfully.');
    }

}