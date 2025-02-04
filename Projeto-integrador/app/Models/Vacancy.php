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
                            "benefits",
                            "created_by",
                            "department",
                            "total_vacancies",
                            "pwd_vacancy",
                            "time_work",
                        ];

    public function candidates()
    {
        return $this->belongsToMany(Candidate::class, 'candidate_vacancies', 'vacancy_id', 'candidate_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }



}

