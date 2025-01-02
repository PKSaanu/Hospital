@extends('patient_layout',['patient'=>$patient])
@section('content1')

    <div class="row gy-3" style="padding:4px; margin-left:10px; margin-top:1px">
        <div class="fw-semibold"><h3>History Form</h3></div>
    </div>
    <hr><br>
    @php
        $firsthis = $histories->first();
        @endphp
<!-- -->
    <form class="row g-3" action="{{route('updatehistory',['id' => $firsthis->id, 'patient_id' => $patient->id])}}" method="post">
        @csrf
        @method('PATCH')
        @php
        $firsthis = $histories->first();
        @endphp
        <div class="col-md-6">
        <label class="form-label">MHx</label>
        <input type="text" name="MHx" class="form-control" value="{{$firsthis->MHx}}">
      </div>
      <div class="col-md-6">
        <label class="form-label">FHx</label>
        <input type="text" name="FHx" class="form-control" value="{{$firsthis->FHx}}">
      </div>
      <div class="col-6">
        <label class="form-label">SHx</label>
        <input type="text" name="SHx" class="form-control" value="{{$firsthis->SHx}}">
      </div>
      <div class="col-6">
        <label class="form-label">Risk Factor</label>
        <input type="text" name="Risk_Factor" class="form-control" value="{{$firsthis->Risk_Factor}}">
      </div>
      <div class="col-md-6">
        <label class="form-label">Height & Weight(BMI)</label>
        <input type="text" name="BMI" class="form-control" value="{{$firsthis->BMI}}" >
      </div>
      <div class="col-md-6">
        <label class="form-label">LMP</label>
        <input type="text" name="LMP" class="form-control" value="{{$firsthis->LMP}}">
      </div>
      <div class="col-md-6">
        <label class="form-label">EDD</label>
        <input type="text" name="EDD" class="form-control" value="{{$firsthis->EDD}}">
      </div>
      <div class="col-md-6">
        <label class="form-label">Parity</label>
        <input type="text" name="Parity" class="form-control" value="{{$firsthis->Parity}}">
      </div>
      <div class="col-md-6">
        <label class="form-label">Past obs Hx</label>
        <input type="text" name="Past_obs_Hx" class="form-control" value="{{$firsthis->Past_obs_Hx}}">
      </div>
      <div class="col-md-6">
        <label class="form-label">Past obs complication</label>
        <input type="text" name="Past_obs_complication" class="form-control" value="{{$firsthis->Past_obs_complication}}">
      </div>
      <input type="hidden" name="patient_No" value="{{$patient->id}}">

      <br>
      <div class="col-12" style="padding:5px">
        <a role="button" href="{{ route ('history',$patient->id) }}" class="btn btn-danger" style="font-weight:bold; color:white; background-color:#ff0a54"> Cancel </a>
        <button type="submit" class="btn btn-success" style="font-weight:bold; margin-left:75%"> Update </button>
    </div>

    </form>


@endsection