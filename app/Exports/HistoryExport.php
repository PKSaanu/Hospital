<?php

namespace App\Exports;

use App\Models\History;
use App\Models\Patient;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HistoryExport implements FromCollection, WithHeadings
{
    protected $histories;

    public function __construct($histories)
    {
        $this->histories = $histories;
    }

    public function collection()
    {
        $data = [];

        foreach ($this->histories as $history) {
            $patient = Patient::find($history->Patient_ID);
            if ($patient){
            $data[] = [
                'PHN' => $patient->PHN,
                'MHx' =>$history-> MHx,
                'FHx' =>$history-> FHx,
                'SHx' =>$history->  SHx,
                'Risk_Factor' => $history-> Risk_Factor,
                'BMI' =>$history->  BMI,               
                'LMP' => $history-> LMP,
                'EDD' =>$history->  EDD,
                'Parity' => $history-> Parity,
                'Past_obs_Hx' => $history-> Past_obs_Hx,
                'Past_obs_complication' => $history-> Past_obs_complication,
            ];}
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [
            'PHN',
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
    }
}
