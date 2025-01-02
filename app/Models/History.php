<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $fillable = [
        'Patient_ID',
        'MHx',
        'FHx',
        'SHx',
        'Risk_Factor',
        'BMI',
        'LMP',
        'EDD',
        'Parity',
        'Past_obs_Hx',
        'Past_obs_complication'
    ];
    public function patients()
    {
        return $this->belongsTo(Patient::class, 'Patient_ID', 'id');
    }
}
