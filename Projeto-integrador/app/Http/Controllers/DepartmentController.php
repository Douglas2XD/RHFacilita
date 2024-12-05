<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentValidate;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
        $list = Department::paginate(20);
        return view("", ["department"=>new Department(),
                            "list"=>$list]);
    }

    public function store(DepartmentValidate $request){
        $data = $request->validated();
        $department = Department::create($data);
        
        
        return redirect(route("#", $department->id))->with('success', 'Department created successfully!');
    }

    public function edit(Department $department){
        $list = Department::paginate(20);
        return view("#", ["department"=>$department,
                                "list"=>$list]);
    }
    
    public function update(Department $department, DepartmentValidate $request){
        $data = $request->except(['profile_pic', 'curriculum']);
        $department->update($data);

        return back()->with('success', 'Department updated successfully!');
}
}
