<?php

namespace App\Models;

use App\Http\Controllers\Professional_dataController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_pic',
        'curriculum',
        'name',
        'cpf',
        'rg',
        'birth_date',
        'email',
        'phone',
        'gender',
        'marital_status',
        'children',
        'pwd',
        'address_id',
        'add_by',
        'employee_id',
        'department_id',                    
        'salary',
        'position',
        'admission_date',   
        'employee_stats',       
        'CTPS_number',      
        'CTPS_series',      
        'PIS_PASEP',
        'employee_id',
        'cep', 
        'street', 
        'number',
        'city', 
        'state'
    ];
    public function addedBy()
    {
        return $this->belongsTo(User::class, 'add_by');
    }

    public function departament()
    {
        return $this->belongsTo(Department::class);
    }

 
    public static function Validated($data, $id = null){

        $rules = [
                'name' => 'required|string|max:255',
                'cpf' => 'required|unique:employees,cpf' . ($id ? ",$id" : ''),
                'birth_date' => 'required|date|before:'.now()->subYears(16)->format('Y-m-d'),
                'rg' => 'required|string|max:20',
                'email' => 'required|email|unique:employees,email' . ($id ? ",$id" : ''),
                'phone' => 'required|string|max:15',
                'gender' => 'required|string',
                'marital_status' => 'required|string',
                'children' => 'required|integer|min:0',
                'pwd' => 'required|string|max:255',
                'curriculum' => $id ? 'nullable|file|mimes:pdf|max:2048' : 'required|file|mimes:pdf|max:2048',
                'profile_pic' => $id ? 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' : 'required|image|mimes:jpeg,png,jpg,gif|max:2048',



                'cep' => 'required|string', // CEP obrigatório, string e com exatamente 8 caracteres
                'street' => 'required|string|max:255', // Rua obrigatória, string e com até 255 caracteres
                'number' => 'required|integer|min:1', // Número obrigatório, inteiro e maior que 0
                'city' => 'required|string|max:100', // Cidade obrigatória, string e com até 100 caracteres
                'state' => 'required|string',
        ];
            
        $messages = [
                'name.required' => 'O campo nome é obrigatório.',
                'name.string' => 'O nome deve ser um texto válido.',
                'name.max' => 'O nome não pode ter mais de 255 caracteres.',
                'cpf.required' => 'O CPF é obrigatório.',
                'cpf.unique' => 'Este CPF já está cadastrado.',
                'birth_date.required' => 'A data de nascimento é obrigatória.',
                'birth_date.date' => 'A data de nascimento deve ser uma data válida.',
                'birth_date.before'=>'É preciso ser maior de 16 anos.',
                'rg.required' => 'O RG é obrigatório.',
                'rg.string' => 'O RG deve ser um texto válido.',
                'rg.max' => 'O RG não pode ter mais de 20 caracteres.',
                'email.required' => 'O email é obrigatório.',
                'email.email' => 'O email deve ser um endereço válido.',
                'email.unique' => 'Este email já está cadastrado.',
                'phone.required' => 'O telefone é obrigatório.',
                'phone.string' => 'O telefone deve ser um texto válido.',
                'phone.max' => 'O telefone não pode ter mais de 15 caracteres.',
                'gender.required' => 'O gênero é obrigatório.',
                'marital_status.required' => 'O estado civil é obrigatório.',
                'marital_status.in' => 'O estado civil deve ser um dos valores: solteiro, casado, divorciado ou viúvo.',
                'children.required' => 'O número de filhos é obrigatório.',
                'children.integer' => 'O número de filhos deve ser um número inteiro.',
                'children.min' => 'O número de filhos não pode ser negativo.',
                'pwd.string' => 'O campo PCD deve ser um texto válido.',
                'pwd.max' => 'O campo PCD não pode ter mais de 255 caracteres.',
                'pwd.required' => 'O campo PCD é obrigatório',
                'curriculum.file' => 'O currículo deve ser um arquivo.',
                'curriculum.mimes' => 'O currículo deve ser um arquivo no formato PDF.',
                'curriculum.max' => 'O currículo não pode exceder 2 MB.',
                'curriculum.required' => 'O currículo é obrigatório.',
                'profile_pic.image' => 'A foto de perfil deve ser uma imagem.',
                'profile_pic.required' => 'A foto de perfil é obrigatória.',
                'profile_pic.mimes' => 'A foto de perfil deve ser nos formatos: JPEG, PNG, JPG ou GIF.',
                'profile_pic.max' => 'A foto de perfil não pode exceder 2 MB.',

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
        $validator = Validator::make($data, $rules, $messages);

        return $validator;
    }
    
    

    


}


