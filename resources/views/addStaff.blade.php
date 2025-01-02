@extends('layout')
@section('content')
<form class="row g-3" action="{{route ('user.store')}}" method="post">
@csrf
<div class="fw-semibold"><h3>Enrollment Form</h3></div>
      <div class="col-md-6">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" oninput="capitalizeNames(this)" value="{{ old('name') }}" required>
      </div>
      <div class="col-md-6">
          <label class="form-label">Username</label>
          <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
          @error('username')
              <div class="text-danger">{{ $message }}</div>
          @enderror
      </div>
      <div class="col-md-6">
        <div>
          <label class="form-label">Password</label>
        </div>
        <div class="input-group" >
          <input type="password" name="password" id="staffpassword" class="form-control" required>
          <span class="input-group-text" id="togglePassword4">
              <i class="fa fa-eye-slash"></i>
        </div>
      </div>
      <div class="col-md-6">
        <label class="form-label">Phone No.</label>
        <input type="text" name="mobile" oninput="validatePhoneNumber(this)"  class="form-control" value="{{ old('mobile') }}" required >
        <span id="phone-error-msg" style="display: none; color: red;">Invalid phone number format</span>
      </div>
      <div class="col-md-6">
          <label class="form-label">Designation</label><br>
          <select name="user_position" class="p-2 text-dark bg-light border border-dark-subtle rounded-3" style="width:420px" required>
              <option disabled>Select Designation</option>
              <option value="Consultant" {{ old('user_position') == 'Consultant' ? 'selected' : '' }}>Consultant</option>
              <option value="House Officer" {{ old('user_position') == 'House Officer' ? 'selected' : '' }}>House Officer</option>
              <option value="Senior House Officer" {{ old('user_position') == 'Senior House Officer' ? 'selected' : '' }}>Senior House Officer</option>
              <option value="Registrar" {{ old('user_position') == 'Registrar' ? 'selected' : '' }}>Registrar</option>
              <option value="Others(Demo)" {{ old('user_position') == 'Others(Demo)' ? 'selected' : '' }}>Others(Demo)</option>
          </select>
      </div>

      <input type="hidden" name="role" value="admin">

      <br>
      <div style="padding:5px; text-align:right">
      <button type="submit" class="btn btn-success" style="font-weight:bold" role="button">Enroll</button>&emsp;&ensp;
      <a class="btn btn-danger" style="font-weight:bold" role="button" href="{{ route('staff') }}">Cancel</a>
      </div>

    </form>

    <script>
    const toggleStaffPasswordButton = document.querySelector('#togglePassword4');
    const staffpassword = document.querySelector('#staffpassword');

    toggleStaffPasswordButton.addEventListener('click', function () {
      const type = staffpassword.getAttribute('type') === 'password' ? 'text' : 'password';
      staffpassword.setAttribute('type', type);
      this.querySelector('i').classList.toggle('fa-eye');
      this.querySelector('i').classList.toggle('fa-eye-slash');
    });

    </script>
@endsection()