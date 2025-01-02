@extends('layout')
@section('content')
<form class="row g-3" method="post" action="{{ route ('user.update',$user) }}" >
@csrf
@method("PATCH")
<div class="fw-semibold"><h3>Staff Detail Edit Form</h3></div>
      <div class="col-md-6">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{$user->name}}" oninput="capitalizeNames(this)">
      </div>
      <div class="col-md-6">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" value="{{$user->username}}" oninput="capitalizeNames(this)">
        @error('username')
              <div  style="color: red;">{{ $message }}</div>
          @enderror
      </div>
      <div class="col-md-6">
        <label class="form-label">Phone No.</label>
        <input type="text" name="mobile" oninput="validatePhoneNumber(this)"  class="form-control" value="{{$user->mobile}}">
        <span id="phone-error-msg" style="display: none; color: red;">Invalid phone number format</span>
      </div>
      <br>
      <div class="col-md-6">
        <label class="form-label">Designation</label><br>
        <select name="user_position" class="p-2 text-dark bg-light border border-dark-subtle rounded-3" style="width:420px"  >
          <option selected aria-label="Disabled select example" disabled > Select Designation</option>
          <option @if($user->user_position=== 'Consultant') selected @endif > Consultant</option>
          <option @if($user->user_position=== 'House Officer') selected @endif  > House Officer</option>
          <option @if($user->user_position=== 'Senior House Officer') selected @endif >Senior House Officer</option>
          <option @if($user->user_position=== 'Registrar') selected @endif > Registrar</option>
          <option @if($user->user_position=== 'Others(Demo)') selected @endif > Others(Demo)</option>
        </select>
      </div>
      <input type="hidden" name="role" value="admin">
      <div></div>
      <div style="display:flex; flex-direction:row;">
      <div class="col-md-8">
        <a class="btn btn-info" href="{{ route('reset',$user->id)}}" style="font-weight:bold; box-shadow: 0 0 8px 0 #000000; color:#241468" role="button"> Reset Password </a> &ensp;
      </div>

      <br>
      <div class="col-md-4" style="padding:5px; text-align:right">
      <button type="submit" class="btn btn-success" style="font-weight:bold" role="button">Update</button>&emsp;&ensp;
      <a class="btn btn-danger" style="font-weight:bold" role="button" href="{{ route('staff') }}">Cancel</a>
      </div>
    </div>
    </form>

@endsection()