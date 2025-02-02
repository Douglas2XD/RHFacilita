<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termination extends Model
{
    protected $table = 'terminations';
    protected $fillable = [
        'removed_by',
        'name',
        'cpf',
        'email',
        'name_department',
        'position',
        'salary',
        'hire_date',
        'dismissal_date', 
        'reason',
        'notice_period',
        'comments',
        'materials_returned',
        'documents_returned',
    ];
    public function removedBy()
    {
        return $this->belongsTo(User::class, 'removed_by');
    }
}
