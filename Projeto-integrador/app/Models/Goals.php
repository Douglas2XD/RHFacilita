<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goals extends Model
{
    use HasFactory;
    protected $filablle = [ "name",
                            "situation",
                            "description",
                            "start_date",
                            "end_date",
                            "participants",
                            
];

public function user(){
    return $this->belongsTo(User::class,'user_id');
}

}
