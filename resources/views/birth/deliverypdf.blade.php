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
            <th >Delivery Hx</th>
            <th >Time</th>
            <th >Date</th>
            <th >Birth Weight</th>
            <th >Gender</th>
            <th >Any Complaints for Mother and Newborn</th>
        </tr>
    </thead>
    <tbody>
        @foreach($deliveryhistories as $deliveryhistory)
            @php
                    $patient = $patients->where('id', $deliveryhistory->Patient_ID)->first();
            @endphp
        <tr>
            <td>{{ $patient->PHN }}</td>
            <td >{{$deliveryhistory->Delivery_Hx}}</td>
            <td >{{$deliveryhistory->Time}}</td>
            <td >{{$deliveryhistory->Date}}</td>
            <td >{{$deliveryhistory->Birth_Weight}}</td>
            <td >{{$deliveryhistory->Gender}}</td>
            <td >{{$deliveryhistory->ACMN}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>