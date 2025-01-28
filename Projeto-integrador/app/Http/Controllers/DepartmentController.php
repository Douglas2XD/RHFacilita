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

        $department->name_departament = strtoupper($request->name_departament);
        
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


}
