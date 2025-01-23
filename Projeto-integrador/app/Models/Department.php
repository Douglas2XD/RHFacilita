<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'name',
        'position',
        'admission_date',
        'employee_stats',
        'CTPS_number',
        'CTPS_series',
        'PIS_PASEP'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}
