<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\CandidateVacancies;
use App\Models\Employee;
use App\Models\Vacancy;
use DateTime;
use Illuminate\Http\Request;
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
    public function dashboard(){
    $totalRegistros = Employee::count();
    $vagas_abertas = Vacancy::count();

        return view('dashboard',["totalRegistros"=>$totalRegistros,"vagas_abertas"=>$vagas_abertas]);
    }
    public function register_employees(){
        return view('register_employee');
    }

    public function recrutamento(){
        return view('recrutamento');
    }
    public function processos_seletivos(){
        return view('processos_seletivos');
    }
    public function create_job_vacancy(){
        return view('create_job_vacancy');
    }
    public function endomarketing(){
        $this_month = date('m');
        $next_month = (new DateTime())->modify('+1 month')->format('m');

        $employees = Employee::whereMonth('birth_date', $this_month)->get();
        
        $next_employees = Employee::whereMonth('birth_date', $next_month)->get();

        
        return view('endomarketing',["employees"=>$employees, "next_employees"=>$next_employees]);
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

    public function show_all_candidates(){
        $candidates = Candidate::all(); 
        
        return view("show_all_candidates",["candidates"=>$candidates]);
    }

    public function desenvolvimento(){
        return view('ainda_em_desenvolvimento');
    }



}
