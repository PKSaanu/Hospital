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
@if ($message = Session::get('error'))
        <div id="success-msg" class="alert alert-danger">
            <p>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
          <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
          <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
          </svg>&ensp;<strong>{{$message}}</strong>
            </p>
        </div>
        <script>
            setTimeout(function() {
                $('#success-msg').fadeOut('fast');
            }, 1500); // Delay the fade out by 1.5 seconds
        </script>
@endif
<form class="row g-3" method="POST" action="{{ route('treatment.store') }}" style="padding:10px">
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


        <h3>Visit Form</h3>
        <div class="p-2" style="font-weight:bold; background: linear-gradient(90deg, rgba(184,184,189,1) 33%, rgba(152,152,161,1) 48%, rgba(42,43,43,1) 100%); border-radius:5px"> Visit Details </div>
            <div class="col-4">
                <label class="form-label">Date</label>
                <input type="Date" class="form-control" id="DateInput" name ="Date" required >
            </div>
            <div class="col-4">
                <label class="form-label">Visit No.</label>
                <input type="text" class="form-control" name="Visit_No"  id="visitNoInput">
            </div>

            <div class="col-4">
                <label class="form-label">Name</label>
                <select name="Staff_Name" class="form-select"  aria-label="Default select example" required>
                    @foreach($staff as $sta)
                    <option value="{{$sta->name}}">{{$sta->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="p-2" style="font-weight:bold; margin-left:2.8%; margin-right:2.8%; background: linear-gradient(90deg, rgba(184,184,189,1) 33%, rgba(152,152,161,1) 48%, rgba(42,43,43,1) 100%); border-radius:5px"> Complaints </div><br>
        <div style="display:flex; flex-direction:row">
        &emsp;<div class="col-md-3">
          <input type ="checkbox" name="Complaint[]" value="Vaginal Bleeding "> Vaginal Bleeding <br><br>
          <input type ="checkbox" name="Complaint[]" value="Dribbling"> Dribbling <br><br>
        </div> 
        <div class="col-md-3" >
          <input type ="checkbox" name="Complaint[]" value="Abdominal Pain"> Abdominal Pain <br><br>
          <input type ="checkbox" name="Complaint[]" value="Back Pain"> Back Pain <br><br>
      </div>
        <div class="col-md-3" >
          <input type ="checkbox" name="Complaint[]" value="Show"> Show <br><br>
          <input type ="checkbox" name="Complaint[]" value="Vomiting"> Reduced fetal movements <br><br>
        </div>
        <div class="col-md-3">
          <input type ="checkbox" name="Complaint[]" value=" Vaginal Discharge "> Vaginal Discharge <br> <br>
          <input type ="checkbox" name="Complaint[]" value="Show"> Blood Sugar Series <br><br>
        </div>
      </div>
      &emsp;<label>Other :</label> &emsp;
        <div class="checkbox-group1" style="margin-left:1.5%">
        &emsp;<textarea name="Complaints"  id="Comp-input" placeholder="if no complaints type- null" cols="50"> </textarea>
        </div>
        
        <br>
        <div class="p-2" style="font-weight:bold; margin-left:2.8%; margin-right:2.8%; background: linear-gradient(90deg, rgba(184,184,189,1) 33%, rgba(152,152,161,1) 48%, rgba(42,43,43,1) 100%); border-radius:5px"> Examination </div><br>
        <div class="checkbox-group1" style="margin-left:1.5%">
                &emsp;<lable>Blood presure:</label>&emsp;
                <input  type="number" name="Exam_Blood[]" placeholder="mmHg" style="width:10%" required> /
                <input  type="number" name="Exam_Blood[]" placeholder="mmHg" style="width:10%" required > &emsp;&emsp;&emsp;
                <lable>Pulse rate:</label>&emsp;
                <input  type="number" name="Exam_Pulse" placeholder="bpm" required><br><br>
                &emsp;<lable>Symphysis fundal height:</label>&emsp;
                <input  type="number" name="Symphysis_fundal_height" placeholder="cm" style="width:260px"><br><br>
                &emsp;<lable>Head :</label>&emsp;
                <select name="Head" class="p-2 text-dark bg-light border border-dark-subtle rounded-3" style="width:300px">
                    <option  selected aria-label="Disabled select example" disabled >Select Head
                    <option > engaged
                    <option > Not
                </select> &emsp;&emsp;&emsp;
                <lable>Head :</label>&emsp;
                <input  type="number" name="Head2" placeholder="value/5" style="width:260px"><br><br>
                &emsp;<label>Other :</label> <br>&emsp;
                <textarea name="Exam_Other" id="Exam-input" placeholder="Enter your text here" cols="50"> </textarea>
        </div>

        <br>
        <div class="p-2" style="font-weight:bold; margin-left:2.8%; margin-right:2.8%; background: linear-gradient(90deg, rgba(184,184,189,1) 33%, rgba(152,152,161,1) 48%, rgba(42,43,43,1) 100%); border-radius:5px"> Management </div><br>
        <div class="col-md-12" style="margin-left:1.5%">
            <div style="display:flex; flex-direction:row">
                &emsp;<div class="col-md-2"> <lable>FBC :</label> </div>
                <div class="col-md-2"> <lable>WBC </label><br> <input type="text" name="Manage_WBC" placeholder="count/mm³" style="width:120px" > </div>
                <div class="col-md-2"> <lable>Hb </label><br>  <input type="text" name="Manage_Hb"  placeholder="g/dL" style="width:120px"> </div>
                <div class="col-md-2"> <lable>P/t </label><br>  <input type="text" name="Manage_p_t" placeholder="count/mm³" style="width:120px"> </div>
            </div>
        </div><br>
        <div class="col-md-12" style="margin-left:1.5%">
            <div style="display:flex; flex-direction:row">
            &emsp;<div class="col-md-2"> <lable>UFR :</label>&emsp; </div>
            <div class="col-md-2"> <lable>White cells </label><br>  <input type="text" name="Manage_WhiteCells" placeholder="/hpf" style="width:120px"> </div>
            <div class="col-md-2"> <lable>Red cells </label><br>  <input type="text" name="Manage_Redcells" placeholder="/hpf" style="width:120px"> </div>
            <div class="col-md-2"> <lable>Protein </label><br>                 
            <select name="Manage_Protein" class="p-2 text-dark bg-light border border-dark-subtle rounded-3" style="width:140px; height=5px">
                    <option  selected aria-label="Disabled select example" disabled >Select Protein
                    <option > nil
                    <option > trace
                    <option > +
                    <option > 2+
                    <option > 3+
            </select> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            </div>    
                    </div><br>
        <div class="col-md-12" style="margin-left:1.5%">
            <div style="display:flex; flex-direction:row">
            <div class="col-md-2"> <lable>SE :</label> </div>
            <div class="col-md-2"> <lable>K+ </label><br>  <input type="text" name="Manage_K" placeholder="mmol/l" style="width:120px"> </div>
            <div class="col-md-2"> <lable>Na+ </label><br>  <input type="text" name="Manage_Na" placeholder="mmol/l"  style="width:120px"> </div>
            </div>    
        </div><br>
        <div class="col-md-12" style="margin-left:1.5%">
            <div style="display:flex; flex-direction:row">
            <div class="col-md-2"> <lable>CRP :</label></div> 
            <div class="col-md-2"> <input type="text" name="Manage_CRP" placeholder="mg/DL" style="width:120px"> </div>
            </div>    
        </div><br>
        <div class="col-md-12" style="margin-left:1.5%">
            <div style="display:flex; flex-direction:row">
            <div class="col-md-2"> <lable>FBS :</label></div> 
            <div class="col-md-2"> <input type="text" name="Manage_FBS" placeholder="mmol/l" style="width:120px"> </div>
            </div>    
        </div><br>
        <div class="col-md-12" style="margin-left:1.5%">
            <div style="display:flex; flex-direction:row">
            <div class="col-md-2"> <lable>PPBS :</label> </div>
            <div class="col-md-2"> <lable>AB </label><br>  <input type="text" name="Manage_AB" style="width:120px"> </div>
            <div class="col-md-2"> <lable>AL </label><br> <input type="text" name="Manage_AL" style="width:120px"> </div>
            <div class="col-md-2"> <lable>AD </label><br>  <input type="text" name="Manage_AD" style="width:120px"> </div>
            </div>    
        </div><br>
        <div class="col-md-12" style="margin-left:1.5%">
                    <label>Other :</label> <br>&emsp;
                    <textarea name="Manage_Other"  id="Manage-input" placeholder="Enter your text here" cols="50"> </textarea>  
        </div><br>
        
        <div class="p-2" style="font-weight:bold; margin-left:1.5%; margin-right:3.8%; background: linear-gradient(90deg, rgba(184,184,189,1) 33%, rgba(152,152,161,1) 48%, rgba(42,43,43,1) 100%); border-radius:5px"> Decision (must select one) </div><br>
        <div style="display:flex; flex-direction:row">
        <div class="col-md-3" >
          <input type ="checkbox" name="Decision[]" value="EL|LSCS "> EL|LSCS<br><br>
          <input type ="checkbox" name="Decision[]" value="Induction of Labour"> Induction of Labour <br><br>
          <input type ="checkbox" name="Decision[]" value="NVD" selected> NVD <br><br>
        </div> 
        <div class="col-md-3" >
          <input type ="checkbox" name="Decision[]" value="EM|LSCS "> EM|LSCS<br><br>
          <input type ="checkbox" name="Decision[]" value="Augmentation of Labour"> Augmentation of Labour <br><br>
          <input type ="checkbox" name="Decision[]" value="Continue same management " > Continue same management <br><br>
        </div> 
        <div class="col-md-3" >
          <input type ="checkbox" name="Decision[]" value="Blood transfusion"> Blood transfusion <br><br>
          <input type ="checkbox" name="Decision[]" value="ARM"> ARM <br><br>
      </div>
        <div class="col-md-3" >
          <input type ="checkbox" name="Decision[]" value=" Continue MNT "> Continue MNT <br> <br>
          <input type ="checkbox" name="Decision[]" value="Show"> Blood Sugar Series <br><br>
        </div>
      </div>
      &emsp;<label>Other :</label> &emsp;
        <div class="checkbox-group1" style="margin-left:1.5%">
        &emsp;<textarea name="Decisions"  id="Dec-input" placeholder="Enter your text here" cols="50"> </textarea>
        </div><br>

    <input type="hidden" name="patient_No" value="{{$patient->id}}">
    <div class="col-12" style="padding:5px">
    <a role="button" id="cancelButton" class="btn btn-danger" style="font-weight:bold; color:white; background-color:#ff0a54">Cancel</a>
    <button type="submit" class="btn btn-success" style="font-weight:bold; margin-left:75%"> Submit </button>
    </div>
                   
</form>

<script>
$(document).ready(function() {
    var inputField = $('#Comp-input');
    var selectedWords = [];

    inputField.on('input', function() {
        var term = inputField.val().trim();
        var lastWordStartIndex = term.lastIndexOf(',');

        if (lastWordStartIndex !== -1 && lastWordStartIndex < term.length - 1) {
            term = term.substring(lastWordStartIndex + 1).trim();
        } else {
            term = inputField.val().trim();
        }

        if (term !== "") {
            inputField.autocomplete('search', term);
        } else {
            inputField.autocomplete('close');
        }
    });

    inputField.autocomplete({
        source: function(request, response) {
            var term = request.term.trim();

            // If the input term is empty or ends with a comma, don't make the AJAX call
            if (term === '' || term.endsWith(',')) {
                response([]);
                return;
            }

            $.ajax({
                url: '/autocomplete1',
                dataType: 'json',
                data: {
                    term: term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 0,
        select: function(event, ui) {
            // Add the selected word to the array of selected words
            selectedWords.push(ui.item.value);
            // Update the input field with the selected words separated by commas
            inputField.val(selectedWords.join(','));
            return false; // Prevent default behavior of autocomplete select
        }
    });
});
$(document).ready(function() {
    var inputField = $('#Exam-input');
    var selectedWords = [];

    inputField.on('input', function() {
        var term = inputField.val().trim();
        var lastWordStartIndex = term.lastIndexOf(',');

        if (lastWordStartIndex !== -1 && lastWordStartIndex < term.length - 1) {
            term = term.substring(lastWordStartIndex + 1).trim();
        } else {
            term = inputField.val().trim();
        }

        if (term !== "") {
            inputField.autocomplete('search', term);
        } else {
            inputField.autocomplete('close');
        }
    });

    inputField.autocomplete({
        source: function(request, response) {
            var term = request.term.trim();

            // If the input term is empty or ends with a comma, don't make the AJAX call
            if (term === '' || term.endsWith(',')) {
                response([]);
                return;
            }

            $.ajax({
                url: '/autocomplete2',
                dataType: 'json',
                data: {
                    term: term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 0,
        select: function(event, ui) {
            // Add the selected word to the array of selected words
            selectedWords.push(ui.item.value);
            // Update the input field with the selected words separated by commas
            inputField.val(selectedWords.join(','));
            return false; // Prevent default behavior of autocomplete select
        }
    });
});
$(document).ready(function() {
    var inputField = $('#Manage-input');
    var selectedWords = [];

    inputField.on('input', function() {
        var term = inputField.val().trim();
        var lastWordStartIndex = term.lastIndexOf(',');

        if (lastWordStartIndex !== -1 && lastWordStartIndex < term.length - 1) {
            term = term.substring(lastWordStartIndex + 1).trim();
        } else {
            term = inputField.val().trim();
        }

        if (term !== "") {
            inputField.autocomplete('search', term);
        } else {
            inputField.autocomplete('close');
        }
    });

    inputField.autocomplete({
        source: function(request, response) {
            var term = request.term.trim();

            // If the input term is empty or ends with a comma, don't make the AJAX call
            if (term === '' || term.endsWith(',')) {
                response([]);
                return;
            }

            $.ajax({
                url: '/autocomplete3',
                dataType: 'json',
                data: {
                    term: term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 0,
        select: function(event, ui) {
            // Add the selected word to the array of selected words
            selectedWords.push(ui.item.value);
            // Update the input field with the selected words separated by commas
            inputField.val(selectedWords.join(','));
            return false; // Prevent default behavior of autocomplete select
        }
    });
});
$(document).ready(function() {
    var inputField = $('#Dec-input');
    var selectedWords = [];

    inputField.on('input', function() {
        var term = inputField.val().trim();
        var lastWordStartIndex = term.lastIndexOf(',');

        if (lastWordStartIndex !== -1 && lastWordStartIndex < term.length - 1) {
            term = term.substring(lastWordStartIndex + 1).trim();
        } else {
            term = inputField.val().trim();
        }

        if (term !== "") {
            inputField.autocomplete('search', term);
        } else {
            inputField.autocomplete('close');
        }
    });

    inputField.autocomplete({
        source: function(request, response) {
            var term = request.term.trim();

            // If the input term is empty or ends with a comma, don't make the AJAX call
            if (term === '' || term.endsWith(',')) {
                response([]);
                return;
            }

            $.ajax({
                url: '/autocomplete4',
                dataType: 'json',
                data: {
                    term: term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 0,
        select: function(event, ui) {
            // Add the selected word to the array of selected words
            selectedWords.push(ui.item.value);
            // Update the input field with the selected words separated by commas
            inputField.val(selectedWords.join(','));
            return false; // Prevent default behavior of autocomplete select
        }
    });
});    
  window.addEventListener('DOMContentLoaded', function() {
    var textarea1 = document.getElementById('Comp-input');
    var placeholderText1 = '';

    textarea1.value = placeholderText1;

    textarea1.addEventListener('focus', function() {
      if (textarea1.value === placeholderText1) {
        textarea1.value = '';
      }
    });

    textarea1.addEventListener('blur', function() {
      if (textarea1.value === '') {
        textarea1.value = placeholderText1;
      }
    });

    var textarea2 = document.getElementById('Exam-input');
    var placeholderText2 = '';

    textarea2.value = placeholderText2;

    textarea2.addEventListener('focus', function() {
      if (textarea2.value === placeholderText2) {
        textarea2.value = '';
      }
    });

    textarea2.addEventListener('blur', function() {
      if (textarea2.value === '') {
        textarea2.value = placeholderText2;
      }
    });

    var textarea3 = document.getElementById('Manage-input');
    var placeholderText3 = '';

    textarea3.value = placeholderText3;

    textarea3.addEventListener('focus', function() {
      if (textarea3.value === placeholderText3) {
        textarea3.value = '';
      }
    });

    textarea3.addEventListener('blur', function() {
      if (textarea3.value === '') {
        textarea3.value = placeholderText3;
      }
    });
  });

  var textarea2 = document.getElementById('Dec-input');
    var placeholderText2 = '';

    textarea2.value = placeholderText2;

    textarea2.addEventListener('focus', function() {
      if (textarea2.value === placeholderText2) {
        textarea2.value = '';
      }
    });

    textarea2.addEventListener('blur', function() {
      if (textarea2.value === '') {
        textarea2.value = placeholderText2;
      }
    });

    document.addEventListener("DOMContentLoaded", function () {
        var currentRoute = "{{ Route::currentRouteName() }}";
        var patientID = "{{ $patient->id }}";
        var cancelButton = document.getElementById('cancelButton');

        if (currentRoute === "visit") {
            document.getElementById("visitNoInput").value = "1";
            document.getElementById("DateInput").value = "null";
            var daytodayRoute = "{{ route('daytoday', $patient->id) }}";
            cancelButton.href = daytodayRoute;
        } else if (currentRoute === "subvisit") {
            var visit = "{{ $visit }}"; 
            var date = "{{ $date }}"; 
            document.getElementById("visitNoInput").value = visit;
            document.getElementById("DateInput").value = date;
            var subvisitRoute = "{{ route('DayShow',['date' => ':date', 'patient_id' => ':patient_id']) }}"
                .replace(':date', date)
                .replace(':patient_id', patientID);
            cancelButton.href = subvisitRoute;
        }
        cancelButton.addEventListener('click', function(event) {
            event.preventDefault();
            var targetUrl = cancelButton.href;
            window.location.href = targetUrl;
        });
    });

</script>



@endsection