@extends('layout')
@section('content')

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
@endif

<form class="row g-3" action="{{ route ('patient.store') }}" method="post">
@csrf

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

<div class="fw-semibold"><h3>Admission Form</h3></div>
<div class="p-3" style="font-weight:bold; margin-right:2.8%; background: linear-gradient(90deg, rgba(143,196,235,1) 42%, rgba(91,154,221,1) 61%, rgba(78,136,250,1) 100%); border-radius:5px"> Section A</div>
      <div class="col-md-6">
        <label class="form-label">Admission Date</label>
        <input type="Date" name="date" class="form-control" required max="{{ now()->toDateString() }}" value="{{ old('date') }}">
      </div>
      <div class="col-md-6">
        <label class="form-label">Admission Time</label>
        <input type="Time" name="time" class="form-control" required value="{{ old('time') }}">
      </div>
      <div class="col-12">
        <label class="form-label">Full Name</label>
        <input type="text" name="fullname" class="form-control" id="full-name" oninput="capitalizeNames(this)" required value="{{ old('fullname') }}"> 
      </div>
      <div class="col-12">
        <label class="form-label">Address</label>
        <input type="address" name="address" oninput="capitalizeNames(this)" class="form-control" required value="{{ old('address') }}">
      </div>
      <div class="col-md-4">
        <label class="form-label" >Blood Group</label>
        <input type="text" name="blood_group"  oninput="capitalizeInput(this)" class="form-control" value="{{ old('blood_group') }}">
      </div>
      <div class="col-md-4">
        <label class="form-label">Age</label>
        <input type="number" name="age" class="form-control" min="10" max="120" value="{{ old('age') }}">
      </div>
      <div class="col-md-4">
          <label class="form-label">Marital Status</label><br>
          <select name="maritial_status" class="p-2 text-dark bg-light border border-dark-subtle rounded-3" style="max-width:420px">
              <option selected disabled>Select Marital Status</option>
              <option value="Married" {{ old('maritial_status') == 'Married' ? 'selected' : '' }}>Married</option>
              <option value="Unmarried" {{ old('maritial_status') == 'Unmarried' ? 'selected' : '' }}>Unmarried</option>
          </select>
      </div>
      <div class="col-md-4">
        <label class="form-label">NIC No.</label>
        <input type="text" name="nic" oninput="validateNIC(this)" class="form-control" value="{{ old('nic') }}">
        <span id="nic-format-example" style="display: none; color: red">Please try this format: 123456789V (old format) or 123456789012 (new format)</span>
      </div>
      <div class="col-md-4">
        <label class="form-label">PHN</label>
        <input type="text" name="phn" class="form-control" required value="{{ old('phn') }}">
        @error('phn')
              <div  style="color: red;">{{ $message }}</div>
          @enderror
      </div>
      <div class="col-md-4">
        <label class="form-label">Phone No.</label>
        <input type="text" name="phone" oninput="validatePhoneNumber(this)" class="form-control" value="{{ old('phone') }}">
        <span id="phone-error-msg" style="display: none; color: red;">Invalid phone number format</span>
      </div>
      <div></div>
      <div class="p-3" style="font-weight:bold; margin-right:2.8%; background: linear-gradient(90deg, rgba(143,196,235,1) 42%, rgba(91,154,221,1) 61%, rgba(78,136,250,1) 100%); border-radius:5px"> Section B</div>
     <!-- <div class="col-md-4">
      <label class="form-label">Admission Type</label><br>
        <select name="admission_type" class="p-2 text-dark bg-light border border-dark-subtle rounded-3" style="width:420px"> Select Admission Type
          <option selected aria-label="Disabled select example" disabled > Select Admission Type</option>
          <option > Self Admission</option>
          <option > Requested Admission</option>
        </select>
      </div>-->
      <div class="col-md-4">
      <label class="form-label">Patient Category</label><br>
      <select name="patient_category" class="p-2 text-dark bg-light border border-dark-subtle rounded-3" style="max-width:420px">
          <option selected disabled>Select Patient Category</option>
          <option value="Antenatal" {{ old('patient_category') == 'Antenatal' ? 'selected' : '' }}>Antenatal</option>
          <option value="Gynaecology" {{ old('patient_category') == 'Gynaecology' ? 'selected' : '' }}>Gynaecology</option>
          <option value="Postnatal" {{ old('patient_category') == 'Postnatal' ? 'selected' : '' }}>Postnatal</option>
          <option value="Sick baby" {{ old('patient_category') == 'Sick baby' ? 'selected' : '' }}>Sick baby</option>
      </select>

      </div>
      <div class="col-md-4">
        <label class="form-label">Consultant's Name</label><br>
        <select name="consultant" class="p-2 text-dark bg-light border border-dark-subtle rounded-3" style="max-width:420px">
            <option selected disabled>Select Consultant name</option>
            @foreach($consultant as $Con)
                <option value="{{ $Con->name }}" {{ old('consultant') == $Con->name ? 'selected' : '' }}>{{ $Con->name }}</option>
            @endforeach
        </select>

      </div>
      
      <div class="col-md-4">
        <label class="form-label">BHT</label>
        <input type="text"name="bht" class="form-control" required value="{{ old('bht') }}">
      </div>
      <div class="col-md-4">
        <label class="form-label">Ward No.</label>
        <input type="number" name="ward_no" class="form-control" value="21" style="max-width:420px" min=1 value="{{ old('ward_no') }}">
      </div>
      <!--<div class="col-md-4">
        <label class="form-label">Bed No</label>
        <input type="number" name="bed_no" class="form-control" >
      </div>-->
      <div></div>

          <div class="p-3" style="font-weight:bold; margin-right:2.8%; background: linear-gradient(90deg, rgba(143,196,235,1) 42%, rgba(91,154,221,1) 61%, rgba(78,136,250,1) 100%); border-radius:5px"> Allergies</div>
        <div class="col-md-4">
        <label class="form-label">Drugs</label>
        <input type="text" name="drugs" class="form-control" value="{{ old('drugs') }}">
        </div>
        <div class="col-md-4">
        <label class="form-label">Food</label>
        <input type="text" name="food" class="form-control" value="{{ old('food') }}">
        </div>
        <div class="col-md-4">
        <label class="form-label">Specify</label>
        <input type="text" name="specify" class="form-control" value="{{ old('specify') }}">
        </div>


 
<!--
      <div class="col-md-8">
      <div class="p-2 text-dark bg-primary-subtle rounded-3" >
        <label style="font-weight:bold;">Antenatal Details</label><br>
        <label >Reasons for Admission :</label><br><br>
      <div style="display:flex; flex-direction:row">
        <div class="col-md-3" style="margin-left:10px; width:230px">
          <input type ="checkbox" name="reason[]" value="Admitted as Requested"> Admitted as Requested <br>
          <input type ="checkbox" name="reason[]" value="High Blood Pressure"> High Blood Pressure <br>
          <input type ="checkbox" name="reason[]" value="Respiratory Symptoms"> Respiratory Symptoms <br>
          <input type ="checkbox" name="reason[]" value="Admitted for Investigation "> Admitted for Investigation <br>
          <input type ="checkbox" name="reason[]" value="Admitted for Confinement"> Admitted for Confinement <br>
          <input type ="checkbox" name="reason[]" value="Vaginal Discharge "> Vaginal Discharge <br>
        </div> 
        <div class="col-md-3" style="margin-left:10px">
          <input type ="checkbox" name="reason[]" value="Abdominal Pain"> Abdominal Pain <br>
          <input type ="checkbox" name="reason[]" value="Dribbling/Show"> Dribbling/Show <br>
          <input type ="checkbox" name="reason[]" value="Reduced/Absent Featal"> Reduced/Absent Featal <br>
          <input type ="checkbox" name="reason[]" value="Movements"> Movements  <br>
          <input type ="checkbox" name="reason[]" value="Heart Disease"> Heart Disease <br>
          <input type ="checkbox" name="reason[]" value="Faintishness"> Faintishness <br>
      </div>
        <div class="col-md-3" style="margin-left:10px; width:180px">
          <input type ="checkbox" name="reason[]" value="Bleeding_PV"> Bleeding PV <br>
          <input type ="checkbox" name="reason[]" value="Vomiting"> Vomiting <br>
          <input type ="checkbox" name="reason[]" value="Back Pain"> Back Pain <br>
          <input type ="checkbox" name="reason[]" value="GDM"> GDM <br>
          <input type ="checkbox" name="reason[]" value="Diarrhoea"> Diarrhoea <br>
          <input type ="checkbox" name="reason[]" value="Headache & Fever"> Headache & Fever <br>
        </div>
        <div class="col-md-3" style="margin-left:10px">
          <input type ="checkbox" name="reason[]" value="EM-LSCS"> EM-LSCS <br> 
          <input type ="checkbox" name="reason[]" value="EL-LSCS"> EL-LSCS  <br>
          <input type ="checkbox" name="reason[]" value="NVD"> NVD  <br>
          <input type ="checkbox" name="reason[]" value="BSS"> BSS  <br>
          <input type ="checkbox" name="reason[]" value="Multiple Pregnancy"> Multiple Pregnancy  <br>
          <input type ="checkbox" name="reason[]" value="Readmission"> Readmission <br><br> 
        </div>
      </div>
      </div>
      </div>
              -->
      <input type="hidden" name="Status" value="Admitted">
              
      <br>
      <div style="padding:5px; text-align:right">
      <button type="submit" style="font-weight:bold" class="btn btn-success" role="button">Register</button>&emsp;&ensp;
      <a class="btn btn-danger"  style="font-weight:bold" role="button" href="{{ route('home') }}">Cancel</a>
      </div>
             
    </form>

@endsection