<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_type',
        'service_date',
        'duration',
        'result',
        'description',
        'notes',
    ];

    public function serviceRecords()
    {
        return $this->hasMany(ServiceRecord::class);
    }
}
