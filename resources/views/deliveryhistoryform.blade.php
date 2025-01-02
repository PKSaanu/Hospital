@extends('patient_layout',['patient'=>$patient])
@section('content1')

    <div class="row gy-3" style="padding:4px; margin-left:10px; margin-top:1px">
        <div class="fw-semibold"><h3>Delivery History Form</h3></div>
    </div>
    <hr><br>

    <form name="myForm" class="row g-3" onsubmit="return validateForm()" action="{{route ('DeliveryHistoryStore')}}" method="post">
        @csrf
      <div class="col-md-6">
        <label class="form-label">Delivery HX</label>
        <input type="text" name="Delivery_Hx" class="form-control" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Time</label>
        <input type="time" name="Time" class="form-control" required>
      </div>
      <div class="col-6">
        <label class="form-label">Date</label>
        <input type="Date" name="Date" class="form-control" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Any Complaints for Mother and Newborn</label>
        <input type="text" name="ACMN" class="form-control" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Birth Weight (g)</label>
        <br>
        <input  type="number" name="Birth_Weight" placeholder="g" style="width:100px" required min="1"> 
      </div>
      <div class="col-md-6">
        <label class="form-label">Gender</label>
        <select name="Gender" class="p-2 text-dark bg-light border border-dark-subtle rounded-3" style="max-width:420px" required>
          <option  selected aria-label="Disabled select example" disabled >Select Gender
          <option > Female
          <option > Male
        </select>
      </div>
  
      <input type="hidden" name="patient_No" value="{{$patient->id}}">

      <br>
      <div class="col-12" style="padding:5px">
        <a role="button" href="{{ route ('deliveryhistory',$patient->id) }}" class="btn btn-danger" style="font-weight:bold; color:white; background-color:##ff0a54"> cancel </a>
        <button type="submit" class="btn btn-success" style="font-weight:bold; margin-left:75%"> Submit </button>
    </div>

    </form>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        function validateForm() {
            var genderSelect = document.forms["myForm"]["Gender"].value;
            if (genderSelect === "Select Gender") {
                alert("Please select a gender");
                return false;
            }
            return true;
        }

        // Attach the validateForm function to the form's onsubmit event
        var form = document.querySelector("form[name='myForm']");
        form.addEventListener('submit', validateForm);
    });
    </script>
@endsection