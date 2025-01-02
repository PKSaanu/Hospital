@extends('patient_layout',['patient'=>$patient])
@section('content1')

<div style="margin-top:2%; margin-bottom:2%">
<div class="fw-semibold"><h5>Patient Details</h5></div>
<div class="p-2" style="font-weight:bold; background: linear-gradient(90deg, rgba(184,184,189,1) 33%, rgba(152,152,161,1) 48%, rgba(42,43,43,1) 100%); border-radius:5px"> Section A</div>
  <div class="row gy-5" style="display:flex; flex-direction:row; padding:10px">
    <div class="col-md-2" style="width:200px">
      <label class="form-label">  Admission Date  </label> <br>
      <label class="form-label">  Admission Time  </label><br>
      <label class="form-label">  Marital Status  </label><br>
    </div>
    <div class="col-md-2"  style="width:40px">
      <label class="form-label">  :  </label> <br>
      <label class="form-label">  :  </label><br>
      <label class="form-label">  :  </label><br>
    </div>
    <div class="col-md-2" style="width:240px">
      <label class="form-label"> {{$patient->Admission_Date}} </label><br>
      <label class="form-label"> {{$patient->Admission_Time}} </label><br>
      <label class="form-label"> {{$patient->Marital_Status}} </label><br>
    </div>
    <div class="col-md-2" style="width:80px">
      <label class="form-label"> NIC  </label><br>
      <label class="form-label"> PHN  </label><br>
      <label class="form-label"> Address  </label><br>
    </div>
    <div class="col-md-2"  style="width:40px">
      <label class="form-label">  :  </label><br>
      <label class="form-label">  :  </label><br>
      <label class="form-label">  :  </label><br>

    </div>
    <div class="col-md-2">
      <label class="form-label"> {{$patient->NIC_No}} </label><br>
      <label class="form-label"> {{$patient->PHN}} </label><br>
      <label class="form-label"> {{$patient->Address}} </label><br>

    </div>
    </div>
  </div>

  <div class="p-2" style="font-weight:bold; background: linear-gradient(90deg, rgba(184,184,189,1) 33%, rgba(152,152,161,1) 48%, rgba(42,43,43,1) 100%); border-radius:5px"> Section B</div>
  <div class="row gy-5" style="display:flex; flex-direction:row; padding:10px">
  <div class="col-md-6" style="display:flex; flex-direction:row">
    <div class="col-md-4" style="width:200px">
      <label class="form-label"> Patient Category </label><br>
      <label class="form-label"> Consultant's Name </label><br>
      <label class="form-label"> Ward No. </label><br>
    </div>
    <div class="col-md-2" style="width:40px">
      <label class="form-label"> :</label><br>
      <label class="form-label"> :</label><br>
      <label class="form-label"> :</label><br>
    </div>
    <div class="col-md-4">
      <label class="form-label"> {{$patient->Patient_Category}} </label><br>
      <label class="form-label"> {{$patient->ConsultantID}} </label><br>
      <label class="form-label"> {{$patient->Ward_No}} </label><br>
    </div>
  </div>
  <div class="col-md-6">
    <label class="form-label" style="font-weight:bold;">Allergies </label><br>
    <div class="col-md-12" style="display:flex; flex-direction:row">
      <div class="col-md-4" style="width:100px">
        <label class="form-label">Drugs</label><br>
        <label class="form-label">Food</label><br>
        <label class="form-label">Specify</label><br>
      </div>
      <div class="col-md-4" style="width:40px">
        <label class="form-label">:</label><br>
        <label class="form-label">:</label><br>
        <label class="form-label">:</label><br>
      </div>
      <div class="col-md-4">
        <label class="form-label">{{$patient->Allergies_Drugs}}</label><br>
        <label class="form-label">{{$patient->Allergies_Foods}}</label><br>
        <label class="form-label">{{$patient->Allergies_Specify}}</label><br>
      </div>
    </div>
    </div>
</div>     

<div class="col-12" style="padding:5px; text-align:left">
  <a role="button" href="{{ route ('patient.show',$patient->id) }}" class="btn btn-info" style="font-weight:bold; color:white; background-color:#1980c1; margin-bottom:5px"><< Previous </a>
</div>
@endsection