@extends('patient_layout',['patient'=>$patient])
@section('content1')

    <div class="row gy-3" style="padding:4px; margin-left:10px; margin-top:1px">
        <div class="fw-semibold"><h3>History Form</h3></div>
    </div>
    <hr><br>

    <form class="row g-3" action="{{ route('HistoryStore') }}" method="post">
        @csrf
      <div class="col-md-6">
        <label class="form-label">MHx</label>
        <input type="text" name="MHx" class="form-control" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">FHx</label>
        <input type="text" name="FHx" class="form-control" required>
      </div>
      <div class="col-6">
        <label class="form-label">SHx</label>
        <input type="text" name="SHx" class="form-control" required>
      </div>
      <div class="col-6">
        <label class="form-label">Risk Factor</label>
        <input type="text" name="Risk_Factor" class="form-control" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Height & Weight(BMI)</label>
        <input type="text" name="BMI" class="form-control" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">LMP</label>
        <input type="text" name="LMP" class="form-control" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">EDD</label>
        <input type="text" name="EDD" class="form-control" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Parity</label>
        <input type="text" name="Parity" class="form-control" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Past obs Hx</label>
        <input type="text" name="Past_obs_Hx" class="form-control" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Past obs complication</label>
        <input type="text" name="Past_obs_complication" class="form-control" required>
      </div>
      <input type="hidden" name="patient_No" value="{{$patient->id}}">

      <br>
      <div class="col-12" style="padding:5px">
        <a role="button" href="{{ route ('history',$patient->id) }}" class="btn btn-danger" style="font-weight:bold; color:white; background-color:##ff0a54"> cancel </a>
        <button type="submit" class="btn btn-success" style="font-weight:bold; margin-left:75%"> Submit </button>
    </div>

    </form>


@endsection