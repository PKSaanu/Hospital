@extends('layout')
@section('content')
<div id="friday-notification" class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-megaphone-fill" viewBox="0 0 16 16">
      <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0zm-1 .724c-2.067.95-4.539 1.481-7 1.656v6.237a25.222 25.222 0 0 1 1.088.085c2.053.204 4.038.668 5.912 1.56zm-8 7.841V4.934c-.68.027-1.399.043-2.008.053A2.02 2.02 0 0 0 0 7v2c0 1.106.896 1.996 1.994 2.009a68.14 68.14 0 0 1 .496.008 64 64 0 0 1 1.51.048zm1.39 1.081c.285.021.569.047.85.078l.253 1.69a1 1 0 0 1-.983 1.187h-.548a1 1 0 0 1-.916-.599l-1.314-2.48a65.81 65.81 0 0 1 1.692.064c.327.017.65.037.966.06z"/>
    </svg> &nbsp;
    <strong>Friday's here! It's a Backup day! Remember: {{ Auth::user()->username }}</strong>&nbsp;Backup today, keep data safe. Let's secure our week's end. 📂✨
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<div class="p-1" style="margin-left:0%;margin-right:0%;text-align:justify; background:#0077b6;border-radius:10px">

<form action="{{ route('doc') }}" method="post" style="font-size: 15px; margin-left: 6%; margin-right: 6%;  text-align: center;" onsubmit="return validateDateRange()">
            <div style="color:white; text-align:justify; margin-bottom: 1%;">
              *You have to specify the duration before you print, better you select count less than 500
            </div>
    @csrf
    <hr style="color:white">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group row">
                <label for="start_date" class="col-sm-4 col-form-label">Start Date:</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control form-control-sm" id="start_date" name="start_date" required>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group row">
                <label for="end_date" class="col-sm-4 col-form-label">End Date:</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control form-control-sm" id="end_date" name="end_date" required>
                </div>
            </div>
        </div>
        <div class="col-md-3 align-self-end">
            <div class="form-group text-md-right">
                <button type="submit" class="btn btn-bk btn-sm">&emsp;&emsp;&emsp;Filter&emsp;&emsp;&emsp;</button>
            </div>
        </div>
        </div>
      <hr style="color:white">
    <input type="hidden" name="form_submitted" value="1">
</form>

  <div style="color:white; text-align:right; margin-bottom: 1%;margin-right: 1%;">
    Last Backup &ensp;:&ensp; {{$date}}&ensp;&ensp;{{$time}}
  </div>

</div>

<br>
<br>
<div class="p-2" style="font-size:34px;margin-left:0%;margin-right:0%;text-align:center; background: linear-gradient(90deg, rgba(143, 196, 235, 0.9) 100%, rgba(91, 154, 221, 0.9) 100%, rgba(78, 136, 250, 0.9) 100%); border-radius:10px">Total Patients Count in this System  : <b><span style="color:#580c1f;font-family:Lucida Bright;">{{$Count}}</span> </b> </div>
<br>
<div class="p-2 col" style="font-size:20px;margin-left:0%;margin-right:0%;text-align:left;background: linear-gradient(90deg, rgba(143, 196, 235, 0.9) 100%, rgba(91, 154, 221, 0.9) 100%, rgba(78, 136, 250, 0.9) 100%); border-radius:10px">
>>Download all the patients details (from {{$start_date}} to {{$end_date}}) total of<span style="color:#001845;"><b>  {{$Count1}} </b></span> entries  : <a role="button" href="{{ route('download.pdf', ['start_date' => $start_date, 'end_date' => $end_date]) }}" class="btn btn-danger" style="font-weight:bold;">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
  <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
  <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"/>
</svg> PDF</a> <a role="button"  href="{{ route ('download.excel', ['start_date' => $start_date, 'end_date' => $end_date])}}" class="btn btn-success" style="font-weight:bold;">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-excel" viewBox="0 0 16 16">
  <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
  <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
</svg> Excel</a> 
</div>
<br>

<div class="p-2 col" style="font-size:20px;margin-left:0%;margin-right:0%; text-align:left;background: linear-gradient(90deg, rgba(143, 196, 235, 0.9) 100%, rgba(91, 154, 221, 0.9) 100%, rgba(78, 136, 250, 0.9) 100%); border-radius:10px">
>>Download all the treatment details (from {{$start_date}} to {{$end_date}}) total of <span style="color:#001845;"> <b>{{$Count2}}</b></span> entries  : <a role="button" href="{{ route('downloadt.pdf', ['start_date' => $start_date, 'end_date' => $end_date]) }}"class="btn btn-danger" style="font-weight:bold;">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
  <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
  <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"/>
</svg> PDF</a> <a role="button" href="{{ route ('downloadt.excel', ['start_date' => $start_date, 'end_date' => $end_date])}}" class="btn btn-success" style="font-weight:bold;">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-excel" viewBox="0 0 16 16">
  <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
  <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
</svg> Excel</a> 
</div>

<br>
<div class="p-2 col" style="font-size:20px;margin-left:0%;margin-right:0%;text-align:left; background: linear-gradient(90deg, rgba(143, 196, 235, 0.9) 100%, rgba(91, 154, 221, 0.9) 100%, rgba(78, 136, 250, 0.9) 100%); border-radius:10px">
>>All the POH, History, Delivery History details   :  <a role="button" href="{{ route('download.combined.pdf', ['start_date' => $start_date, 'end_date' => $end_date]) }}" class="btn btn-danger justify-content-end" style="font-weight:bold;">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
  <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
  <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"/>
</svg> PDF</a> 
<a role="button" href="{{ route('download.combined.excel', ['start_date' => $start_date, 'end_date' => $end_date]) }}" class="btn btn-success justify-content-end" style="font-weight:bold;">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-excel" viewBox="0 0 16 16">
  <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
  <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
</svg> Excel</a> 
</div>

<br>
<div class="p-2 col" style="font-weight:bold;font-size:20px;margin-left:0%;margin-right:0%;text-align:left; background: linear-gradient(90deg, rgba(143, 196, 235, 0.9) 100%, rgba(91, 154, 221, 0.9) 100%, rgba(78, 136, 250, 0.9) 100%); border-radius:10px">
>> To download Backup file   :&ensp;&ensp; <a href="{{route('download.sql.dump')}}" class="btn btn-purple"><b>Download Backup</b></a> 
</div>
<br>
<br>
<script>
    $(document).ready(function() {
        var currentDate = new Date();
        var dayOfWeek = currentDate.getDay(); // Get the day of the week (0 for Sunday, 1 for Monday, ... 6 for Saturday)

        if (dayOfWeek === 5 ) { // 5 represents Friday
            $('#friday-notification').show();
        }

        // Optional: Dismiss the notification on close button click
        $('#friday-notification .close').on('click', function() {
            $('#friday-notification').hide();
        });
    });

    function validateDateRange() {
        var startDate = document.getElementById('start_date').value;
        var endDate = document.getElementById('end_date').value;

        if (startDate > endDate) {
            alert('Start Date must be less than End Date');
            return false;
        }

        return true;
    }
</script>
@endsection