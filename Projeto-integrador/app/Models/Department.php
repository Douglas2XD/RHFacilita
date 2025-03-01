<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';

    protected $fillable = [
        'name_department',
        'user_id',
        'created_by',
    ];

    public static function add_defaults_departments(){
        
        $departamentos = [
            'ADMINISTRAÇÃO',
            'SUPORTE',
            'T.I',
            'ESTÁGIO',
            'RECURSOS HUMANOS',
            'MARKETING',
            'VENDAS',
            'FINANCEIRO',
            'COMERCIAL',
            'DESIGN',
            'DESENVOLVIMENTO',
            'GESTÃO DE PROJETOS',
            'LOGÍSTICA',
            'ATENDIMENTO AO CLIENTE',
            'JURÍDICO',
            'OPERAÇÕES',
            'ENGENHARIA',
            'PRODUÇÃO',
            'PESQUISA E DESENVOLVIMENTO',
            'QUALIDADE',
            'GESTÃO DE PESSOAS'
        ];

        foreach($departamentos as $departamento){
            Department::create(['name_department'=>$departamento,
                                'created_by'=>auth()->id(),
                                'created_at'=>now(),
                                'updated_at'=>now()]
                            );
        }
        
    }


    public static function Validated($data){

        $rules = [
            'name_department' => 'required|max:255',
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



}
