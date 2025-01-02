@extends('layout')
@section('content')
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
@endif
<form class="row g-3" action="{{ route ('patient.update',$patient) }}" method="post">
@csrf
@method('PATCH')

<!-- THIS FIELD FOR ERROR MSG -->

<div style="position:fixed;width:70%;align:center" >
          @if ($errors->any())
              <div class="alert alert-danger" id="error-msg">
                  <u1>
                      @foreach ($errors->all() as $error)
                      <li>{{$error}}</li>
                      @endforeach
                  </u1>
                  <div class="alert alert-danger" role="alert">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                        <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                        <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                      </svg>
                      &ensp;<strong>So please insert again correctly !!!</strong>
                  </div>
                </div>
          <br/>
              <script>
                setTimeout(function() { 
                    $('#error-msg').fadeOut('fast');
                }, 1500); // Delay the fade out by 1.5 seconds
              </script>
          @endif
</div>

<div class="fw-semibold"><h3> Editing Admission Details</h3></div>
<div class="p-3 bg-secondary bg-opacity-25" style="font-weight:bold"> Section A</div>
      <div class="col-md-6">
        <label class="form-label">Admission Date</label>
        <input type="Date" name="date" class="form-control" value="{{ $patient->Admission_Date }}">
      </div>
      <div class="col-md-6">
        <label class="form-label">Admission Time</label>
        <input type="Time" name="time" class="form-control" value="{{ $patient->Admission_Time }}">
      </div>
      <div class="col-12">
        <label class="form-label">Full Name</label>
        <input type="text" name="fullname" class="form-control" oninput="capitalizeNames(this)" value="{{ $patient->Full_name }}">
      </div>
      <div class="col-12">
        <label class="form-label">Address</label>
        <input type="address" name="address" oninput="capitalizeNames(this)" class="form-control" value="{{ $patient->Address }}">
      </div>
      <div class="col-md-4">
        <label class="form-label">Blood Group</label>
        <input type="text" name="blood_group" class="form-control" oninput="capitalizeInput(this)" value="{{ $patient->BloodGroup }}">
      </div>
      <div class="col-md-4">
        <label class="form-label">Age</label>
        <input type="number" name="age" class="form-control" min="10" max="120" value="{{ $patient->Age }}">
      </div>
      <div class="col-md-4">
        <label class="form-label">Marital Status</label>
        <select name="maritial_status" class="p-2 text-dark bg-light border border-dark-subtle rounded-3" style="width:420px" >
          <option selected aria-label="Disabled select example"  disabled > Select Marital Status</option>
          <option @if($patient->Marital_Status=== 'Married') selected @endif> Married</option>
          <option @if($patient->Marital_Status=== 'Unmarried') selected @endif> Unmarried</option>
        </select>
      </div>
      <div class="col-md-4">
        <label class="form-label">NIC No.</label>
        <input type="text" name="nic" class="form-control" oninput="validateNIC(this)" value="{{ $patient->NIC_No }}" >
        <span id="nic-format-example" style="display: none;color: red">Please try this format: 123456789V (old format) or 123456789012 (new format)</span>
      </div>
      <div class="col-md-4">
        <label class="form-label">PHN</label>
        <input type="text" name="phn" class="form-control" value="{{ $patient->PHN }}">
          @error('phn')
              <div  style="color: red;">{{ $message }}</div>
          @enderror
      </div>
      <div class="col-md-4">
        <label class="form-label">Phone No.</label>
        <input type="text" name="phone" class="form-control" oninput="validatePhoneNumber(this)"  value="{{ $patient->Phone_No }}">
        <span id="phone-error-msg" style="display: none; color: red;">Invalid phone number format</span>
      </div>
      <div></div>
      <div class="p-3 bg-secondary bg-opacity-25" style="font-weight:bold"> Section B</div>
      <div class="col-md-4">
      <label class="form-label">Patient Category</label><br>
      <select name="patient_category" class="p-2 text-dark bg-light border border-dark-subtle rounded-3" style="max-width:420px" >
          <option  selected aria-label="Disabled select example" disabled >Select Patient Category
          <option @if($patient->Patient_Category=== 'Antenatal') selected @endif> Antenatal</option>
          <option @if($patient->Patient_Category=== 'Gynaecology') selected @endif> Gynaecology</option>
          <option @if($patient->Patient_Category=== 'Postnatal') selected @endif> Postnatal</option>
          <option @if($patient->Patient_Category=== 'Sick baby') selected @endif> Sick baby</option>
        </select>
      </div>
      <div class="col-md-4">
        <label class="form-label">Consultant's Name</label>
        <select name="consultant" class="form-select"  aria-label="Default select example" style="max-width:420px" required>
            @foreach($consultant as $Con)
            <option value="{{$Con->id}}"@if($Con->name ===$patient->ConsultantID) selected @endif>{{$Con->name}}</option>
            @endforeach

        </select>
      </div>
      
      <div class="col-md-4">
        <label class="form-label">BHT</label>
        <input type="text"name="bht" class="form-control" value="{{ $patient->BHT }}" >
      </div>
      <div class="col-md-4">
        <label class="form-label">Ward No.</label>
        <input type="number" name="ward_no" class="form-control" value="{{ $patient->Ward_No }}">
      </div>
     <!-- <div class="col-md-4">
        <label class="form-label">Bed No</label>
        <input type="number" name="bed_no" class="form-control" value="{{ $patient->Bed_No }}">
      </div>-->
      <div></div>
      <div class="col-md-4">
      <div class="p-2 text-dark bg-primary-subtle rounded-3" style="width:420px">
        <label class="form-label" style="font-weight:bold;">Allergies</label><br>
        <label class="form-label">Drugs</label>
        <input type="text" name="drugs" class="form-control" value="{{ $patient->Allergies_Drugs }}">
        <label class="form-label">Food</label>
        <input type="text" name="food" class="form-control" value="{{ $patient->Allergies_Foods }}">
        <label class="form-label">Specify</label>
        <input type="text" name="specify" class="form-control" value="{{ $patient->Allergies_Specify }}">
      </div>
      </div>

      
<!--
      <div class="col-md-8">
      <div class="p-2 text-dark bg-primary-subtle rounded-3">
      <div class="checkbox-group">
        <label class="form-label" style="font-weight:bold;">Antenatal Details</label><br>
        <label class="form-label">Reasons for Admission :</label><br>
        <input type ="checkbox" name="reason[]" value="Admitted_as_Requested"> Admitted as Requested 
        <input type ="checkbox" name="reason[]" value="Abdominal_Pain"> Abdominal Pain 
        <input type ="checkbox" name="reason[]" value="Bleeding_PV"> Bleeding PV 
        <input type ="checkbox" name="reason[]" value="EM-LSCS"> EM-LSCS <br> 
        <input type ="checkbox" name="reason[]" value="High Blood Pressure"> High Blood Pressure 
        <input type ="checkbox" name="reason[]" value="Dribbling/Show " style="margin-left:78px"> Dribbling/Show 
        <input type ="checkbox" name="reason[]" value="Vomiting" style="margin-left:64px"> Vomiting 
        <input type ="checkbox" name="reason[]" value="EL-LSCS" style="margin-left:86px"> EL-LSCS  <br>
        <input type ="checkbox" name="reason[]" value="Respiratory Symptoms"> Respiratory Symptoms 
        <input type ="checkbox" name="reason[]" value="Reduced/Absent Featal" style="margin-left:62px"> Reduced/Absent Featal 
        <input type ="checkbox" name="reason[]" value="Back Pain" style="margin-left:6px"> Back Pain 
        <input type ="checkbox" name="reason[]" value="NVD" style="margin-left:74px"> NVD  <br>
        <input type ="checkbox" name="reason[]" value="Admitted for Investigation "> Admitted for Investigation 
        <input type ="checkbox" name="reason[]" value="Movements" style="margin-left:44px"> Movements 
        <input type ="checkbox" name="reason[]" value="GDM" style="margin-left:90px"> GDM  
        <input type ="checkbox" name="reason[]" value="BSS" style="margin-left:110px"> BSS  <br>
        <input type ="checkbox" name="reason[]" value="Admitted for Confinement"> Admitted for Confinement 
        <input type ="checkbox" name="reason[]" value="Heart Disease" style="margin-left:44px"> Heart Disease 
        <input type ="checkbox" name="reason[]" value="Diarrhoea" style="margin-left:70px"> Diarrhoea 
        <input type ="checkbox" name="reason[]" value="Multiple Pregnancy " style="margin-left:78px"> Multiple Pregnancy  <br>
        <input type ="checkbox" name="reason[]" value="Vaginal Discharge "> Vaginal Discharge 
        <input type ="checkbox" name="reason[]" value="Faintishness" style="margin-left:96px"> Faintishness 
        <input type ="checkbox" name="reason[]" value="Headache & Fever" style="margin-left:82px"> Headache & Fever 
        <input type ="checkbox" name="reason[]" value="Readmission " style="margin-left:14px"> Readmission 
      </div>
      </div>
      </div>

              -->
      <input type="hidden" name="Status" value="Admitted">

      <br>
      <div style="padding:5px; text-align:right">
      <button type="submit" class="btn btn-success" style="font-weight:bold; color:white; background-color:#1980c1" role="button">Update</button>&emsp;&ensp;
      <a class="btn btn-info" style="font-weight:bold; color:white; background-color:#1980c1" role="button" href="{{ route('patients') }}">Go Back</a>
      </div>

    </form>

@endsection