<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\CandidateVacancies;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Vacancy;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view("index");
        
    }
    public function login(){
        return view("login");
    }

    public function recrutamento(){
        return view('recrutamento');
    }
    public function processos_seletivos(){
        return view('processos_seletivos');
    }

    public function create_department(){
        return view('create_department');
    }

    public function latest_processes(){
        return view("latest_processes");
    }

    public function show_candidates($id_vancancy){
        
        $candidates_id = DB::table('candidate_vacancies')
                ->where('vacancy_id', $id_vancancy)
                ->pluck('candidate_id'); 
             
        $candidates = Candidate::find($candidates_id);

        $table_name = Vacancy::all()->where('id', $id_vancancy)->first();
        $name = $table_name->title;
        
        return view("show_candidates",["candidates"=>$candidates, "name"=>$name]);
    }
    public function desenvolvimento(){
        return view('ainda_em_desenvolvimento');
    }



}
