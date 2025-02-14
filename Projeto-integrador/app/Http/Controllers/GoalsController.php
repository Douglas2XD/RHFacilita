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
        $list = Goals::all();
        
        return view('show_goals',["list"=>$list]);
    }

    public function store(Request $request){
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

    public function edit($id){
        $goal = Goals::where('id',$id)->first();                
        return view('create_goals',["goal"=>$goal]);
    }
    public function update(Request $request, Goals $goal){
        
        $goal->user_id = auth()->id();
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

    public function delete(Goals $goal){
        $goal->delete();

        $list = Goals::all();
        
        return view('show_goals',["list"=>$list]);
    }

}
