<?php

// app/Exports/PatientsExport.php

namespace App\Exports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PatientsExport implements FromCollection, WithHeadings
{
    protected $patients;

    public function __construct($patients)
    {
        $this->patients = $patients;
    }

    public function collection()
    {
        $data = [];

        foreach ($this->patients as $patient) {
            if ($patient){
            $data[] = [
                'PHN' => $patient->PHN,
                'Full_name' =>$patient-> Full_name,
                'NIC_No' =>$patient-> NIC_No,
                'Admission_Date' =>$patient->  Admission_Date,
                'Admission_Time' => $patient-> Admission_Time,
                'BloodGroup' =>$patient->  BloodGroup,               
                'Address' => $patient-> Address,
                'Phone_No' =>$patient->  Phone_No,
                'Age' => $patient-> Age,
                'Marital_Status' => $patient-> Marital_Status,
                'Patient_Category' => $patient-> Patient_Category,
                'BHT' => $patient-> BHT,
            ];}
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [
            'PHN',
            'Name',
            'NIC No',
            'Admission Date',
            'Admission Time',
            'Blood Group',
            'Address',
            'Phone No',
            'Age',
            'Marital Status',
            'Patient Category',
            'BHT',
        ];
    }
}

