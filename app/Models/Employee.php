<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $appends = ['full_name', 'department', 'position'];

    protected $fillable = [
        'user_id', 
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'hire_date',
        'status',
    ];

    public function serviceRecords()
    {
        return $this->hasMany(ServiceRecord::class);
    }

    public function latestServiceRecord(){
        return $this->hasOne(ServiceRecord::class)->latest('date_from');
    }

    protected function department() : Attribute
    {
        return Attribute::make(
            get : fn() => $this->latestServiceRecord->department->name
        );
    }

    protected function position() : Attribute
    {
        return Attribute::make(
            get : fn() => $this->latestServiceRecord->position
        );
    }


    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->first_name . ' ' . $this->last_name,
        );
    }
}

