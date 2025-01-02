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

<form class="row g-3" method="POST" action="{{ route('treatupdate', ['date' => $treatment->Date, 'patient_id' => $treatment->Patient_ID,'visit'=>$treatment->Visit_No]) }}" style="padding:10px">
        @csrf
       @method('PATCH')


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
        <h3>Change Visit</h3>
        <div class="p-2" style="font-weight:bold; background: linear-gradient(90deg, rgba(184,184,189,1) 33%, rgba(152,152,161,1) 48%, rgba(42,43,43,1) 100%); border-radius:5px"> Visit Details </div>
            <div class="col-4">
                <label class="form-label">Date</label>
                <input type="Date" class="form-control" id="DateInput" name ="Date" value="{{ $treatment->Date }}">
            </div>
            <div class="col-4">
                <label class="form-label">Visit No.</label>
                <input type="text" class="form-control" name="Visit_No"  id="visitNoInput" value="{{ $treatment->Visit_No }}">
            </div>

            <div class="col-4">
                <label class="form-label">Name</label>
                <select name="Staff_Name" class="form-select" aria-label="Default select example" required>
                    @foreach($staff as $sta)
                        <option value="{{$sta->name}}" @if($sta->name === $treatment->Staff_Name) selected @endif>{{$sta->name}}</option>
                    @endforeach
                </select>

            </div>
        </div>

        <div class="p-2" style="font-weight:bold; margin-left:2.8%; margin-right:2.8%; background: linear-gradient(90deg, rgba(184,184,189,1) 33%, rgba(152,152,161,1) 48%, rgba(42,43,43,1) 100%); border-radius:5px"> Complaints </div><br>
        <div style="display:flex; flex-direction:row">
        <div class="col-md-3" style="margin-left:10px; width:230px">
            <input type="checkbox" name="Complaint[]" value="Vaginal Bleeding" @if(in_array('Vaginal Bleeding', explode(',', $treatment->Basic_Complaint))) checked @endif> Vaginal Bleeding <br><br>
            <input type="checkbox" name="Complaint[]" value="Dribbling" @if(in_array('Dribbling', explode(',', $treatment->Basic_Complaint))) checked @endif> Dribbling <br><br>
        </div>
        <div class="col-md-3" style="margin-left:10px">
            <input type="checkbox" name="Complaint[]" value="Abdominal Pain" @if(in_array('Abdominal Pain', explode(',', $treatment->Basic_Complaint))) checked @endif> Abdominal Pain <br><br>
            <input type="checkbox" name="Complaint[]" value="Back Pain" @if(in_array('Back Pain', explode(',', $treatment->Basic_Complaint))) checked @endif> Back Pain <br><br>
        </div>
        <div class="col-md-3" style="margin-left:10px; width:180px">
            <input type="checkbox" name="Complaint[]" value="Show" @if(in_array('Show', explode(',', $treatment->Basic_Complaint))) checked @endif> Show <br><br>
            <input type="checkbox" name="Complaint[]" value="Vomiting" @if(in_array('Vomiting', explode(',', $treatment->Basic_Complaint))) checked @endif> Reduced fetal movements <br><br>
        </div>
        <div class="col-md-3" style="margin-left:10px">
            <input type="checkbox" name="Complaint[]" value="Vaginal Discharge" @if(in_array('Vaginal Discharge', explode(',', $treatment->Basic_Complaint))) checked @endif> Vaginal Discharge <br><br>
            <input type="checkbox" name="Complaint[]" value="Blood Sugar Series" @if(in_array('Blood Sugar Series', explode(',', $treatment->Basic_Complaint))) checked @endif> Blood Sugar Series <br><br>
        </div>
      </div>
      &emsp;<label>Other :</label> &emsp;
        <div class="checkbox-group1" style="margin-left:1.5%">
        &emsp;<textarea name="Complaints"  id="Comp-input" placeholder="Enter your text here" cols="50">{{$treatment->Complaints}} </textarea>
        </div>
        
        <br>
        <div class="p-2" style="font-weight:bold; margin-left:2.8%; margin-right:2.8%; background: linear-gradient(90deg, rgba(184,184,189,1) 33%, rgba(152,152,161,1) 48%, rgba(42,43,43,1) 100%); border-radius:5px"> Examination </div><br>
        <div class="checkbox-group1" style="margin-left:1.5%">
        <label>Blood pressure:</label>&emsp;
        <input type="number" name="Exam_Blood[]" placeholder="mmHg" style="width:80px" value="{{ explode('/', $treatment->Exam_Blood)[0] }}"> /
        <input type="number" name="Exam_Blood[]" placeholder="mmHg" style="width:80px" value="{{ explode('/', $treatment->Exam_Blood)[1] }}">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <lable>Pulse rate:</label>&emsp;
                <input  type="number" name="Exam_Pulse" placeholder="bpm" value="{{$treatment->Exam_Pulse}}"><br><br>
                <lable>Symphysis fundal height:</label>&emsp;
                <input  type="number" name="Symphysis_fundal_height" placeholder="cm" style="width:260px" value="{{$treatment->Symphysis_fundal_height}}"><br><br>
                <lable>Head :</label>&emsp;
                <select name="Head" class="p-2 text-dark bg-light border border-dark-subtle rounded-3" style="width:300px">
                    <option disabled selected>Select Head</option>
                    <option @if($treatment->Head === 'engaged') selected @endif>engaged</option>
                    <option @if($treatment->Head === 'Not') selected @endif>Not</option>
                </select> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <lable>Head :</label>&emsp;
                <input  type="number" name="Head2" placeholder="value/5" style="width:260px" value="{{$treatment->Head2}}"><br><br>
                <label>Other :</label> <br>&emsp;
                <textarea name="Exam_Other" id="Exam-input" placeholder="Enter your text here" cols="50">{{$treatment->Exam_Other}} </textarea>
        </div>

        <br>
        <div class="p-2" style="font-weight:bold; margin-left:2.8%; margin-right:2.8%; background: linear-gradient(90deg, rgba(184,184,189,1) 33%, rgba(152,152,161,1) 48%, rgba(42,43,43,1) 100%); border-radius:5px"> Management </div><br>
        <div class="col-md-12" style="margin-left:1.5%">
            <div style="display:flex; flex-direction:row">
            &emsp;<div class="col-md-2"> <lable>FBC :</label> </div>
                <div class="col-md-2"> <lable>WBC </label><br> <input type="text" name="Manage_WBC" placeholder="count/mm³" style="width:120px" value="{{$treatment->Manage_WBC}}"> </div>
                <div class="col-md-2"> <lable>Hb </label><br>  <input type="text" name="Manage_Hb"  placeholder="g/dL" style="width:120px" value="{{$treatment->Manage_Hb}}"> </div>
                <div class="col-md-2"> <lable>P/t </label><br>  <input type="text" name="Manage_p_t" placeholder="count/mm³" style="width:120px" value="{{$treatment->Manage_p_t}}"> </div>
            </div>
        </div><br>
        <div class="col-md-12" style="margin-left:1.5%">
            <div style="display:flex; flex-direction:row">
            &emsp;<div class="col-md-2"> <lable>UFR :</label>&emsp; </div>
            <div class="col-md-2"> <lable>White cells </label><br>  <input type="text" name="Manage_WhiteCells" placeholder="/hpf" style="width:120px" value="{{$treatment->Manage_WhiteCells}}"> </div>
            <div class="col-md-2"> <lable>Red cells </label><br>  <input type="text" name="Manage_Redcells" placeholder="/hpf" style="width:120px" value="{{$treatment->Manage_Redcells}}"> </div>
            <div class="col-md-2"> <lable>Protein </label><br>                 
            <select name="Manage_Protein" class="p-2 text-dark bg-light border border-dark-subtle rounded-3" style="width:110px; height:35px">
                <option disabled>Select Protein</option>
                <option value="nil" @if($treatment->Manage_Protein === 'nil') selected @endif>nil</option>
                <option value="trace" @if($treatment->Manage_Protein === 'trace') selected @endif>trace</option>
                <option value="+" @if($treatment->Manage_Protein === '+') selected @endif>+</option>
                <option value="2+" @if($treatment->Manage_Protein === '2+') selected @endif>2+</option>
                <option value="3+" @if($treatment->Manage_Protein === '3+') selected @endif>3+</option>
            </select> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            </div>    
                    </div><br>
        <div class="col-md-12" style="margin-left:1.5%">
            <div style="display:flex; flex-direction:row">
            <div class="col-md-2"> <lable>SE :</label> </div>
            <div class="col-md-2"> <lable>K+ </label><br>  <input type="text" name="Manage_K" placeholder="mmol/l" style="width:120px" value="{{$treatment->Manage_K}}"> </div>
            <div class="col-md-2"> <lable>Na+ </label><br>  <input type="text" name="Manage_Na" placeholder="mmol/l"  style="width:120px" value="{{$treatment->Manage_Na}}"> </div>
            </div>    
        </div><br>
        <div class="col-md-12" style="margin-left:1.5%">
            <div style="display:flex; flex-direction:row">
            <div class="col-md-2"> <lable>CRP :</label></div> 
            <div class="col-md-2"> <input type="text" name="Manage_CRP" placeholder="mg/DL" style="width:120px" value="{{$treatment->Manage_CRP}}"> </div>
            </div>    
        </div><br>
        <div class="col-md-12" style="margin-left:1.5%">
            <div style="display:flex; flex-direction:row">
            <div class="col-md-2"> <lable>FBS :</label></div> 
            <div class="col-md-2"> <input type="text" name="Manage_FBS" placeholder="mmol/l" style="width:120px" value="{{$treatment->Manage_FBS}}"> </div>
            </div>    
        </div><br>
        <div class="col-md-12" style="margin-left:1.5%">
            <div style="display:flex; flex-direction:row">
            <div class="col-md-2"> <lable>PRBS :</label> </div>
            <div class="col-md-2"> <lable>AB </label><br>  <input type="text" name="Manage_AB" style="width:120px" value="{{$treatment->Manage_AB}}"> </div>
            <div class="col-md-2"> <lable>AL </label><br> <input type="text" name="Manage_AL" style="width:120px" value="{{$treatment->Manage_AL}}"> </div>
            <div class="col-md-2"> <lable>AD </label><br>  <input type="text" name="Manage_AD" style="width:120px" value="{{$treatment->Manage_AD}}"> </div>
            </div>    
        </div><br>
        <div class="col-md-12" style="margin-left:1.5%">
                    <label>Other :</label> <br>&emsp;
                    <textarea name="Manage_Other"  id="Manage-input" placeholder="Enter your text here" cols="50"> {{$treatment->Manage_Other}}</textarea>  
        </div><br>
        <div class="p-2" style="font-weight:bold; margin-left:1.5%; margin-right:3.8%; background: linear-gradient(90deg, rgba(184,184,189,1) 33%, rgba(152,152,161,1) 48%, rgba(42,43,43,1) 100%); border-radius:5px"> Decision </div><br>
        <div style="display:flex; flex-direction:row">
        <div class="col-md-3" style="margin-left:10px; width:230px">
            <input type="checkbox" name="Decision[]" value="EL|LSCS" @if(in_array('EL|LSCS', explode(',', $treatment->Basic_Decision))) checked @endif> EL|LSCS <br><br>
            <input type="checkbox" name="Decision[]" value="Induction of Labour" @if(in_array('Induction of Labour', explode(',', $treatment->Basic_Decision))) checked @endif> Induction of Labour <br><br>
            <input type="checkbox" name="Decision[]" value="Keep" @if(in_array('Keep', explode(',', $treatment->Basic_Decision))) checked @endif> Keep <br><br>
        </div>
        <div class="col-md-3" style="margin-left:10px; width:230px">
            <input type="checkbox" name="Decision[]" value="EM|LSCS" @if(in_array('EM|LSCS', explode(',', $treatment->Basic_Decision))) checked @endif> EM|LSCS <br><br>
            <input type="checkbox" name="Decision[]" value="Augmentation of Labour" @if(in_array('Augmentation of Labour', explode(',', $treatment->Basic_Decision))) checked @endif> Augmentation of Labour <br><br>
            <input type="checkbox" name="Decision[]" value="Continue same management" @if(in_array('Continue same management', explode(',', $treatment->Basic_Decision))) checked @endif> Continue same management <br><br>
        </div>
        <div class="col-md-3" style="margin-left:10px">
            <input type="checkbox" name="Decision[]" value="Blood transfusion" @if(in_array('Blood transfusion', explode(',', $treatment->Basic_Decision))) checked @endif> Blood transfusion <br><br>
            <input type="checkbox" name="Decision[]" value="ARM" @if(in_array('ARM', explode(',', $treatment->Basic_Decision))) checked @endif> ARM <br><br>
        </div>
        <div class="col-md-3" style="margin-left:10px">
            <input type="checkbox" name="Decision[]" value="Continue MNT" @if(in_array('Continue MNT', explode(',', $treatment->Basic_Decision))) checked @endif> Continue MNT <br> <br>
            <input type="checkbox" name="Decision[]" value="Blood Sugar Series" @if(in_array('Blood Sugar Series', explode(',', $treatment->Basic_Decision))) checked @endif> Blood Sugar Series <br><br>
        </div>

      </div>
      &emsp;<label>Other :</label> &emsp;
        <div class="checkbox-group1" style="margin-left:1.5%">
        &emsp;<textarea name="Decisions"  id="Dec-input" placeholder="Enter your text here" cols="50">{{$treatment->Decisions}} </textarea>
        </div><br>

    <input type="hidden" name="patient_No" value="{{$patient->id}}">
    <div class="col-12" style="padding:5px">
        <a role="button" href="{{route('DayShow',['date' => $treatment->Date, 'patient_id' => $treatment->Patient_ID])}}" class="btn btn-danger" style="font-weight:bold; color:white; background-color:#ff0a54" > Cancel </a>
        <button type="submit" class="btn btn-success" style="font-weight:bold; margin-left:75%"  role="button"> Update </button>
    </div>
                   
</form>


@endsection
