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

    public function storeDepartment(Request $request){

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

    public function editDepartment($id){
        $department = Department::where('id',$id)->first();

        if (!$department) {
            return redirect()->route('show_departments')->with('error', 'Você não tem permissão para editar este Departamento.');
        }

        if($department->created_by == auth()->id()){
            return view("create_department",["department"=>$department]);
        }
        return redirect()->route('show_departments')->with('error', 'Você não tem permissão para editar este Departamento.');

    }
    
    public function updateDepartment(Department $department, Request $request){
        $validation_department = Department::Validated($request->all());
        if($validation_department->fails()){
            return back()->withErrors($validation_department)->withInput();
        }
        $department->name_department = $request->name_department;
        $department->save();

        return back()->with('success', 'Departamento atualizado com sucesso!');

    }

    public function deleteDepartment(Department $department){
        $department_count = Employee::where('department_id',$department->id)->count();
        
        if ($department_count > 0) {
            throw new \Exception('Não é possível excluir este departamento, ele possui empregados associados.');
        }

        if($department->created_by == auth()->id()){
            $department->delete();
            return back()->with('success','Departamento deletado com sucesso! ');
        }else{
            return back()->with('error','Departamento Não encontrado! ');
        }

        
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


