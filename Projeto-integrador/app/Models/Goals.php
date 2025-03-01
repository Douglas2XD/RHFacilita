<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
class Goals extends Model
{
    use HasFactory;
    protected $filablle = [ "name",
                            "situation",
                            "description",
                            "start_date",
                            "end_date",
                            "participants",
                            
];

public function user(){
    return $this->belongsTo(User::class,'user_id');
}

public static function Validated($data, $id = null) {
    $rules = [
        'name' => 'required|string|max:255',
        'situation' => 'required|string',
        'description' => 'nullable|string|max:1000',
        'start_date' => 'required|date|after_or_equal:today',
        'end_date' => 'required|date|after:start_date',
        'participants' => 'required|string',
    ];

    $messages = [
        'name.required' => 'O nome é obrigatório.',
        'name.string' => 'O nome deve ser um texto válido.',
        'name.max' => 'O nome não pode ter mais de 255 caracteres.',
        'situation.required' => 'A situação é obrigatória.',
        'description.string' => 'A descrição deve ser um texto válido.',
        'description.max' => 'A descrição não pode ter mais de 1000 caracteres.',
        'start_date.required' => 'A data de início é obrigatória.',
        'start_date.date' => 'A data de início deve ser válida.',
        'start_date.after_or_equal' => 'A data de início não pode ser anterior a hoje.',
        'end_date.required' => 'A data de término é obrigatória.',
        'end_date.date' => 'A data de término deve ser válida.',
        'end_date.after' => 'A data de término deve ser posterior à data de início.',
        'participants.required' => 'É necessário pelo menos um participante.',
    ];
    $validator = Validator::make($data, $rules, $messages);
    return $validator;
}

}
