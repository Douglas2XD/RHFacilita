<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_departament',
    ];

    public static function Validated($data){

        $rules = [
            'name_departament' => 'required|unique:departments,name_departament',
        ];


        $messages = [
            'name_departament.required' => 'O departamento é obrigatório.',
            'name_departament.in' => 'Selecione um departamento válido.',
        ];
        
        $validator = Validator::make($data, $rules, $messages );

        return $validator;

    }
    public function employees()
{
    return $this->hasMany(Employee::class, 'departament_id');
}


}
