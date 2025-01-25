<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'name_departament',
        'position',
        'admission_date',
        'employee_stats',
        'CTPS_number',
        'CTPS_series',
        'PIS_PASEP',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id');
    }

    public static function Validated($data){

        $rules = [
            'name_departament' => 'required|in:Administração,Suporte,T.I,Estágio,Recursos Humanos,Marketing,Vendas,Financeiro,Comercial,Design,Desenvolvimento,Gestão de Projetos,Logística,Atendimento ao Cliente,Jurídico,Operações,Engenharia,Produção,Pesquisa e Desenvolvimento,Qualidade,Gestão de Pessoas',
            
            'position' => 'required|string|min:3|max:255',
            
            'admission_date' => 'required|date|before_or_equal:today',
            
            'salary' => 'required|regex:/^\d+(\,\d{1,2})?$/',  // Exemplo de formato: 1234,56
            
            'employee_stats' => 'required',
            
            'CTPS_number' => 'required',
            
            'CTPS_series' => 'required',
            
            'PIS_PASEP' => 'required',
        ];
        

        $messages = [
            'name_departament.required' => 'O departamento é obrigatório.',
            'name_departament.in' => 'Selecione um departamento válido.',
        
            'position.required' => 'O cargo é obrigatório.',
            'position.string' => 'O cargo deve ser uma string válida.',
            'position.min' => 'O cargo deve ter pelo menos 3 caracteres.',
            'position.max' => 'O cargo não pode ter mais de 255 caracteres.',
        
            'admission_date.required' => 'A data de admissão é obrigatória.',
            'admission_date.date' => 'A data de admissão deve ser uma data válida.',
            'admission_date.before_or_equal' => 'A data de admissão não pode ser no futuro.',
        
            'salary.required' => 'O salário é obrigatório.',
            'salary.regex' => 'O salário deve ter o formato correto (ex: R$ 1.000,00).',
        
            'employee_stats.required' => 'O status do colaborador é obrigatório.',
            'employee_stats.in' => 'Selecione um status válido para o colaborador.',
        
            'CTPS_number.required' => 'O número da CTPS é obrigatório.',
        
            'CTPS_series.required' => 'A série da CTPS é obrigatória.',        
            'PIS_PASEP.required' => 'O PIS/PASEP é obrigatório.',
        ];
        
        
        $validator = Validator::make($data, $rules, $messages );

        return $validator;



    }


}
