<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VacationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class VacationRequestController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'start_date' => ['required', 'date', 'after_or_equal:today'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'leave_type' => ['required'],
            'user_id' => [
                Rule::unique('vacation_requests')->where(function ($query) use ($request) {
                    return $query->where('user_id', auth()->id())
                        ->where('start_date', $request->input('start_date'))
                        ->where('end_date', $request->input('end_date'))
                        ->where('leave_type', $request->input('leave_type'));
                })
            ]
        ]);

        $vacationRequest = new VacationRequest([
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'leave_type' => $request->input('leave_type'),
            'status' => 'pending',
            'user_id' => auth()->id(),
        ]);

        $vacationRequest->save();

        return redirect()->route('dashboard')->with('success', 'Vacation request has been created successfully!');
    }

    public function destroy($id)
    {
        $vacationRequest = VacationRequest::find($id);
        $vacationRequest->delete();
        return redirect()->back();
    }



}