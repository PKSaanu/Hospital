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
            padding: 8px;
            text-align: left;
            font-size: 12px;
        }
    </style>
</head>
<body>

<table>
    <thead>
        <tr>
            <th>PHN</th>            
            <th>Name</th>
            <th>NIC No</th>
            <th>Admission Date</th>
            <th>Admission Time</th>
            <th>Blood Group</th>
            <th>Address</th>            
            <th>Phone No</th>
            <th>Age</th>
            <th>Marital Status</th>
            <th>Patient Category</th>
            <th>BHT</th>
        </tr>
    </thead>
    <tbody>
        @foreach($patients as $patient)
            <tr>
                <td>{{ $patient->PHN }}</td>
                <td>{{ $patient->Full_name }}</td>
                <td>{{ $patient->NIC_No }}</td>
                <td>{{ $patient->Admission_Date }}</td>
                <td>{{ $patient->Admission_Time }}</td>
                <td>{{ $patient->BloodGroup }}</td>
                <td>{{ $patient->Address }}</td>
                <td>{{ $patient->Phone_No }}</td>
                <td>{{ $patient->Age }}</td>
                <td>{{ $patient->Marital_Status }}</td>
                <td>{{ $patient->Patient_Category }}</td>
                <td>{{ $patient->BHT }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>