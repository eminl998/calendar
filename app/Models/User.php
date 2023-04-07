<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    public function vacationRequests()
    {
        return $this->hasMany(VacationRequest::class);
    }
    public function getAnnualLeaveAttribute()
    {
        $approvedRequests = $this->vacationRequests()
            ->where('status', 'approved')
            ->where('leave_type', 'Annual leave')
            ->get();
        $daysOff = 0;
        foreach ($approvedRequests as $request) {
            $start_date = Carbon::parse($request->start_date);
            $end_date = Carbon::parse($request->end_date);
            $daysOff += $end_date->diffInDays($start_date);
        }
        return $daysOff;
    }

    public function getParentalLeaveAttribute()
    {
        $approvedRequests = $this->vacationRequests()
            ->where('status', 'approved')
            ->where('leave_type', 'Parental leave')
            ->get();
        $daysOff = 0;
        foreach ($approvedRequests as $request) {
            $start_date = Carbon::parse($request->start_date);
            $end_date = Carbon::parse($request->end_date);
            $daysOff += $end_date->diffInDays($start_date);
        }
        return $daysOff;
    }

    public function getSickLeaveAttribute()
    {
        $approvedRequests = $this->vacationRequests()
            ->where('status', 'approved')
            ->where('leave_type', 'Sick leave')
            ->get();
        $daysOff = 0;
        foreach ($approvedRequests as $request) {
            $start_date = Carbon::parse($request->start_date);
            $end_date = Carbon::parse($request->end_date);
            $daysOff += $end_date->diffInDays($start_date);
        }
        return $daysOff;
    }

    public function getAnnualCompassionateAttribute()
    {
        $approvedRequests = $this->vacationRequests()
            ->where('status', 'approved')
            ->where('leave_type', 'Compassionate leave')
            ->get();
        $daysOff = 0;
        foreach ($approvedRequests as $request) {
            $start_date = Carbon::parse($request->start_date);
            $end_date = Carbon::parse($request->end_date);
            $daysOff += $end_date->diffInDays($start_date);
        }
        return $daysOff;
    }
    public function getDailyRestAttribute()
    {
        $approvedRequests = $this->vacationRequests()
            ->where('status', 'approved')
            ->where('leave_type', 'Daily rest')
            ->get();
        $daysOff = 0;
        foreach ($approvedRequests as $request) {
            $start_date = Carbon::parse($request->start_date);
            $end_date = Carbon::parse($request->end_date);
            $daysOff += $end_date->diffInDays($start_date);
        }
        return $daysOff;
    }


    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}