@extends('layout')
@section('content')
@if ($message = Session::get('success'))
        <div id="success-msg" class="alert alert-success">
            <p>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cloud-check" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                    <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                </svg>&ensp;<strong>{{$message}}</strong>
            </p>
        </div>
        <script>
            setTimeout(function() {
                $('#success-msg').fadeOut('fast');
            }, 2000); // Delay the fade out by 3 seconds
        </script>
@endif
<div class="container" style="margin-top:20px">
<div class="row row-cols-1 row-cols-md-5 mb-6 text-center">
<div class="col">
        <div>
          <a class="btn btn-outline-primary" id="bluebutton" href="{{route ('user.create')}}" role="button" style="border-radius:5px; font-weight:bold; background-color:#BDCDD6; box-shadow: 0 0 8px 0 #000000"> <strong> + Add New Staff </strong> </a>
        </div><br>
      </div>
      
      <table class="table table-hover">
        <thead>
            <tr>
                <th >No.</th>
                <th >Name</th>
                <th >Designation</th>
                <th >Phone No.</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        @php($i=0)
        @foreach($staffs as $staff)
        
        <tr class="hover-row">
            <td >{{++$i}}</td>
            <td >{{$staff->name}}</td>
            <td >{{$staff->user_position}}</td>
            <td >{{$staff->mobile}}</td>
            <td>
                    <a class="btn btn-info" href="{{ route('user.edit', $staff->id) }}" style="font-weight:bold" role="button">Edit</a>
                    <a class="btn btn-danger" style="font-weight:bold" onclick="openPopup2({{ $staff->id }})">Delete</a>
            </td>
        </tr>
        <div id="popup2" class="popup">
    <div class="popup-content">
        <h2>Confirmation</h2>
        <p>Are you sure you want to delete?</p>
        <button class="btn btn-info" style="font-weight:bold" type="button" onclick="deleteStaff()">Yes</button>
        <a class="btn btn-info" style="font-weight:bold" onclick="closePopup2()">No</a>
    </div>
</div>
     
 
        @endforeach
</div>
</div>

<script>
   let currentStaffId;

function openPopup2(staffId) {
    currentStaffId = staffId;
    var popup = document.getElementById('popup2');
    popup.style.display = 'flex';
}

function closePopup2() {
    var popup = document.getElementById('popup2');
    popup.style.display = 'none';
}

function deleteStaff() {
    if (currentStaffId !== null) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '{{ route('user.destroy', ':staffId') }}'.replace(':staffId', currentStaffId);

        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = '{{ csrf_token() }}';

        const methodInput = document.createElement('input');
        methodInput.type = 'hidden';
        methodInput.name = '_method';
        methodInput.value = 'DELETE';

        form.appendChild(csrfInput);
        form.appendChild(methodInput);

        document.body.appendChild(form);
        form.submit();
    }

    closePopup2();
}
</script>

@endsection()