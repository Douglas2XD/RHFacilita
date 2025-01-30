<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\CandidateVacancies;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VacancyController extends Controller
{

    public function index(){
        $id = auth()->id();
        $list = Vacancy::where('created_by',$id)->paginate(20);
        return view("latest_processes", ["vacancy"=>new Vacancy(),
                            "list"=>$list]);
        
        
    }

    public function store(Request $request){  
        $id = auth()->id();
        
        $request->validate([
            'title' => 'required|string|max:255', // Título obrigatório, string e até 255 caracteres
            'description' => 'required|string|max:1000', // Descrição obrigatória, string e até 1000 caracteres
            'requirements' => 'nullable|string|max:1000', // Requisitos opcional, string e até 1000 caracteres
            'remuneration' => 'required|string|max:255', // Remuneração obrigatória, string e até 255 caracteres
            'contract_type' => 'required|string|max:100', // Tipo de contrato obrigatório, string e até 100 caracteres
            'location' => 'required|string|max:255', // Localização obrigatória, string e até 255 caracteres
            'benefits' => 'nullable|string|max:1000', // Benefícios opcional, string e até 1000 caracteres
        ], [
            'title.required' => 'O campo título é obrigatório.',
            'title.string' => 'O título deve ser um texto válido.',
            'title.max' => 'O título não pode ter mais de 255 caracteres.',
            'description.required' => 'A descrição é obrigatória.',
            'description.string' => 'A descrição deve ser um texto válido.',
            'description.max' => 'A descrição não pode ter mais de 1000 caracteres.',
            'requirements.string' => 'Os requisitos devem ser um texto válido.',
            'requirements.max' => 'Os requisitos não podem ter mais de 1000 caracteres.',
            'remuneration.required' => 'O campo remuneração é obrigatório.',
            'remuneration.string' => 'A remuneração deve ser um texto válido.',
            'remuneration.max' => 'A remuneração não pode ter mais de 255 caracteres.',
            'contract_type.required' => 'O tipo de contrato é obrigatório.',
            'contract_type.string' => 'O tipo de contrato deve ser um texto válido.',
            'contract_type.max' => 'O tipo de contrato não pode ter mais de 100 caracteres.',
            'location.required' => 'A localização é obrigatória.',
            'location.string' => 'A localização deve ser um texto válido.',
            'location.max' => 'A localização não pode ter mais de 255 caracteres.',
            'benefits.string' => 'Os benefícios devem ser um texto válido.',
            'benefits.max' => 'Os benefícios não podem ter mais de 1000 caracteres.',
        ]);
        
        $vacancy = new Vacancy();
        $vacancy->created_by = $id;
        $vacancy->description = $request->input('description');
        $vacancy->title = $request->input('title');
        $vacancy->requirements = $request->input('requirements');
        $vacancy->remuneration = $request->input('remuneration');
        $vacancy->contract_type = $request->input('contract_type');
        $vacancy->location = $request->input('location');
        $vacancy->benefits = $request->input('benefits');
        $vacancy->save();


        #$vacancy = Vacancy::create($request->all());
        
        session()->flash('success', 'Vaga Criada com sucesso!');
        #return redirect(route('edit_vacancy',$vacancy->id));
        return back()->with('success', 'Dados inseridos com sucesso!');
        
    }

    public function edit(Vacancy $vacancy)
    {
        $list = Vacancy::paginate(20);

        if ($vacancy->created_by != auth()->id()) { 
            return redirect()->route('latest_processes')->with('error', 'Você não tem permissão para editar esta vaga.');
        }


        return view("create_job_vacancy", [
            "vacancy"=>$vacancy,
            "list" => $list
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
