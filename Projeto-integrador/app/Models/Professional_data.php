<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class professional_data extends Model
{
    use HasFactory;
    protected $table = 'professional_data';

    
    protected $fillable = ['employee_id',
                            'department_id',                    
                            'salary',
                            'position',
                            'admission_date',   
                            'employee_stats',       
                            'CTPS_number',      
                            'CTPS_series',      
                            'PIS_PASEP',];

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id');
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

}

