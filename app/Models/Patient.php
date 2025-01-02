<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'Admission_Date',
        'Admission_Time',
        'Full_name',
        'BloodGroup',
        'Address',
        'NIC_No',
        'PHN',
        'Phone_No',
        'Age',
        'Marital_Status',
        'Patient_Category',
        'ConsultantID',
        'BHT',
        'Ward_No',
        'Allergies_Drugs',
        'Allergies_Foods',
        'Allergies_Specify',
        'Status'
    ];    
    // Patient.php (Patient model)

    public function pohs()
    {
        return $this->hasMany(Poh::class, 'Patient_ID', 'id');
    }
    public function histories()
    {
        return $this->hasMany(History::class, 'Patient_ID', 'id');
    }
    public function delivery_histories()
    {
        return $this->hasMany(DeliveryHistory::class, 'Patient_ID', 'id');
    }

}
