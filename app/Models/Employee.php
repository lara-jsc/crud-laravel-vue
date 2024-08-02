<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'user_id', 
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'hire_date',
        'position',
        'department',
        'status',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

