<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\Candidate;
use App\Models\CandidateVacancies;
use App\Models\Department;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class VacancyController extends Controller
{


    public function create_job_vacancy(){
        $departments = Department::all()->where('created_by',auth()->id());

        return view('create_job_vacancy',['departments'=>$departments]);
    }

    public function index(){
        
        $id = auth()->id();
        $list = Vacancy::where('created_by',$id)->paginate(5);
        return view("latest_processes", ["vacancy"=>new Vacancy(),
                            "list"=>$list,]);
        
        
    }

    public function store(Request $request){  
        $id = auth()->id();
        
        $validated_vacancy = Vacancy::Validated($request->all());
        if($validated_vacancy->fails()){
            return back()->withErrors($validated_vacancy)->withInput();
        }

        $vacancy = new Vacancy();
        $vacancy->created_by = $id;
        $vacancy->description = $request->input('description');
        $vacancy->title = $request->input('title');
        $vacancy->requirements = $request->input('requirements');
        $vacancy->remuneration = $request->input('remuneration');
        $vacancy->contract_type = $request->input('contract_type');
        $vacancy->location = $request->input('location');
        $vacancy->benefits = $request->input('benefits');
        $vacancy->department = $request->input('department');
        $vacancy->total_vacancies = $request->input('total_vacancies');
        $vacancy->pwd_vacancy = $request->input('pwd_vacancy');
        $vacancy->time_work = $request->input('time_work');

        $vacancy->save();

        session()->flash('success', 'Vaga Criada com sucesso!');
        #return redirect(route('edit_vacancy',$vacancy->id));
        return back()->with('success', 'Dados inseridos com sucesso!');
        
    }

    public function edit(Vacancy $vacancy)
    {
        $list = Vacancy::paginate(20);
        $departments = Department::all()->where('created_by',auth()->id());
        if ($vacancy->created_by != auth()->id()) { 
            return redirect()->route('latest_processes')->with('error', 'Você não tem permissão para editar esta vaga.');
        }


        return view("create_job_vacancy", [
            "vacancy"=>$vacancy,
            "list" => $list,
            "departments"=>$departments
        ]);
    }

    public function update(Vacancy $vacancy,Request $request){
        $vacancy->update($request->all());
        session()->flash('success', 'Dados editados com sucesso!');
        return back()->with('success', 'Vaga alterada com sucesso!');
    }


    public function delete(Vacancy $vacancy){

        if ($vacancy->created_by != auth()->id()) { 
            return redirect()->route('latest_processes')->with('error', 'Você não tem permissão para deletar esta vaga.');
        }

        $candidateVacancyIds = CandidateVacancies::where('vacancy_id', $vacancy->id)->pluck('candidate_id');

        CandidateVacancies::where('vacancy_id', $vacancy->id)->delete();
        
        Candidate::whereIn('id', $candidateVacancyIds)->delete();

        $vacancy->delete();
        
        #return redirect(route('new_process'))->with('sucess',"Vaga deletada com sucesso! ");
        return back()->with('success', 'Vaga deletada com sucesso!');
        
    }
}
