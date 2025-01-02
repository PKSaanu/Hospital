@extends('patient_layout',['patient'=>$patient])
@section('content1')
<div class="row gy-3" style="padding:10px; margin-left:10px; margin-top:1px">
    <!--  <div class="col-md-3">
        <button type="button" class="btn btn-outline-primary"  href="{{ route ('visit',$patient->id) }}" style="font-weight:bold">History</button>
      </div>-->
    <div class="col-md-3">
        <a type="button"  class="btn btn-outline-info"  style="font-weight:bold"  >Visit 01</a>
    </div>
    <div class="col-md-3">
        <a type="button"  class="btn btn-outline-info" style="font-weight:bold">Visit 02</a>
    </div>
    <div class="col-md-3">
        <a type="button"  class="btn btn-outline-info"  style="font-weight:bold">Visit 03</a>
      </div>
      <div class="col-md-3">
        <a type="button"  class="btn btn-outline-primary"  style="margin-left:80px; font-weight:bold">Finish Visit</a>
      </div>
</div>
<hr>


<div class="row gy-3" style="padding:10px">
  @yield('content2')
<<<<<<< HEAD
</div>

@endsection
=======
</div>
>>>>>>> main
