<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';

    protected $fillable = [
        'name_department',
        'user_id',
    ];

    public static function Validated($data){

        $rules = [
            'name_department' => 'required|unique:departments,name_department',
        ];

        $messages = [
            'name_department.required' => 'O departamento é obrigatório.',
            'name_department.in' => 'Selecione um departamento válido.',
        ];
        
        $validator = Validator::make($data, $rules, $messages );

        return $validator;

    }
    public function employees()
{
    return $this->hasMany(Employee::class, 'departament_id');
}

public function employeesThroughProfessionalData() {
    return $this->hasManyThrough(Employee::class, professional_data::class, 'department_id', 'id', 'id', 'employee_id');
}


public function professional_data() {
    return $this->hasMany(professional_data::class, 'department_id');
}

}
