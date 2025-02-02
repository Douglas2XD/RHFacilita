<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeValidate;
use App\Models\Department;
use App\Models\Employee;    
use App\Models\Address;
use App\Models\professional_data;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $id = auth()->id();
        $count = Employee::where('add_by', $id)->count();

        $list = Employee::with('professional_data')->where('add_by',$id)->paginate(10);
        

        return view("show_employees", ["employee"=>new Employee(),
                            "list"=>$list]);
    }

    public function store(Request $request){     
        $data = $request->all();
        $validation_employee = Employee::Validated($data);
        $validation_address = Address::Validated($data);
        

        if($validation_employee->fails()){
            return back()->withErrors($validation_employee)->withInput();
        }

        if($validation_address->fails()){
            return back()->withErrors($validation_address)->withInput();
        }
        
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
        $employee->add_by = auth()->id();
        
        /*
        $employee->departament_id = $request->input('department_id'); 
        $employee->position = $request->input('position');
        $employee->admission_date = $request->input('admission_date');
        $employee->employee_stats = $request->input('employee_stats');
        $employee->CTPS_number = $request->input('CTPS_number');
        $employee->CTPS_series = $request->input('CTPS_series');
        $employee->PIS_PASEP = $request->input('PIS_PASEP');
        */
        $employee->save();

        Address::create([
            'employee_id' => $employee->id,
            'cep' => $request->input('cep'),
            'street' => $request->input('street'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'number' => $request->input('number'),
        ]);
        
        
        Professional_data::create([
            'employee_id' => $employee->id,
            'salary' => $request->input('salary'),
            'department_id' => $request->input('department_id'),
            'position' => $request->input('position'),
            'admission_date' => $request->input('admission_date'),   
            'employee_stats' => $request->input('employee_stats'),       
            'CTPS_number' => $request->input('CTPS_number'),      
            'CTPS_series' => $request->input('CTPS_series'),      
            'PIS_PASEP' => $request->input('PIS_PASEP'),
        ]);


        #aqui cadastra a movimentação
        
        DashboardController::hire(auth()->id());
        
        #aqui cadastra a movimentação
        $employee->save();
        session()->flash('success', 'Dados inseridos com sucesso!');
        return back()->with('success', 'Dados inseridos com sucesso!');
        
    }

    public function edit(Employee $employee)
    {   
        
        if ($employee->add_by != auth()->id()) {
            return redirect()->route('show_employees')->with('error', 'Você não tem permissão para editar este funcionário.');
        }
        
        $employee->load('address');
        $employee->load('professional_data');
        $list = Employee::paginate(20);
        $departments = Department::all()->where('created_by',auth()->id());
        
        
        return view("register_employee", [
            "employee" => $employee,
            "list" => $list,
            "departments"=>$departments,
        ]);
    }
    
    public function update(Employee $employee, Request $request){
        
        $employee->update($request->all());
        $employee->address->update([
            'cep' => $request->input('cep'),
            'street' => $request->input('street'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'number' => $request->input('number'),
        ]); 

        $professional_data = professional_data::where('employee_id',$employee->id)->update([
            'department_id' => $request->input('department_id'),
            'position' => $request->input('position'),
            'admission_date' => $request->input('admission_date'),
            'employee_stats' => $request->input('employee_stats'),
            'CTPS_number' => $request->input('CTPS_number'),
            'CTPS_series' => $request->input('CTPS_series'),
            'PIS_PASEP' => $request->input('PIS_PASEP'),
        ]);        
        
        $employee->update();
        session()->flash('success', 'Dados editados com sucesso!');
        return back()->with('success', 'Dados editados com sucesso!');
}

    public function delete(Employee $employee){

        if ($employee->add_by != auth()->id()) {
            return redirect()->route('show_employees')->with('error', 'Você não tem permissão para deletar este funcionário.');
        }
        $departament = Department::where('id_employee',$employee->id);
        $employee->professional_data->departament_id = null;

        $id_employee = $employee->id;

        $employee->save();

        
        $employee->delete();
        
        $endereco = Address::where('employee_id',$id_employee);

        DashboardController::termination(auth()->id());

        session()->flash('success', 'Funcionário desligado com sucesso!');
        return redirect(route('new'))->with('Funcionário desligado com sucesso! ');
    }

    public function register_employees(){
        $departments = Department::all()->where('created_by',auth()->id());
        return view('register_employee',["departments"=>$departments]);
    }
}
