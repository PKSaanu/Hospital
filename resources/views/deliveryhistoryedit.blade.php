@extends('patient_layout',['patient'=>$patient])
@section('content1')

    <div class="row gy-3" style="padding:4px; margin-left:10px; margin-top:1px">
        <div class="fw-semibold"><h3>Delivery History Form</h3></div>
    </div>
    <hr><br>
    @php
        $firsthis = $deliveryhistories->first();
        @endphp
<!-- -->
    <form class="row g-3" action="{{route('updatedeliveryhistory',['id' => $firsthis->id, 'patient_id' => $patient->id])}}" method="post">
        @csrf
        @method('PATCH')
        @php
        $firsthis = $deliveryhistories->first();
        @endphp
        <div class="col-md-6">
        <label class="form-label">Delivery HX</label>
        <input type="text" name="Delivery_Hx" class="form-control" value="{{$firsthis->Delivery_Hx}}">
      </div>
      <div class="col-md-6">
        <label class="form-label">Time</label>
        <input type="Time" name="Time" class="form-control" value="{{$firsthis->Time}}">
      </div>
      <div class="col-6">
        <label class="form-label">Date</label>
        <input type="Date" name="Date" class="form-control" value="{{$firsthis->Date}}">
      </div>
      <div class="col-md-6">
        <label class="form-label">Any Complaints for Mother and Newborn</label>
        <input type="text" name="ACMN" class="form-control" value="{{$firsthis->ACMN}}">
      </div>
      <div class="col-6">
        <label class="form-label">Birth Weight (g)</label>
        <br>
        <input type="number" name="Birth_Weight" class="form-control" value="{{$firsthis->Birth_Weight}}" min="1">
      </div>
      <div class="col-md-6">
       <label class="form-label">Gender</label>
      <select name="Gender" class="p-2 text-dark bg-light border border-dark-subtle rounded-3" style="max-width:420px">
          <option  selected aria-label="Disabled select example" disabled >Select Gender
          <option @if($firsthis->Gender=== 'Female') selected @endif> Female</option>
          <option @if($firsthis->Gender=== 'Male') selected @endif> Male</option>
        </select>
      </div>

      <input type="hidden" name="patient_No" value="{{$patient->id}}">

      <br>
      <div class="col-12" style="padding:5px">
        <a role="button" href="{{ route ('deliveryhistory',$patient->id) }}" class="btn btn-danger" style="font-weight:bold; color:white; background-color:#ff0a54"> Cancel </a>
        <button type="submit" class="btn btn-success" style="font-weight:bold; margin-left:75%"> Update </button>
    </div>

    </form>


@endsection