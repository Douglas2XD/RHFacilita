<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Vacancy extends Model
{
    protected $fillable = [ "title",
                            "description",
                            "requirements",
                            "remuneration",
                            "contract_type",
                            "location",
                            "benefits",
                            "created_by",
                            "department",
                            "total_vacancies",
                            "pwd_vacancy",
                            "time_work",
                        ];


    protected static function Validated($data){

        $rules = [
            'title' => 'required|string|max:255', // Título obrigatório, string e até 255 caracteres
            'description' => 'required|string|max:1000', // Descrição obrigatória, string e até 1000 caracteres
            'requirements' => 'nullable|string|max:1000', // Requisitos opcional, string e até 1000 caracteres
            'remuneration' => 'required|string|max:255', // Remuneração obrigatória, string e até 255 caracteres
            'contract_type' => 'required|string|max:100', // Tipo de contrato obrigatório, string e até 100 caracteres
            'location' => 'required|string|max:255', // Localização obrigatória, string e até 255 caracteres
            'benefits' => 'nullable|string|max:1000', // Benefícios opcional, string e até 1000 caracteres
            'total_vacancies' => 'nullable',
            'time_work'=> 'required|string|',
        ];

        $messages = [
                'title.required' => 'O campo título é obrigatório.',
                'title.string' => 'O título deve ser um texto válido.',
                'title.max' => 'O título não pode ter mais de 255 caracteres.',
                'description.required' => 'A descrição é obrigatória.',
                'description.string' => 'A descrição deve ser um texto válido.',
                'description.max' => 'A descrição não pode ter mais de 1000 caracteres.',
                'requirements.string' => 'Os requisitos devem ser um texto válido.',
                'requirements.max' => 'Os requisitos não podem ter mais de 1000 caracteres.',
                'remuneration.required' => 'O campo remuneração é obrigatório.',
                'remuneration.string' => 'A remuneração deve ser um texto válido.',
                'remuneration.max' => 'A remuneração não pode ter mais de 255 caracteres.',
                'contract_type.required' => 'O tipo de contrato é obrigatório.',
                'contract_type.string' => 'O tipo de contrato deve ser um texto válido.',
                'contract_type.max' => 'O tipo de contrato não pode ter mais de 100 caracteres.',
                'location.required' => 'A localização é obrigatória.',
                'location.string' => 'A localização deve ser um texto válido.',
                'location.max' => 'A localização não pode ter mais de 255 caracteres.',
                'benefits.string' => 'Os benefícios devem ser um texto válido.',
                'benefits.max' => 'Os benefícios não podem ter mais de 1000 caracteres.',
                'description.required'=> 'A descrição não pode ser nula! ',
                'time_work.required'=> 'Obrigatório a carga horária !'
            ];

            $validator = Validator::make($data, $rules, $messages);
            return $validator;
    }

    public function candidates()
    {
        return $this->belongsToMany(Candidate::class, 'candidate_vacancies', 'vacancy_id', 'candidate_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }



}

