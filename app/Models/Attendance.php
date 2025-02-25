<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'attendance_date',
        'check_in',
        'check_out',
        'overtime',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
