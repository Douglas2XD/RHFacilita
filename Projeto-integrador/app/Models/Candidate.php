<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $table = "candidate";
    protected $fillable = [
        'name',
        'email',
        'pdf_candidate'
    ];

    public function vacancies(){
        return $this->belongsToMany(Vacancy::class, "candidate_vacancies");
    }

}
