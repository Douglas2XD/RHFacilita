<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(Request $request) {
                    
        return view("index");

            
        #return  view('auth.login');
        
    }
}
