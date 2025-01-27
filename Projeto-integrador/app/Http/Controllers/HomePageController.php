<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(Request $request) {
        
        if(session("status")){
            return view('index');
        }
        else{
            return redirect()->route('home');
        }
    }

    

}
