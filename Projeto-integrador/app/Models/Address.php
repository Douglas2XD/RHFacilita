<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = "address";
    protected $fillable = [
        'employee_id',
        'cep', 
        'street', 
        'number',
        'city', 
        'state'
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    

}
