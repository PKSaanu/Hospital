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
            <th >Pregnancy</th>
            <th >Antenatal complications</th>
            <th >Mode of Delivery</th>
            <th >Outcome</th>
            <th >Birth weight (g)</th>
            <th >Postnatal complication (Specify)</th>
            <th >Sex</th>
            <th >Age</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pohs as $poh)
            @php
                    $patient = $patients->where('id', $poh->Patient_ID)->first();
            @endphp
        <tr>
            <td >{{$patient->PHN }}</td>
            <td >{{$poh->pregnancy}}</td>
            <td >{{$poh->antenatal_complications}}</td>
            <td >{{$poh->mode_of_delivery}}</td>
            <td >{{$poh->outcome}}</td>
            <td >{{$poh->birth_weight}}</td>
            <td >{{$poh->postnatal_complication}}</td>
            <td >{{$poh->sex}}</td>
            <td >{{$poh->age}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>