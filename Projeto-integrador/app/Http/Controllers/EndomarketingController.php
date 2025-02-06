<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\professional_data;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use PhpParser\Node\Expr\Empty_;

class EndomarketingController extends Controller
{
    public function endomarketing(){
        $departments = Department::where('created_by',auth()->id())->get();
        $id = auth()->id();
        $this_month = date('m');
        $next_month = (new DateTime())->modify('+1 month')->format('m');
        
    $employees = Employee::where('add_by', $id)
        ->whereMonth('birth_date', $this_month)
        ->selectRaw('*, DATE_FORMAT(birth_date, "%d/%m") as date_birth') // Inclui data formatada
        ->get()
        ->map(function ($employee) {
            $employee->age = $this->calculateAge($employee->birth_date) + 1; // Calcula idade +1
            return $employee;
        });

    $next_employees = Employee::where('add_by', $id)
        ->whereMonth('birth_date', $next_month)
        ->selectRaw('*, DATE_FORMAT(birth_date, "%d/%m") as date_birth') // Inclui data formatada
        ->get()
        ->map(function ($employee) {
            $employee->age = $this->calculateAge($employee->birth_date) + 1; // Calcula idade +1
            return $employee;
        });
            return view('endomarketing', ["employees" => $employees, "next_employees" => $next_employees,"departments"=>$departments]);
    }
    private function calculateAge($birthDate)
    {
        $birthDate = new DateTime($birthDate);
        $today = new DateTime();
        $age = $today->diff($birthDate)->y;
        return $age;
    }

    public function Draw(Request $request){
        
        $department = Department::find($request->id_department);
       
        if ($department == null){
            $department = "GERAL";
            $employee_contempled = Employee::where('add_by',auth()->id())->inRandomOrder()->first();
            return view('draw',["employee_contempled"=>$employee_contempled,"total_departments"=>1,"department"=>$department]);
        }
        else{
            
            $total_departments = professional_data::where('department_id',$department->id)->count();

            $employee_contempled = Employee::join('professional_data', 'employees.id', '=', 'professional_data.employee_id')
                     ->where('professional_data.department_id', $department->id)
                     ->inRandomOrder()->first();

            return view('draw',["employee_contempled"=>$employee_contempled,"department"=>$department,"total_departments"=>$total_departments]); 
        }

    }
}
