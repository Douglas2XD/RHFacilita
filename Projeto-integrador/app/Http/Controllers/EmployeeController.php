<?php

namespace App\Http\Controllers;

use App\Models\Employee;    
use App\Models\Address;                       
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $count = Employee::count();
        $list = Employee::paginate(20);
        
        if($count <= 0){
            $zero = "OPA, SEM COLABOLADORES !";
            return view("show_employees", ["employee"=>new Employee(),
                            "list"=>$list,"zero"=>$zero]);
        }
        return view("show_employees", ["employee"=>new Employee(),
                            "list"=>$list]);
    }

    public function store(Request $request){        
        $request->validate([
        'name' => 'required|string|max:255',
        'cpf' => 'required|unique:employees,cpf',
        'birth_date' => 'required|date',
        'rg' => 'required|string|max:20',
        'email' => 'required|email|unique:employees,email',
        'phone' => 'required|string|max:15',
        'gender' => 'required|string',
        'marital_status' => 'required|string',
        'children' => 'required|integer|min:0',
        'pwd' => 'required|string|max:255',
        'curriculum' => 'required|file|mimes:pdf|max:2048',
        'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'cep' => 'required|string', // CEP obrigatório, string e com exatamente 8 caracteres
        'street' => 'required|string|max:255', // Rua obrigatória, string e com até 255 caracteres
        'number' => 'required|integer|min:1', // Número obrigatório, inteiro e maior que 0
        'city' => 'required|string|max:100', // Cidade obrigatória, string e com até 100 caracteres
        'state' => 'required|string', // Estado obrigatório, string e com exatamente 2 caracteres (ex.: SP, RJ)

    ], [
        'name.required' => 'O campo nome é obrigatório.',
        'name.string' => 'O nome deve ser um texto válido.',
        'name.max' => 'O nome não pode ter mais de 255 caracteres.',
        'cpf.required' => 'O CPF é obrigatório.',
        'cpf.unique' => 'Este CPF já está cadastrado.',
        'birth_date.required' => 'A data de nascimento é obrigatória.',
        'birth_date.date' => 'A data de nascimento deve ser uma data válida.',
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
    ]);
        if ($request->hasFile("profile_pic")){
            
            $file = $request->file("profile_pic");
            $file_name = time()."_".$file->getClientOriginalName();
            
            $file->move(public_path("assets/profile_pic"),$file_name);
            $profile_pic = $file_name;
        }
        
        if ($request->hasFile("curriculum")){
            
            $curriculum = $request->file("curriculum");
            $curriculum_name = time()."_".$curriculum->getClientOriginalName();
            $curriculum->move(public_path("assets/curriculum"),$curriculum_name);
            $curr = $curriculum_name;
        }        
        
        $employee = new Employee();
        $employee->name = $request->input('name');
        $employee->cpf = $request->input('cpf');
        $employee->birth_date = $request->input('birth_date');
        $employee->rg = $request->input('rg');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->gender = $request->input('gender');
        $employee->marital_status = $request->input('marital_status');
        $employee->children = $request->input('children');
        $employee->pwd = $request->input('pwd');
        $employee->curriculum = $curr;
        $employee->profile_pic = $profile_pic;
        
        $employee->save();

        Address::create([
            'employee_id' => $employee->id,
            'cep' => $request->input('cep'),
            'street' => $request->input('street'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'number' => $request->input('number'),
        ]);

        session()->flash('success', 'Dados inseridos com sucesso!');
        return back()->with('success', 'Dados inseridos com sucesso!');
        #return redirect(route("edit", $employee->id))->with('success', 'Employee created successfully!');
    }

    public function edit(Employee $employee)
    {
        
        $employee->load('address');

        $list = Employee::paginate(20);

        
        return view("register_employee", [
            "employee" => $employee,
            "list" => $list,
        ]);
    }
    
    public function update(Employee $employee, Request $request){
        
        if ($request->hasFile("profile_pic")){
            
            $file = $request->file("profile_pic");
            $file_name = time()."_".$file->getClientOriginalName();
            
            $file->move(public_path("assets/profile_pic"),$file_name);
            $profile_pic = $file_name;
        }
        
        if ($request->hasFile("curriculum")){
            
            $curriculum = $request->file("curriculum");
            $curriculum_name = time()."_".$curriculum->getClientOriginalName();
            $curriculum->move(public_path("assets/curriculum"),$curriculum_name);
            $curr = $curriculum_name;
        } 
        $name = $request->input('name');
        $cpf = $request->input('cpf');
        $birth_date = $request->input('birth_date');
        $rg = $request->input('rg');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $gender = $request->input('gender');
        $marital_status = $request->input('marital_status');
        $children = $request->input('children');
        $pwd = $request->input('pwd');

        $employee->name = $name;
        $employee->cpf =$cpf;
        $employee->birth_date = $birth_date;
        $employee->rg = $rg;
        $employee->email = $email;
        $employee->phone = $phone;
        $employee->gender = $gender;
        $employee->marital_status = $marital_status;
        $employee->children = $children;
        $employee->pwd = $pwd;
        $employee->curriculum = $curriculum;
        $employee->profile_pic = $profile_pic;

        $employee->address->update([
            'cep' => $request->input('cep'),
            'street' => $request->input('street'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'number' => $request->input('number'),
        ]); 
        
        $employee->update();
        session()->flash('success', 'Dados editados com sucesso!');
        return back()->with('success', 'Dados editados com sucesso!');
}
    public function delete( Employee $employee){

        $employee->address->delete();
        
        $employee->delete();



        session()->flash('success', 'Funcionário desligado com sucesso!');
        return redirect(route('new'))->with('Funcionário desligado com sucesso! ');
    }
    
}
