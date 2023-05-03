<?php

namespace App\Http\Controllers;

use App\Models\HolidayVacation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $query = $request->input('query');

        $users = $this->fetchUsers($query);

        return view('users', ['users' => $users]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $users = $this->fetchUsers($query);

        return view('users', ['users' => $users, 'query' => $query]);
    }

    private function fetchUsers($query = null)
    {
        $perPage = 10; // Number of users to display per page
        $usersQuery = User::query();

        if ($query) {
            $usersQuery->where('name', 'like', '%' . $query . '%');
        }

        $users = $usersQuery->paginate($perPage);

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

        return $users;
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
            $start_date = Carbon::parse($request->start_date)->startOfDay();
            $end_date = Carbon::parse($request->end_date)->endOfDay();
            for ($date = $start_date; $date <= $end_date; $date->addDay()) {
                if (!$date->isWeekend() && !in_array($date->format('Y-m-d'), $holidays)) {
                    $daysOff++;
                }
            }
        }
        return $daysOff;
    }

    public function edit(User $user)
    {
        return view('users.editUser', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        try {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->is_admin = $request->input('is_admin');
            $user->position = $request->input('position');
            $user->personalIDnumber = $request->input('personalIDnumber');
            $user->phoneNumber = $request->input('phoneNumber');
            $user->gender = $request->input('gender');
            if (!empty($request->input('password'))) {
                $user->password = Hash::make($request->input('password'));
            }
            $user->save();

            return redirect()->route('users.index')->with('success', 'User updated successfully');
        } catch (QueryException $e) {
            // Check if the exception was caused by a unique constraint violation
            if ($e->getCode() == 23000) {
                // Return a flash message indicating that the email address is already in use
                return redirect()->back()->withInput()->withErrors(['email' => 'This email address is already in use.']);
            } else {
                // Rethrow the exception if it was caused by something else
                throw $e;
            }
        }
    }



    public function downloadPdf($email)
    {
        // Find the user by email and initialize the daysOff property
        $user = User::where('email', $email)->firstOrFail();
        $approvedRequests = $user->vacationRequests()->where('status', 'approved')->get();
        $holidays = HolidayVacation::pluck('rest_date')->toArray();
        $daysOff = [];
        $leaveTypes = ['Annual leave', 'Parental leave', 'Sick leave', 'Compassionate leave', 'Daily rest'];
        foreach ($leaveTypes as $leaveType) {
            $daysOff[$leaveType] = $this->getDaysOffForLeaveType($user, $leaveType);
        }
        $user->daysOff = $daysOff;

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

    public function store(Request $request)
    {
        try {
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->is_admin = $request->input('is_admin');
            $user->position = $request->input('position');
            $user->personalIDnumber = $request->input('personalIDnumber');
            $user->phoneNumber = $request->input('phoneNumber');
            $user->gender = $request->input('gender');
            $user->password = Hash::make($request->input('password'));
            $user->save();

            return redirect()->route('users.index')->with('success', 'User registered successfully');
        } catch (QueryException $e) {
            // Check if the exception was caused by a unique constraint violation
            if ($e->getCode() == 23000) {
                // Return a flash message indicating that the email address is already in use
                return redirect()->back()->withInput()->withErrors(['email' => 'This email address is already in use.']);
            } else {
                // Rethrow the exception if it was caused by something else
                throw $e;
            }
        }
    }



    public function destroy($name)
    {
        $holiday = User::find($name);
        $holiday->delete();

        return redirect()->route('users.index')->with('success', 'User removed successfully');
        ;
    }


}