<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentValidate;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
        $list = Department::paginate(20);
        foreach ($list as $department) {
            $department->employee_count = $department->employees()->count();
        }
        return view("show_departments", ["department"=>new Department(),
                            "list"=>$list]);
    }

    public function store(Request $request){
        $department = new Department();
        $data = $request->all();
        $department->name_departament = strtoupper($request->name_departament);
        
        $validation_departament = Department::Validated($data);
        

        if($validation_departament->fails()){
            return back()->withErrors($validation_departament)->withInput();
        }

        $department->save();
        session()->flash('success', 'Departamento criado com sucesso!');
        return back()->with('success', 'Departamento criado com sucesso!');
    }

    public function edit(Department $department){
        $list = Department::paginate(20);
        return view("#", ["department"=>$department,
                                "list"=>$list]);
    }
    
    public function update(Department $department, DepartmentValidate $request){
        $data = $request->except(['profile_pic', 'curriculum']);
        $department->update($data);

        return back()->with('success', 'Department updated successfully!');

    }


    public function delete(Department $department){

        if ($department->employees()->count() > 0) {
            throw new \Exception('Não é possível excluir este departamento, ele possui empregados associados.');
        }

        $department->delete();
        return back()->with('success','Departamento deletado com sucesso! ');
    }
}


