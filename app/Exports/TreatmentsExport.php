<?php
namespace App\Exports;

use App\Models\Treatment;
use App\Models\Patient;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TreatmentsExport implements FromCollection, WithHeadings
{
    protected $treatments;

    public function __construct($treatments)
    {
        $this->treatments = $treatments;
    }

    public function collection()
    {
        $data = [];

        foreach ($this->treatments as $treatment) {
            $patient = Patient::find($treatment->Patient_ID);
            if ($patient){
            $data[] = [
                'PHN' => $patient->PHN,
                'Date' => $treatment->Date,
                'Visit No' => $treatment->Visit_No,
                'Complaints' => $treatment->Basic_Complaint . "\n" . $treatment->Complaints,
                'Blood Pressure' => $treatment->Exam_Blood,
                'Pulse Rate' => $treatment->Exam_Pulse,
                'Symphysis Fundal Height' => $treatment->Symphysis_fundal_height,
                'Head' => $treatment->Head . "\n" . $treatment->Head2,
                'Other Examination' => $treatment->Exam_Other,
                'FBC-WBC' => $treatment->Manage_WBC,
                'FBC-Hb' => $treatment->Manage_Hb,
                'FBC-p/t' => $treatment->Manage_p_t,
                'UFR-White Cells' => $treatment->Manage_WhiteCells,
                'UFR-Red Cells' => $treatment->Manage_Redcells,
                'UFR-Protein' => $treatment->Manage_Protein,
                'SE-K+' => $treatment->Manage_K,
                'SE-Na+' => $treatment->Manage_Na,
                'CRP' => $treatment->Manage_CRP,
                'FBS' => $treatment->Manage_FBS,
                'PRBS-AB' => $treatment->Manage_AB,
                'PRBS-AL' => $treatment->Manage_AL,
                'PRBS-AD' => $treatment->Manage_AD,
                'Other Management' => $treatment->Manage_Other,
                'Decisions' => $treatment->Basic_Decision . "\n" . $treatment->Decisions,
            ];}
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [
            'PHN',       
            'Date',
            'Visit No',
            'Complaints',
            'Blood Pressure',
            'Pulse Rate',        
            'Symphysis Fundal Height',
            'Head',
            'Other Examination',
            'FBC-WBC',
            'FBC-Hb',
            'FBC-p/t',
            'UFR-White Cells',
            'UFR-Red Cells',
            'UFR-Protein',
            'SE-K+',
            'SE-Na+',
            'CRP',
            'FBS',
            'PRBS-AB',
            'PRBS-AL',
            'PRBS-AD',
            'Other Management',
            'Decisions',
        ];
    }
}
