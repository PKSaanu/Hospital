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
            font-size: 12px;
        }
    </style>
</head>
<body>

<table>
    <thead>
        <tr>
            <th >PHN</th>   
            <th >MHx</th>
            <th >FHx</th>
            <th >SHx</th>
            <th >Risk Factor</th>
            <th >Height & Weight(BMI)</th>
            <th >LMP</th>
            <th >EDD</th>
            <th >Parity</th>
            <th >Past obs Hx</th>
            <th >Past obs complication</th>
        </tr>
    </thead>
    <tbody>
        @foreach($histories as $history)
            @php
                    $patient = $patients->where('id', $history->Patient_ID)->first();
            @endphp
        <tr>
            <td >{{$patient->PHN }}</td>
            <td >{{$history->MHx}}</td>
            <td >{{$history->FHx}}</td>
            <td >{{$history->SHx}}</td>
            <td >{{$history->Risk_Factor}}</td>
            <td >{{$history->BMI}}</td>
            <td >{{$history->LMP}}</td>
            <td >{{$history->EDD}}</td>
            <td >{{$history->Parity}}</td>
            <td >{{$history->Past_obs_Hx}}</td>
            <td >{{$history->Past_obs_complication}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>