<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\TerminationController;
use App\Http\Controllers\VacancyController;
use App\Models\Termination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('index');
});
*/
Auth::routes();

Route::middleware(['auth'])->group(function () {

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name(name: 'index');

Route::get('/register_employees/new', [EmployeeController::class, "index"])->name('new');

Route::post('/register_employees', [EmployeeController::class, "store"])->name('store');

Route::get('/register_employees/{employee}', [EmployeeController::class, "edit"])->name('edit');

Route::put('/register_employees/{employee}', [EmployeeController::class, "update"])->name('update');

Route::get('/register_employees/delete/{employee}', [EmployeeController::class, "delete"])->name('delete');


Route::post('/termination', [TerminationController::class, "store"])->name('store_termination');
Route::get('/termination/index/{employee}', [TerminationController::class, "index"])->name('analisar_demissao');
Route::get('/termination/delete/{employee}', [TerminationController::class, "delete"])->name('delete_employee');
Route::get('/termination/show_ex_employees', [TerminationController::class, "show"])->name('show_ex_employees');


Route::get('/register_employees', [App\Http\Controllers\EmployeeController::class, 'register_employees'])->name(name: 'register_employees');

Route::get('/recrutamento', [App\Http\Controllers\HomeController::class, 'recrutamento'])->name(name: 'recrutamento');

Route::get('/processos_seletivos', [App\Http\Controllers\HomeController::class, 'processos_seletivos'])->name(name: 'processos_seletivos');

Route::get('/show_employees', [App\Http\Controllers\EmployeeController::class, 'index'])->name(name: 'show_employees');

Route::get('/create_department',[App\Http\Controllers\HomeController::class, 'create_department'])->name(name: 'create_department');
Route::get('/department',[App\Http\Controllers\DepartmentController::class, 'index'])->name(name: 'show_departments');

Route::post('/store_department', [App\Http\Controllers\DepartmentController::class, "store"])->name('store_department');

Route::get('/edit_department/{employee}', [App\Http\Controllers\DepartmentController::class, "edit"])->name('edit_department');

Route::put('/update_department/{employee}', [App\Http\Controllers\DepartmentController::class, "update"])->name('update_department');

Route::get('/department_info/{department}', [App\Http\Controllers\DepartmentController::class, 'department_info'])->name(name: 'department_info');

Route::get('/department/delete/{department}', [App\Http\Controllers\DepartmentController::class, 'delete'])->name(name: 'delete_departament');


Route::get('/create_job_vacancy', [App\Http\Controllers\VacancyController::class, 'create_job_vacancy'])->name(name: 'create_job_vacancy');

Route::get('/endomarketing', [App\Http\Controllers\HomeController::class, 'endomarketing'])->name(name: 'endomarketing');


//rotas das vagas

Route::post('/create_job_vacancy', [VacancyController::class, "store"])->name('store_vacancy');

Route::get('/latest_processes', [VacancyController::class, "index"])->name('latest_processes');

Route::get('/show_candidates/{id_vancancy}', [HomeController::class, "show_candidates"])->name('show_candidates');

Route::get('/show_all_candidates', [HomeController::class, "show_all_candidates"])->name('show_all_candidates');


Route::get('/latest_processes/delete/{vacancy}', [VacancyController::class, "delete"])->name('delete_vacancy');

Route::get('/latest_processes/new_process', [VacancyController::class, "index"])->name('new_process');

Route::get('/create_job_vacancy/{vacancy}', [VacancyController::class, "edit"])->name('edit_vacancy');

Route::put('/create_job_vacancy/{vacancy}', [VacancyController::class, "update"])->name('update_vacancy');



Route::get('/ainda_em_desenvolvimento', [HomeController::class, "desenvolvimento"])->name('ainda_em_desenvolvimento');


Route::get('/home', [HomeController::class,"index"])->name('home');
});

Route::get('/candidate_portal', [CandidateController::class, "index"])->name('candidate_portal');

Route::post('/candidate_portal', [CandidateController::class, "create"])->name('create_candidate');

Route::get('/candidate_portal/contract_type', [CandidateController::class, "freelancer"])->name('freelancer');
Route::get('/candidate_portal/jovem_aprendiz', [CandidateController::class, "jovem_aprendiz"])->name('jovem_aprendiz');
Route::get('/candidate_portal/estagio', [CandidateController::class, "estagio"])->name('estagio');
Route::get('/candidate_portal/pwd_vacancy', [CandidateController::class, "pwd_vacancy"])->name('pwd_vacancy');



Route::get('/', [HomePageController::class,"index"])->name('home_page');

