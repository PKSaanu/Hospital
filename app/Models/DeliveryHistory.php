<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'Patient_ID',
        'Delivery_Hx',
        'Time',
        'Date',
        'Birth_Weight',
        'Gender',
        'ACMN',
    ];
    public function patients()
    {
        return $this->belongsTo(Patient::class, 'Patient_ID', 'id');
    }
}
