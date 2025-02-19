<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeValidate;
use App\Mail\SendEmail;
use App\Models\Department;
use App\Models\Employee;    
use App\Models\Address;
use App\Models\professional_data;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PharIo\Manifest\Email;

class EmployeeController extends Controller
{
    public function index(){
        $id = auth()->id();
        $count = Employee::where('add_by', $id)->count();

        #$list = Employee::with('professional_data')->where('add_by',$id)->paginate(10);
        $list = Employee::where('add_by', $id)->paginate(10);
        return view("show_employees", ["employee"=>new Employee(),
                            "list"=>$list]);
    }

    public function Show_info_employee(Employee $employee){
        
        $professional = Employee::where('id',$employee->id)->first();
        
        $data = ['name' => $employee->name,
                'pic'=>$employee->profile_pic,
                'cpf'=>$employee->cpf,
                'department_id' => $employee->department_id,
                'salary' => $employee->salary,
                'position' => $employee->position,
                'admission_date' => $employee->admission_date,
                'employee_stats' => $employee->employee_stats,
                'CTPS_number' => $employee->CTPS_number,
                'CTPS_series' => $employee->CTPS_series,
                'PIS_PASEP' => $employee->PIS_PASEP,
                'cep'=> $employee->cep,
                'street' => $employee->street,
                'city' => $employee->city,
                'state' => $employee->state,
                'number'=>$employee->number,

            ];
        
        $pdf = Pdf::loadView('Pdf_employee', compact('data'));
        return $pdf->download("informacoes_{$employee->id}.pdf");

    }


    public function storeEmployee(Request $request){     
        $data = $request->all();
        $validation_employee = Employee::Validated($data);
        

        if($validation_employee->fails()){
            return back()->withErrors($validation_employee)->withInput();
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
        
        
        $employee->cep = $request->input('cep');
        $employee->street = $request->input('street');
        $employee->city = $request->input('city');
        $employee->state = $request->input('state');
        $employee->number = $request->input('number');

        // Atributos de dados profissionais
        $employee->salary = $request->input('salary');
        $employee->department_id = $request->input('department_id');
        $employee->position = $request->input('position');
        $employee->admission_date = $request->input('admission_date');
        $employee->employee_stats = $request->input('employee_stats');
        $employee->CTPS_number = $request->input('CTPS_number');
        $employee->CTPS_series = $request->input('CTPS_series');
        $employee->PIS_PASEP = $request->input('PIS_PASEP');



        
        
        $employee->save();

        


        #aqui cadastra a movimentação
        
        DashboardController::hire(auth()->id());
        
        #aqui cadastra a movimentação
        
        session()->flash('success', 'Dados inseridos com sucesso!');
        return back()->with('success', 'Dados inseridos com sucesso!');
        
    }

    public function editEmployee(Employee $employee)
    {   
        $departments = Department::all()->where('created_by',auth()->id());

        $department_user = Department::where('id',$employee->department_id)->first();
        if ($employee->add_by != auth()->id()) {
            return redirect()->route('show_employees')->with('error', 'Você não tem permissão para editar este funcionário.');
        }
        
        $list = Employee::paginate(20);
        
                
        
        return view("register_employee", [
            "employee" => $employee,
            "list" => $list,
            "departments"=>$departments,
            "department_user"=>$department_user,
        ]);
    }
    
    public function updateEmployee(Employee $employee, Request $request){
        
        $employee->update($request->all());     
        
        $employee->update();
        session()->flash('success', 'Dados editados com sucesso!');
        return back()->with('success', 'Dados editados com sucesso!');
}

    public function deleteEmployee(Employee $employee){
        
        if ($employee->add_by != auth()->id()) {
            return redirect()->route('show_employees')->with('error', 'Você não tem permissão para deletar este funcionário.');
        }
        $employee->delete();

        DashboardController::termination(auth()->id());

        session()->flash('success', 'Funcionário desligado com sucesso!');
        return redirect(route('new'))->with('Funcionário desligado com sucesso! ');
    }

    public function register_employees(){
        $departments = Department::all()->where('created_by',auth()->id());
        return view('register_employee',["departments"=>$departments]);
    }
}
