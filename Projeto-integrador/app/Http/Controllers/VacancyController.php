<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{

    public function index(){
    
        $list = Vacancy::paginate(20);
        return view("latest_processes", ["vacancy"=>new Vacancy(),
                            "list"=>$list]);
        
        
    }

    public function store(Request $request){       
        $vacancy = Vacancy::create($request->all());
        session()->flash('success', 'Vaga Criada com sucesso!');
        return back()->with('sucess','Vaga Criada com sucesso! ');
    }

    public function delete(Vacancy $vacancy){
        $vacancy->delete();
        session()->flash('success', 'Vaga deletada com sucesso!');
        return redirect(route('new_process'))->with('sucess',"Vaga deletada com sucesso! ");
        
    }
}
