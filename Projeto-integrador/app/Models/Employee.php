<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_pic',
        'curriculum',
        'name',
        'cpf',
        'rg',
        'birth_date',
        'email',
        'phone',
        'gender',
        'marital_status',
        'children',
        'pwd',
        'address_id',
    ];
    
    public function address()
{
    return $this->hasOne(Address::class);
}
    
}


