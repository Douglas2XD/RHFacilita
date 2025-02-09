<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentValidate;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function index(){
        
        if(Department::where('created_by',auth()->id())->count() == 0){
            Department::add_defaults_departments();
        }
        $list = Department::where('created_by',auth()->id())->paginate(100);
        
        foreach ($list as $department) {
            $department->employee_count = Employee::where('department_id',$department->id)->count();
        }
        
            
        return view("show_departments", ["list"=>$list]);
    }

    public function store(Request $request){

        $department = new Department();
        $data = $request->all();
        $department->created_by = auth()->id();
        $department->name_department = strtoupper($request->name_department);
        

        $validation_department = Department::Validated($data);
        

        if($validation_department->fails()){
            return back()->withErrors($validation_department)->withInput();
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
        $department->update($request->all());

        return back()->with('success', 'Department updated successfully!');

    }

    public function delete(Department $department){
        $department_count = Employee::where('department_id',$department->id)->count();
        
        if ($department_count > 0) {
            throw new \Exception('Não é possível excluir este departamento, ele possui empregados associados.');
        }
        
        $department->delete();
        return back()->with('success','Departamento deletado com sucesso! ');
    }


    public function department_info($id) {
        
        $department = Department::findOrFail($id);
        $employees = Employee::where('department_id',$department->id)->paginate(20);

        /*
        $employees = Employee::join('professional_data', 'employees.id', '=', 'professional_data.employee_id')
                     ->where('professional_data.department_id', $id)
                     ->select('employees.*')
                     ->paginate(20);
        */
        
        return view('department_info', [
            "employees" => $employees,
            "department" => $department
        ]);
    }

}


