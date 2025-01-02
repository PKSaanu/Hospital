<!DOCTYPE html>
<html>
<head>
    <style>
        /* Add any necessary styles for your PDF */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 2px;
            text-align: left;
            font-size: 8px;
        }
    </style>
</head>
<body>

<table>
    <thead>
        <tr>
            <th>PHN</th>            
            <th>Date</th>
            <th>Visit No</th>
            <th>Complaints</th>
            <th>Blood Pressure</th>
            <th>Pulse Rate</th>            
            <th>Symphysis Fundal Height</th>
            <th>Head</th>
            <th>Other Examination</th>
            <th>FBC-WBC</th>
            <th>FBC-Hb</th>
            <th>FBC-p/t</th>
            <th>UFR-White Cells</th>
            <th>UFR-Red Cells</th>
            <th>UFR-Protein</th>
            <th>SE-K+</th>
            <th>SE-Na+</th>
            <th>CRP</th>
            <th>FBS</th>
            <th>PRBS-AB</th>
            <th>PRBS-AL</th>
            <th>PRBS-AD</th>
            <th>Other Management</th>
            <th>Decisions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($treatments as $treatment)
            @php
                $patient = $patients->where('id', $treatment->Patient_ID)->first();
            @endphp
            <tr>
                <td>{{ $patient->PHN }}</td>
                <td>{{ $treatment->Date }}</td>
                <td>{{ $treatment->Visit_No }}</td>
                <td>{{ $treatment->Basic_Complaint }}<br> {{ $treatment->Complaints }}</td>
                <td>{{ $treatment->Exam_Blood }}</td>
                <td>{{ $treatment->Exam_Pulse }}</td>
                <td>{{ $treatment->Symphysis_fundal_height }}</td>
                <td>{{ $treatment->Head }}<br>{{ $treatment->Head2 }}</td>
                <td>{{ $treatment->Exam_Other }}</td>
                <td>{{ $treatment->Manage_WBC }}</td>
                <td>{{ $treatment->Manage_Hb }}</td>
                <td>{{ $treatment->Manage_p_t }}</td>
                <td>{{ $treatment->Manage_WhiteCells }}</td>
                <td>{{ $treatment->Manage_Redcells }}</td>
                <td>{{ $treatment->Manage_Protein }}</td>
                <td>{{ $treatment->Manage_K }}</td>
                <td>{{ $treatment->Manage_Na }}</td>
                <td>{{ $treatment->Manage_CRP }}</td>
                <td>{{ $treatment->Manage_FBS }}</td>
                <td>{{ $treatment->Manage_AB }}</td>
                <td>{{ $treatment->Manage_AL }}</td>
                <td>{{ $treatment->Manage_AD }}</td>
                <td>{{ $treatment->Manage_Other }}</td>
                <td>{{ $treatment->Basic_Decision }}<br> {{ $treatment->Decisions }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>