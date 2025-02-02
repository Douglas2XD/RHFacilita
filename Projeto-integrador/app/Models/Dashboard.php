<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $table = 'monthly_movements';
    protected $filablle  =  ['hires',
                            'termination',
                            'user_id'];


    public function addedBy()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}

