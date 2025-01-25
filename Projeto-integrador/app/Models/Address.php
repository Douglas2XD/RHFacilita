<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Address extends Model
{
    use HasFactory;
    protected $table = "address";
    protected $fillable = [
        'employee_id',
        'cep', 
        'street', 
        'number',
        'city', 
        'state'
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public static function Validated($data){

        $rules = [
                'cep' => 'required|string', // CEP obrigatório, string e com exatamente 8 caracteres
                'street' => 'required|string|max:255', // Rua obrigatória, string e com até 255 caracteres
                'number' => 'required|integer|min:1', // Número obrigatório, inteiro e maior que 0
                'city' => 'required|string|max:100', // Cidade obrigatória, string e com até 100 caracteres
                'state' => 'required|string',
        ];

        $messages = [
            'cep.required' => 'O campo CEP é obrigatório.',
                'cep.string' => 'O CEP deve ser um texto.',
                'cep.size' => 'O CEP deve ter exatamente 8 caracteres.',
                'street.required' => 'O campo rua é obrigatório.',
                'street.string' => 'A rua deve ser um texto válido.',
                'street.max' => 'A rua não pode ter mais de 255 caracteres.',
                'number.required' => 'O campo número é obrigatório.',
                'number.integer' => 'O número deve ser um valor inteiro.',
                'number.min' => 'O número deve ser maior que 0.',
                'city.required' => 'O campo cidade é obrigatório.',
                'city.string' => 'A cidade deve ser um texto válido.',
                'city.max' => 'A cidade não pode ter mais de 100 caracteres.',
                'state.required' => 'O campo estado é obrigatório.',
                'state.string' => 'O estado deve ser um texto válido.',
                'state.size' => 'O estado deve ter exatamente 2 caracteres.',
        ];

        $validator = Validator::make($data,$rules,$messages);

        return $validator;



    }

}
