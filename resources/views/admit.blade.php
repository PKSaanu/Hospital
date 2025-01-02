@extends('patient_layout',['patient'=>$patient])
@section('content1')

<form class="row g-3" action="" method="post">
@csrf

<div class="col-md-12">
      <div class="p-2 text-dark bg-primary-subtle rounded-3" >
        <label style="font-weight:bold;">Antenatal Details</label><br>
        <label >Reasons for Admission :</label><br><br>
      <div style="display:flex; flex-direction:row">
        <div class="col-md-3" style="margin-left:10px; width:230px">
          <input type ="checkbox" name="reason[]" value="Admitted as Requested"> Admitted as Requested <br>
          <input type ="checkbox" name="reason[]" value="High Blood Pressure"> High Blood Pressure <br>
          <input type ="checkbox" name="reason[]" value="Respiratory Symptoms"> Respiratory Symptoms <br>
          <input type ="checkbox" name="reason[]" value="Admitted for Investigation "> Admitted for Investigation <br>
          <input type ="checkbox" name="reason[]" value="Admitted for Confinement"> Admitted for Confinement <br>
          <input type ="checkbox" name="reason[]" value="Vaginal Discharge "> Vaginal Discharge <br>
          <input type ="checkbox" name="reason[]" value="Admitted for Blood Pressure Monitoring"> Admitted for Blood Pressure Monitoring<br>
          <input type ="checkbox" name="reason[]" value="Admitted for Confinement"> Admitted for Confinement <br>
        </div> 
        <div class="col-md-3" style="margin-left:10px">
          <input type ="checkbox" name="reason[]" value="Self Admitted">Self Admitted<br>
          <input type ="checkbox" name="reason[]" value="Abdominal Pain"> Abdominal Pain <br>
          <input type ="checkbox" name="reason[]" value="Dribbling/Show"> Dribbling/Show <br>
          <input type ="checkbox" name="reason[]" value="Reduced/Absent Featal"> Reduced/Absent Featal <br>
          <input type ="checkbox" name="reason[]" value="Movements"> Movements  <br>
          <input type ="checkbox" name="reason[]" value="Heart Disease"> Heart Disease <br>
          <input type ="checkbox" name="reason[]" value="Faintishness"> Faintishness <br>
          <input type ="checkbox" name="reason[]" value="Admitted for IV iron therapy"> Admitted for IV iron therapy <br>
      </div>
        <div class="col-md-3" style="margin-left:10px; width:180px">
          <input type ="checkbox" name="reason[]" value="Bleeding_PV"> Bleeding PV <br>
          <input type ="checkbox" name="reason[]" value="Vomiting"> Vomiting <br>
          <input type ="checkbox" name="reason[]" value="Back Pain"> Back Pain <br>
          <input type ="checkbox" name="reason[]" value="GDM"> GDM <br>
          <input type ="checkbox" name="reason[]" value="Diarrhoea"> Diarrhoea <br>
          <input type ="checkbox" name="reason[]" value="Headache & Fever"> Headache & Fever <br>
          <input type ="checkbox" name="reason[]" value="Admitted for Blood Transfusion "> Admitted for Blood Transfusion <br>
        </div>
        <div class="col-md-3" style="margin-left:10px">
          <input type ="checkbox" name="reason[]" value="EM-LSCS"> EM-LSCS <br> 
          <input type ="checkbox" name="reason[]" value="EL-LSCS"> EL-LSCS  <br>
          <input type ="checkbox" name="reason[]" value="NVD"> NVD  <br>
          <input type ="checkbox" name="reason[]" value="BSS"> BSS  <br>
          <input type ="checkbox" name="reason[]" value="Multiple Pregnancy"> Multiple Pregnancy  <br>
          <input type ="checkbox" name="reason[]" value="Readmission"> Readmission <br>
          <input type ="checkbox" name="reason[]" value=" Admitted for Early Induction Labour "> Admitted for Early Induction Labour <br>
        </div>
      </div>
      </div>
      </div>

      <br>
      <div class="col-12" style="padding:5px">
        <a role="button" href="{{ route ('patient.show',$patient->id) }}" class="btn btn-info" style="font-weight:bold; color:white; background-color:#1980c1"> << Previous </a>
        <button type="submit" class="btn btn-success" style="font-weight:bold; margin-left:75%"> Submit </button>
    </div>

</form>

@endsection