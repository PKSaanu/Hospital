@extends('patient_layout',['patient'=>$patient])
@section('content1')

@php
  $treatmentCount = count($treatments);
@endphp

<br>
        @php
        $firstTreatment = $treatments->first();
        @endphp
@if($treatmentCount < 3)
<div class="row row-cols-4 row-cols-md-5 mb-6 text-center">
<div class="col" style="width:24%" >
@if($patient->Status !== 'Discharged')
<a type="button" id="visit" class="btn btn-outline-primary" style="border-radius:20px; box-shadow: 0 0 5px 0 #241468" href="{{route('subvisit',['date' => $firstTreatment->Date, 'patient_id' => $firstTreatment->Patient_ID,'visit'=>$treatmentCount+1])}}">
<lord-icon
    src="https://cdn.lordicon.com/hdiorcun.json"
    trigger="hover"
    colors="primary:#3080e8,secondary:#3080e8"
    style="width:30%;height:40px">
</lord-icon>
<div style="font-weight:bold; margin-top:6%">+Add Visit</div>
</a>
@endif

</div>
</div>
<br>
@endif

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
            }, 1500); // Delay the fade out by 3 seconds
        </script>
@endif

<div class="treatments-container">
    @foreach($treatments as $treatment)
    <div class="treatment-card" style="box-shadow: 0 0 8px 0 #241468">
        <div class="p-2" style="font-weight:bold; margin-left:2.8%; margin-right:2.8%; background: linear-gradient(90deg, rgba(184,184,189,1) 33%, rgba(152,152,161,1) 48%, rgba(42,43,43,1) 100%); border-radius:5px">Visit {{$treatment->Visit_No}}  Details</div>
        <div class="p-2" style="margin-left:2.8%">
        <label>Date:</label> {{$treatment->Date}}<br>
        <label>Visit No.:</label> {{$treatment->Visit_No}}<br>
        <label>Staff's Name:</label> {{$treatment->Staff_Name}}<br>
        </div>

        <div class="p-2" style="font-weight:bold; margin-left:2.8%; margin-right:2.8%; background:#d9d9db; border-radius:5px">Complaints</div>
        <div class="p-2" style="margin-left:2.8%"> 
        {{$treatment->Basic_Complaint}}, {{$treatment->Complaints}}<br>
        </div>

        <div class="p-2" style="font-weight:bold; margin-left:2.8%; margin-right:2.8%; background:#d9d9db; border-radius:5px">Examination</div>
        <div class="p-2" style="margin-left:2.8%">
        <label>Blood Pressure:</label> {{$treatment->Exam_Blood}}<br>
        <label>Pulse Rate:</label> {{$treatment->Exam_Pulse}}<br>
        <label>Symphysis Fundal Height:</label>{{$treatment->Symphysis_fundal_height}}<br>
        <label>Head:</label> {{$treatment->Head}}, {{$treatment->Head2}}/5<br>
        <label>Other Examination:</label> {{$treatment->Exam_Other}}<br>
        </div>

        <div class="p-2" style="font-weight:bold; margin-left:2.8%; margin-right:2.8%; background:#d9d9db; border-radius:5px">Management</div>
        <div class="p-2" style="margin-left:2.8%">
        <label>FBC-WBC:</label> {{$treatment->Manage_WBC}}<br>
        <label>FBC-Hb:</label> {{$treatment->Manage_Hb}}<br>
        <label>FBC-p/t:</label> {{$treatment->Manage_p_t}}<br>
        <label>UFR-White Cells:</label> {{$treatment->Manage_WhiteCells}}<br>
        <label>UFR-Red Cells:</label> {{$treatment->Manage_Redcells}}<br>
        <label>UFR-Protein:</label> {{$treatment->Manage_Protein}}<br>
        <label>SE-K+:</label> {{$treatment->Manage_K}}<br>
        <label>SE-Na+:</label> {{$treatment->Manage_Na}}<br>
        <label>CRP:</label> {{$treatment->Manage_CRP}}<br>
        <label>FBS:</label> {{$treatment->Manage_FBS}}<br>
        <label>PRBS-AB:</label> {{$treatment->Manage_AB}}<br>
        <label>PRBS-AL:</label> {{$treatment->Manage_AL}}<br>
        <label>PRBS-AD:</label> {{$treatment->Manage_AD}}<br>
        <label>Other Management:</label> {{$treatment->Manage_Other}}<br>
        </div>

        <div class="p-2" style="font-weight:bold; margin-left:2.8%; margin-right:2.8%; background:#d9d9db; border-radius:5px">Decisions</div>
        <div class="p-2" style="margin-left:2.8%">
        {{$treatment->Basic_Decision}}, {{$treatment->Decisions}}<br>  
        </div>    
        <div class="col-12" style="padding:5px; text-align:left">
          <a role="button" href="{{route ('treatmentEdit',['date' => $treatment->Date, 'patient_id' => $treatment->Patient_ID,'visit'=>$treatment->Visit_No])}}" class="btn btn-info" style="font-weight:bold; margin-bottom:1%; margin-left:80%">Edit </a>
        </div>
    </div>

    @endforeach
</div>
<br>
<div class="col-12" style="padding:5px; text-align:left">
  <a role="button" href="{{ route ('daytoday',$patient->id) }}" class="btn btn-info" style="font-weight:bold; color:white; background-color:#1980c1; margin-bottom:5px"><< Previous </a>
</div>

@endsection