<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\VacationRequest;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::id();
        $pendingRequests = VacationRequest::where('user_id', $user)
            ->where('status', 'pending')
            ->get();
        $rejectedRequests = VacationRequest::where('user_id', $user)
            ->where('status', 'rejected')
            ->get();

        $approvedRequests = VacationRequest::where('status', 'approved')
            ->get();

        return view('dashboard', compact('pendingRequests', 'approvedRequests', 'rejectedRequests'));
    }


}