@extends('patient_layout',['patient'=>$patient])
@section('content1')

<div class="row gy-3" style="padding:4px; margin-left:10px; margin-top:1px">
    <div class="fw-semibold"><h4>Day-to-Day</h4></div>
</div>
<hr>
<div class="container" style="margin-top:20px">
<div class="row row-cols-1 row-cols-md-5 mb-6 text-center">
      @php
      $i=0;
      $groupedTreatments = $treatments->groupBy('Date');
      @endphp
  
      @foreach($groupedTreatments as $date => $treatmentGroup)
        @php
        $firstTreatment = $treatmentGroup->first();
        @endphp
      <div class="col">
        <div class="card mb-2 rounded-5 shadow-sm" style="width:90%; height:85%" >
          <div class="card-header py-1 text-white bg-info">
            <h5 class="my-0 fw-normal">Day {{++$i}}</h5>
          </div>
          <div class="card-body">
              <label>{{ $firstTreatment->Date }}</label>
            <a style="font-weight:bold; color:white; margin-bottom:5px" href="{{ route ('DayShow',['date' => $firstTreatment->Date, 'patient_id' => $firstTreatment->Patient_ID]) }}">
              <lord-icon 
                  src="https://cdn.lordicon.com/kipaqhoz.json"
                  trigger="morph"
                  colors="primary:#30c9e8"
                  style="width:60px;height:60px">
              </lord-icon>
           </a>
          </div>
        </div>
      </div>
      @endforeach
      @if($patient->Status !== 'Discharged')
      <div class="col">
        <div class="card mb-2 rounded-4 shadow-sm border-info" style="width:90%; height:85%" >
          <div class="card-body">
              <strong style="color:#30c9e8">Add New Day </strong><br>
            <a href="{{ route ('visit',$patient->id) }}">
                <lord-icon
                  src="https://cdn.lordicon.com/wfadduyp.json"
                  trigger="hover"
                  colors="primary:#30c9e8"
                  state="hover-2"
                  style="width:60px;height:60px">
                </lord-icon>
            </a>
          </div>
        </div>
      </div>
      @endif


      

      <!--
      <table class="table table-hover">
        <thead>
            <tr>
                <th >No</th>
                <th >Date</th>
                <th >Visit_No</th>
                <th >Staff's Name</th>
                <th >Examination</th>
                <th >Investigation</th>
                <th >Management </th>
                <th >Decision  </th>
                <th >Action</th>
            </tr>
        </thead>
        @php($i=0)
        @foreach($treatments as $treatment)
        
        <tr>
            <td >{{++$i}}</td>
            <td >{{$treatment->Date}}</td>
            <td >{{$treatment->Visit_No}}</td>
            <td >{{$treatment->Staff_Name}}</td>
            <td >{{$treatment->Examination}}</td>
            <td >{{$treatment->Investigation}}</td>
            <td >{{$treatment->Management}}</td>
            <td >{{$treatment->Decision}}</td>
            <td ><a role="button" class="btn btn-info" style="font-weight:bold; color:white; background-color:#1980c1; margin-bottom:5px" href="#">View</a></td>
        </tr>
        @endforeach
            <script>
                var tableHead = document.querySelector('thead');
                var tableBody = document.querySelector('tbody');
                tableBody.style.marginTop = tableHead.offsetHeight + 'px';
            </script>           
      </table>-->

</div>
<div class="col-12" style="padding:5px; text-align:left; display:flex">
  <a role="button" href="{{ route ('patient.show',$patient->id) }}" class="btn btn-info" style="font-weight:bold; color:white; background-color:#1980c1"><< Previous </a>
  @if($patient->Status !== 'Discharged')
        <a role="button" class="btn btn-danger" style="font-weight: bold; margin-left: 65%" onclick="openPopup1()"> Discharge </a>
  @endif

  <div id="popup1" class="popup">
                      <div class="popup-content">
                          <h2>Confirmation</h2>
                          <p>Are you sure you want to discharge?</p>
                          <button class="btn btn-info" style="font-weight:bold" href="" onclick="closePopup1(true)">Yes</button>
                          <a class="btn btn-info" style="font-weight:bold" onclick="closePopup1(false)">No</a>
                      </div>
                  </div>
</div>
</div>
<script>
      function openPopup1() {
        var popup = document.getElementById('popup1');
        popup.style.display = 'flex';
    }
    
    function closePopup1(choice) {
        var popup = document.getElementById('popup1');
        popup.style.display = 'none';
    
        if (choice) {
          console.log('Discharge confirmed');
          window.location.href = "{{ route('discharge', $patient->id) }}";
        } else {
          console.log('Discharge canceled');
          window.location.back();
        }
    }
  </script>
@endsection