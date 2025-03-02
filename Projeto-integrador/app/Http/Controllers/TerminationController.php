<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Termination;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TerminationController extends Controller
{   

    public function index(Employee $employee){
        
        $department = Department::where('id',$employee->department_id)->first();
        
        return view('termination',["employee"=>$employee,"department"=>$department]);
    }

    public function show(){
        Termination::where('dismissal_date', '<=', Carbon::now()->subYears(5))->forceDelete();
        
        $search = request("search");
        $search2 = request("search2");


        if($search){
            $list = Termination::where('removed_by',auth()->id())->where("name","LIKE","%".$search."%")->paginate(5);
        }else if($search2){
            $list = Termination::where('removed_by',auth()->id())->where("cpf","LIKE","%".$search2."%")->paginate(5); 
        }else{
            $list = Termination::where('removed_by',auth()->id())->paginate(20);
            #$list = Termination::where('removed_by',auth()->id())->paginate(20);
        }
        
        return view('show_ex_employees',["list"=>$list])->with('success','Encontrado! ');
    }

    public function store(Request $request){
        
  
        $termination = Termination::create($request->all());
        $employee = Employee::findOrFail($request->id_employee);

        return redirect()->route('delete',$employee);
    

    }

}
