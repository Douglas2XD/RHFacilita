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

    public function dashboard(){
        $totalRegistros = Employee::count();
        $vagas_abertas = Vacancy::where('created_by',auth()->id())->count();
        
        $movements = \DB::table('monthly_movements')
        ->where('year', now()->year)
        ->get()
        ->keyBy('month'); // Indexa os resultados pelo mês

    // Cria um array contendo os dados organizados por mês (1 a 12)
    $monthlyData = [];

    for ($month = 1; $month <= 12; $month++) {
        $monthlyData[$month] = [
            'hires' => $movements[$month]->hires ?? 0,
            'terminations' => $movements[$month]->terminations ?? 0,
        ];
    }

    return view('dashboard', [
        'totalRegistros' => $totalRegistros,
        'vagas_abertas' => $vagas_abertas,
        'monthlyData' => $monthlyData, // Passando os dados organizados por mês
    ]);
    }
    public function register_employees(){
        $departments = Department::all();
        return view('register_employee',["departments"=>$departments]);
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

    public function create_department(){
        return view('create_department');
    }

    public function department_info($id){
        $departament = Department::find($id);
        $employees = Employee::where('departament_id',$id)->paginate(20);
        return view('departament_info',["employees"=>$employees,
                                        "departament"=>$departament]);
    }

    public function endomarketing(){
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


            return view('endomarketing', ["employees" => $employees, "next_employees" => $next_employees]);
    }
    private function calculateAge($birthDate)
    {
        $birthDate = new DateTime($birthDate);
        $today = new DateTime();
        $age = $today->diff($birthDate)->y;
        return $age;
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
