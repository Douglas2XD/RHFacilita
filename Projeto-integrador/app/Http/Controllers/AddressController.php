<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressValidate;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index(){
        $list = Address::paginate(20);
        return view("#", ["address"=>new Address(),
                            "list"=>$list]);
    }

    public function store(AddressValidate $request){
        $data = $request->validated();

        $address = Address::create($data);
    
        return redirect(route("#", $address->id))->with('success', 'Address created successfully!');
    }

    public function edit(Address $address){
        $list = Address::paginate(20);
        return view("#", ["address"=>$address,
                                "list"=>$list]);
    }
    
    public function update(Address $address, AddressValidate $request){
        $data = $request->except(['profile_pic', 'curriculum']);
        $address->update($data);

        return back()->with('success', 'Address updated successfully!');
    }
}
