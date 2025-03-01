<?php

namespace App\Http\Controllers;

use App\Models\Goals;
use Illuminate\Http\Request;

class GoalsController extends Controller
{
    public function index(){
        return view('goals_index');
    }

    public function form_goals(){
        return view('create_goals');
    }
    public function show_goals(){
        $list = Goals::where('user_id',auth()->id())->get();
        
        return view('show_goals',["list"=>$list]);
    }

    public function storeGoal(Request $request){

        $validation_goal = Goals::Validated($request->all());
        if($validation_goal->fails()){
            return back()->withErrors($validation_goal)->withInput();
        }

        $goal = new Goals();
        $goal->user_id = auth()->id();
        $goal->name = $request->input('name');
        $goal->description = $request->input('description');
        $goal->start_date = $request->input('start_date');
        $goal->end_date = $request->input('end_date');
        $goal->participants = $request->input('participants');
        $goal->situation = $request->input('situation');

        

        $goal->save();
        session()->flash('success', 'Meta criada com sucesso! ');
        return back()->with('success', 'Meta criada com sucesso! ');
    }

    public function editGoal($id){
        $goal = Goals::where('id',$id)->first(); 
        
        if($goal->user_id != auth()->id()){
            $list = Goals::where('user_id',auth()->id())->get();
            session()->flash('error','Não foi possível alterar esta meta.'  );
            return view('show_goals',["list"=>$list]);
        }
        
                       
        return view('create_goals',["goal"=>$goal]);
    }
    public function updateGoal(Request $request, Goals $goal){
        $validation_goal = Goals::Validated($request->all());
        if($validation_goal->fails()){
            return back()->withErrors($validation_goal)->withInput();
        }
        
        $goal->name = $request->name;
        $goal->description = $request->description;
        $goal->start_date = $request->start_date;
        $goal->end_date = $request->end_date;
        $goal->participants = $request->participants;
        $goal->situation = $request->situation;
        $goal->update();

       # $list = Goals::all();        
        session()->flash('success', 'Meta alterada com sucesso! ');
        #return view("show_goals",["list"=>$list])->with('success', 'Meta alterada com sucesso! ');
        return back()->with('success', 'Meta alterada com sucesso! ');
    }

    public function deleteGoal(Goals $goal){
        $list = Goals::where('user_id',auth()->id())->get();

        if($goal->user_id != auth()->id()){
            
            session()->flash('error','Não foi possível Deletar esta meta.'  );
            return view('show_goals',["list"=>$list]);
        }else{
            $goal->delete();
            
            
            return redirect()->route('show_goals')->with('success','Meta Deletada com sucesso! ');
        }
        
        
        
    }

}
