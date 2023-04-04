<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayVacation extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'holiday_date', 'rest_date'];
}