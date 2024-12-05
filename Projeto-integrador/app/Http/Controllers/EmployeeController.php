<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeValidate;
use App\Models\Employee;                        
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $list = Employee::paginate(20);
        return view("show_employees", ["employee"=>new Employee(),
                            "list"=>$list]);
    }

    public function store(Request $request){        
        
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
        session()->flash('success', 'Dados inseridos com sucesso!');
        return back()->with('success', 'Dados inseridos com sucesso!');
        #return redirect(route("edit", $employee->id))->with('success', 'Employee created successfully!');
    }

    public function edit(Employee $employee){
        $list = Employee::paginate(20);
        
        return view("register_employee", ["employee"=>$employee,
                                "list"=>$list]);
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
        
        $employee->update();
        session()->flash('success', 'Dados editados com sucesso!');
        return back()->with('success', 'Dados editados com sucesso!');
}
    public function delete( Employee $employee){
        $employee->delete();
        session()->flash('success', 'Funcionário desligado com sucesso!');
        return redirect(route('new'))->with('Funcionário desligado com sucesso! ');
    }
    
}
