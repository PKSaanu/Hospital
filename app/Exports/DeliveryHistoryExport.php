<?php

namespace App\Exports;

use App\Models\DeliveryHistory;
use App\Models\Patient;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DeliveryHistoryExport implements FromCollection, WithHeadings
{
    protected $delivey_histories;

    public function __construct($delivey_histories)
    {
        $this->delivey_histories = $delivey_histories;
    }

    public function collection()
    {
        $data = [];

        foreach ($this->delivey_histories as $delivey_history) {
            $patient = Patient::find($delivey_history->Patient_ID);
            if ($patient){
            $data[] = [
                'PHN' => $patient->PHN,
                'Delivery_Hx' =>$delivey_history-> Delivery_Hx,
                'Time' =>$delivey_history-> Time,
                'Date' =>$delivey_history->  Date,
                'Birth_Weight' => $delivey_history-> Birth_Weight,
                'Gender' =>$delivey_history->  Gender,               
                'ACMN' => $delivey_history-> ACMN,
            ];
        }
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [
            'PHN',
            'Delivery_Hx',
            'Time',
            'Date',
            'Birth_Weight',
            'Gender',
            'ACMN',
        ];
    }
}
