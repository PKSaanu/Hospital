@extends('Layout')
@section('content')

<div  style="display:flex; flex-direction:row; box-shadow: 0 0 20px 1px #241468">
  <div class="col-3 p-2 text-dark bg-primary-subtle" style="font-weight:bold">
          <span class="fs-3"  style="font-weight:normal">Patient Profile</span>
          <br><br>
          <hr>
          <div class="col-12">
            <label for="input3" class="form-label">Full Name</label>
            <input type="text" class="form-control" value="{{$patient->Full_name}}" readonly>
          </div>
          <div class="col-12">
            <label for="input4" class="form-label">Address</label>
            <input type="text" class="form-control" value="{{$patient->Address}}" readonly >
          </div>
          <div class="col-md-8">
            <label for="input7" class="form-label">BHT</label>
            <input type="text" class="form-control" value="{{$patient->BHT}}" readonly>
          </div>
          <div class="col-md-8">
            <label for="input12" class="form-label">Blood Group</label>
            <input type="text" class="form-control" value="{{$patient->BloodGroup}}" readonly>
          </div>
          <div class="col-md-8">
            <label for="input8" class="form-label">Age</label>
            <input type="text" class="form-control" value="{{$patient->Age}}" readonly>
          </div>
          <div class="col-md-8">
            <label for="input11" class="form-label">Phone No.</label>
            <input type="text" class="form-control" value="{{$patient->Phone_No}}" readonly>
          </div>
  </div>

  <div class="col-9 text-dark bg-light" style="padding:10px">
        <div class="container">
            @yield('content1')
        </div>
  </div>
</div>
@endsection