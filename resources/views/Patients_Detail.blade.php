@extends('layout')
@section('content')

@if ($message = Session::get('success'))
        <div id="success-msg" class="alert alert-success">
            <p>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cloud-check" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                    <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                </svg>&ensp;<strong>{{$message}}</strong>
            </p>
        </div>
        <script>
            setTimeout(function() {
                $('#success-msg').fadeOut('fast');
            }, 3000); // Delay the fade out by 3 seconds
        </script>
@endif
<div class="container">
        <div style="display:flex; flex-direction:row">
            <!--
        <form action="{{ route('patients') }}" class="col-md-6">
                <div class="input-group" >
                <div class="form-outline">
                    <div class="input-group">
                    <input type="search"  name="search" id="search" class="form-control" style="width:500px" placeholder="Search with Name/NIC/PHT here ..." />
                    <button type="submit" class="btn btn-secondary" >
                            <lord-icon
                                src="https://cdn.lordicon.com/msoeawqm.json"
                                trigger="hover"
                                stroke="100"
                                colors="primary:#ffffff,,secondary:#ffffff"
                                style="width:25px;height:25px">
                            </lord-icon>
                    </button>&ensp;

                    <button type="button" class="btn btn-secondary" onclick="redirectToPatients()">
                        <lord-icon
                            src="https://cdn.lordicon.com/nxooksci.json"
                            trigger="hover"
                            colors="primary:#ffffff"
                            style="width:25px;height:25px">
                        </lord-icon>
                    </button>&ensp;

                    </div>
                </div>
            </div>

            <script>
                function redirectToPatients() {
                window.location.href = "{{ route('patients') }}";
                }
                
            </script>
        </form>
            -->
        @if(auth()->user()->role === 'superadmin')
        <div class="justify-content-end">
            <div role="group" aria-label="Basic radio toggle button group" >
                <a class="btn btn-outline-primary" id="bluebutton" style="background-color:#9DB2BF; font-weight:bold; box-shadow: 0 0 8px 0 #000000" role="button" href="{{route('admittedView')}}">Admitted Patients</a>
                <a class="btn btn-outline-danger" id="colorbutton" style="font-weight:bold; background-color:#9DB2BF; box-shadow: 0 0 8px 0 #000000" role="button" href="{{route('dischargedView')}}">Discharged Patients</a>
            </div>
        </div>

        @endif
        </div>

        <br><br>

        <table class="table table-hover table-container table-responsive table-striped" id="tablep">

            <thead>
                <tr>
                    <th >No.</th>
                    <th >Full Name</th>
                    <th >PHN</th>
                    <th >BHT</th>
                    <th >Blood Group</th>
                    <th >Age</th>
                    <th >Phone No.</th>
                    <th >Action</th>
                </tr>
            </thead>
                <script>
                    var tableHead = document.querySelector('thead');
                    var tableBody = document.querySelector('tbody');
                    tableBody.style.marginTop = tableHead.offsetHeight + 'px';
                </script>

            @php($i=0)
            @foreach($patients as $patient)
            
            <tr class="hover-row" hover="color:white">
                <td >{{++$i}}</td>
                <td class="truncate-text" >{{$patient->Full_name}}</td>
                <td >{{$patient->PHN}}</td>
                <td >{{$patient->BHT}}</td>
                <td >{{$patient->BloodGroup}}</td>
                <td >{{$patient->Age}}</td>
                <td >{{$patient->Phone_No}}</td>
                <td >   <a role="button" class="btn btn-success" style="font-weight:bold; margin-bottom:5px" href="{{ route ('patient.show',$patient->id) }}" >View</a> &ensp;
                        <a role="button" class="btn btn-info" style="font-weight:bold; margin-bottom:5px" href="{{route('patient.edit',$patient->id) }}" > Edit</a>
                </td>
            </tr>
            @endforeach

        </table>
</div>

<script>
    $(document).ready(function() {
        $('.truncate-text').each(function() {
            var text = $(this).text();
            var maxLength = 20; // Maximum length before truncation
            if (text.length > maxLength) {
                var truncatedText = text.substring(0, maxLength) + '...';
                $(this).text(truncatedText);
            }
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script>	
new DataTable('#tablep');
</script>


@endsection