<?php

namespace App\Exports;

use App\Models\Poh;
use App\Models\Patient;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PohExport implements FromCollection, WithHeadings
{
    protected $pohs;

    public function __construct($pohs)
    {
        $this->pohs = $pohs;
    }

    public function collection()
    {
        $data = [];

        foreach ($this->pohs as $poh) {
            $patient = Patient::find($poh->Patient_ID);
            if ($patient){
            $data[] = [
                'PHN' => $patient->PHN,
                'pregnancy' =>$poh-> pregnancy,
                'antenatal_complications' =>$poh-> antenatal_complications,
                'place_of_delivery' =>$poh->  place_of_delivery,
                'mode_of_delivery' => $poh-> mode_of_delivery,
                'outcome' =>$poh->  outcome,               
                'birth_weight' => $poh-> birth_weight,
                'postnatal_complication' =>$poh->  postnatal_complication,
                'sex' => $poh-> sex,
                'age' => $poh-> age,
            ];}
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [
            'PHN',       
            'Pregnancy',
            'Antenatal_complications',
            'Place_of_delivery',
            'Mode_of_delivery',
            'Outcome',
            'Birth_weight',
            'Postnatal_complication',
            'Sex',
            'Age'
        ];
    }
}
