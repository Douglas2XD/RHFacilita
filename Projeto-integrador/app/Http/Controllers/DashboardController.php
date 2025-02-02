<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Vacancy;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{   
    #esta func inicia a tabela 'monthly_movements' ao criar um novo usuario.
    
    public function dashboard(){

        $totalRegistros = Employee::where('add_by',auth()->id())->count();
        $vagas_abertas = Vacancy::where('created_by',auth()->id())->count();
        
        $movements = DB::table('monthly_movements')
        ->where('year', now()->year)
        ->where('user_id',auth()->id())
        ->get()
        ->keyBy('month'); 

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

    public static function hire($userId){
        $year = now()->year;
        $month = now()->month;    


        $exists = DB::table('monthly_movements')
                            ->where('user_id', $userId)
                            ->where('year', $year)
                            ->where('month', $month)
                            ->exists();

        if($exists){
            DB::table('monthly_movements')
            ->where('user_id', $userId) 
            ->where('year', $year)
            ->where('month', $month)
            ->update(['hires' => DB::raw('hires + 1')]);
        }else{
            DB::table('monthly_movements')->insert([
                'user_id' => $userId,
                'year' => $year,
                'month' => $month,
                'hires' => 1
            ]);
        }

        
        
    }

    public static function termination($userId){
        $year = now()->year;
        $month = now()->month;

        $exists = DB::table('monthly_movements')
                    ->where('user_id', $userId)
                    ->where('year', $year)
                    ->where('month', $month)
                    ->exists();
        if ($exists){
            DB::table('monthly_movements')
            ->where('user_id', $userId) 
            ->where('year', $year)
            ->where('month', $month)
            ->update(['terminations' => DB::raw('terminations + 1')]);
        }else{
            DB::table('monthly_movements')->insert([
                'user_id' => $userId,
                'year' => $year,
                'month' => $month,
                'terminations' => 1
            ]);

        }

       
    }
}
