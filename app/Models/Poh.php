<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poh extends Model
{
    use HasFactory;
    protected $fillable = [
        'Patient_ID',
        'pregnancy',
        'antenatal_complications',
        'place_of_delivery',
        'mode_of_delivery',
        'outcome',
        'birth_weight',
        'postnatal_complication',
        'sex',
        'age'
    ];
    // Poh.php (Poh model)

    public function patients()
    {
        return $this->belongsTo(Patient::class, 'Patient_ID', 'id');
    }
   
}

