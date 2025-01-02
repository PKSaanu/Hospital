@extends('patient_layout',['patient'=>$patient])
@section('content1')

    <div class="row gy-3" style="padding:4px; margin-left:10px; margin-top:1px">
        <div class="fw-semibold"><h3>POH Form</h3></div>
    </div>
    <hr><br>
    @php
        $firstpoh = $pohs->first();
        @endphp

    <form class="row g-3" action="{{route('updatepoh',['id' => $firstpoh->id, 'patient_id' => $patient->id])}}" method="post">
        @csrf
        @method('PATCH')
        @php
        $firstpoh = $pohs->first();
        @endphp
      <div class="col-md-6">
        <label class="form-label">Pregnancy</label>
        <input type="text" name="pregnancy" class="form-control" value="{{$firstpoh->pregnancy}}" >
      </div>
      <div class="col-md-6">
        <label class="form-label">Antenatal Complications</label>
        <input type="text" name="antenatal_complications" class="form-control" value="{{$firstpoh->antenatal_complications}}">
      </div>
      <div class="col-6">
        <label class="form-label">Place</label>
        <input type="text" name="place_of_delivery" class="form-control" value="{{$firstpoh->place_of_delivery}}">
      </div>
      <div class="col-6">
        <label class="form-label">Mode of Delivery</label>
        <input type="text" name="mode_of_delivery" class="form-control" value="{{$firstpoh->mode_of_delivery}}">
      </div>
      <div class="col-md-6">
        <label class="form-label">Outcome</label>
        <input type="text" name="outcome" class="form-control" value="{{$firstpoh->outcome}}">
      </div>
      <div class="col-md-6">
        <label class="form-label">Birth weight (g)</label>
        <br>
        <input  type="number" name="birth_weight" placeholder="g" style="width:100px" value="{{$firstpoh->birth_weight}}" min="1"> 
      </div>
      <div class="col-md-6">
        <label class="form-label">Postnatal complication (Specify)</label>
        <input type="text" name="postnatal_complication" class="form-control" value="{{$firstpoh->postnatal_complication}}">
      </div>
      <div class="col-md-6">
      <select name="sex" class="p-2 text-dark bg-light border border-dark-subtle rounded-3" style="max-width:420px">
          <option  selected aria-label="Disabled select example" disabled >Select Sex
          <option @if($firstpoh->sex=== 'Female') selected @endif> Female</option>
          <option @if($firstpoh->sex=== 'Male') selected @endif> Male</option>
        </select>
      </div>
      
      <div class="col-md-6">
        <label class="form-label">Age</label>
        <input type="text" name="age" class="form-control"  value="{{$firstpoh->age}}">
      </div>
      <input type="hidden" name="patient_No" value="{{$patient->id}}">

      <br>
      <div class="col-12" style="padding:5px">
        <a role="button" href="{{ route ('poh',$patient->id) }}" class="btn btn-danger" style="font-weight:bold; color:white; background-color:#ff0a54"> Cancel </a>
        <button type="submit" class="btn btn-success" style="font-weight:bold; margin-left:75%"> Update </button>
    </div>

    </form>


@endsection