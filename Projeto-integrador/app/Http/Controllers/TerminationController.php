<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Termination;
use Illuminate\Http\Request;

class TerminationController extends Controller
{   

    public function index(Employee $employee){
        return view('termination',["employee"=>$employee]);
    }

    public function show(){
        $search = request("search");
        $search2 = request("search2");


        if($search){
            $list = Termination::where('removed_by',auth()->id())->where("name","LIKE","%".$search."%")->paginate(5);
        }else if($search2){
            $list = Termination::where('removed_by',auth()->id())->where("cpf","LIKE","%".$search2."%")->paginate(5);
        }else{
            $list = Termination::where('removed_by',auth()->id())->paginate(20);
        }

        return view('show_ex_employees',["list"=>$list]);
    }

    public function store(Request $request){
        
  
        $termination = Termination::create($request->all());
        $employee = Employee::findOrFail($request->id_employee);

        return redirect()->route('delete',$employee);
    

    }

}
