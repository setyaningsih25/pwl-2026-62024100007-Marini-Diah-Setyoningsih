<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    protected $fillable = [
        'doctor_code',
        'name',
        'specialization',
        'phone',
        'is_active',
        'poli_id', 
    ];

public function poli()
{
    return $this->belongsTo(Poli::class);
}
public function registrations() {
    return $this->hasMany(Registration::class);
}
}