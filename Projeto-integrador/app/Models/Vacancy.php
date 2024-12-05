<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $fillable = [ "title",
                            "description",
                            "requirements",
                            "remuneration",
                            "contract_type",
                            "location",
                            "benefits"];

    public function candidates()
    {
        return $this->belongsToMany(Candidate::class, 'candidate_vacancies', 'vacancy_id', 'candidate_id');
    }
}

