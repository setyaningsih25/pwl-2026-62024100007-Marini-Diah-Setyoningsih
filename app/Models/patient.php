<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Patient extends Model
{
      protected $fillable = [
        'patient_code',
        'name',
        'gender',
        'birth_date',
        'phone',
        'address',
    ];

    public function registrations() {
    return $this->hasMany(Registration::class);
}
 
}