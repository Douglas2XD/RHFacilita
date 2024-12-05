<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'admission_date',
        'salary',
        'employee_stats',
        'CTPS_number',
        'CTPS_series',
        'PIS_PASEP'
    ];
}
