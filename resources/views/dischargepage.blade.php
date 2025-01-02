@extends('patient_layout',['patient'=>$patient])
@section('content1')

@if ($message = Session::get('success'))
        <div id="success-msg" class="alert alert-success">
            <p>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
              <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
              <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
            </svg>&ensp;<strong>{{$message}}</strong>
            </p>
        </div>
        <script>
            setTimeout(function() {
                $('#success-msg').fadeOut('fast');
            }, 1500); // Delay the fade out by 1.5 seconds
        </script>
@endif

<form class="row g-3" method="POST" action="" style="padding:10px">
        @csrf

        <!-- THIS FIELD FOR ERROR MSG -->
        <div style="position:fixed;width:70%;align:center" >
                @if ($errors->any())
                    <div class="alert alert-danger" id="error-msg">
                        <u1>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </u1>
                        <div class="alert alert-danger" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                                <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                            </svg>
                            &ensp;<strong>So please insert again correctly !!!</strong>
                        </div>
                        </div>
                <br/>
                    <script>
                        setTimeout(function() {
                            $('#error-msg').fadeOut('fast');
                        }, 4000); // Delay the fade out by 1.5 seconds
                    </script>
                @endif
        </div>

        <br>
        <div class="p-2 bg-secondary bg-opacity-10" style="font-weight:bold"> Visit Details </div>
            <div class="col-6">
                <label class="form-label">Date</label>
                <input type="Date" class="form-control" name ="date">
            </div>
            <div class="col-4">
                <label class="form-label">Visit No.</label>
                <input type="text" class="form-control" name="visit">
            </div>
            
        </div>
        <div class="p-2 bg-secondary bg-opacity-10" style="font-weight:bold; margin-left:1.5%; margin-right:1.5%"> Examination </div><br>
        <div class="checkbox-group1">
                <input type="checkbox" name="Exam[]" value="Option 1"> Option 1
                <input type="checkbox" name="Exam[]" value="Option 2"> Option 2
                <input type="checkbox" name="Exam[]" value="Option 3"> Option 3
                <input type="checkbox" name="Exam[]" value="Option 4"> Option 4
                <input type="checkbox" name="Exam[]" value="Option 5"> Option 5 <br><br>&emsp;
                <label>Other :</label> <br>&emsp;
                <textarea name="other_Exam" id="other-input1" cols="100"> </textarea>
        </div>
        <br>
        <div class="p-2 bg-secondary bg-opacity-10" style="font-weight:bold; margin-left:1.5%; margin-right:1.5%"> Investigation </div><br>
        <div class="checkbox-group1">
                <input type="checkbox" name="Invest[]" value="Option 1"> Option 1
                <input type="checkbox" name="Invest[]" value="Option 2"> Option 2
                <input type="checkbox" name="Invest[]" value="Option 3"> Option 3
                <input type="checkbox" name="Invest[]" value="Option 4"> Option 4
                <input type="checkbox" name="Invest[]" value="Option 5"> Option 5 <br><br>&emsp;
                <label>Other :</label> <br>&emsp;
                <textarea name="other_Invest" id="other-input1" cols="100"> </textarea>
        </div>
        <br>
        <div class="p-2 bg-secondary bg-opacity-10" style="font-weight:bold; margin-left:1.5%; margin-right:1.5%"> Management </div><br>
        <div class="checkbox-group1">
                <input type="checkbox" name="Manage[]" value="Option 1"> Option 1
                <input type="checkbox" name="Manage[]" value="Option 2"> Option 2
                <input type="checkbox" name="Manage[]" value="Option 3"> Option 3
                <input type="checkbox" name="Manage[]" value="Option 4"> Option 4
                <input type="checkbox" name="Manage[]" value="Option 5"> Option 5 <br><br>&emsp;
                <label>Other :</label> <br>&emsp;
                <textarea name="other_Manage" id="other-input1" cols="100"> </textarea>
        </div>
        <br>
        <div class="p-2 bg-secondary bg-opacity-10" style="font-weight:bold; margin-left:1.5%; margin-right:1.5%"> Decision </div><br>
        <div class="checkbox-group1">
                <input type="checkbox" name="Decision[]" value="Option 1"> Option 1
                <input type="checkbox" name="Decision[]" value="Option 2"> Option 2
                <input type="checkbox" name="Decision[]" value="Option 3"> Option 3
                <input type="checkbox" name="Decision[]" value="Option 4"> Option 4
                <input type="checkbox" name="Decision[]" value="Option 5"> Option 5 <br><br>&emsp;
                <label>Other :</label> <br>&emsp;
                <textarea name="other_Decision" id="other-input1" cols="100"> </textarea>
        </div><br>

    <div class="col-12" style="padding:5px">
        <a role="button" href="{{ route ('discharge'}}" class="btn btn-info" style="font-weight:bold; color:white; background-color:#1980c1"> << Previous </a>
        <button type="submit" class="btn btn-danger" style="font-weight:bold; margin-left:75%"> Discharge </button>
    </div>
                   
</form>

@endsection