@extends('layout')
@section('content')
<div id="friday-notification" class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-megaphone-fill" viewBox="0 0 16 16">
      <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0zm-1 .724c-2.067.95-4.539 1.481-7 1.656v6.237a25.222 25.222 0 0 1 1.088.085c2.053.204 4.038.668 5.912 1.56zm-8 7.841V4.934c-.68.027-1.399.043-2.008.053A2.02 2.02 0 0 0 0 7v2c0 1.106.896 1.996 1.994 2.009a68.14 68.14 0 0 1 .496.008 64 64 0 0 1 1.51.048zm1.39 1.081c.285.021.569.047.85.078l.253 1.69a1 1 0 0 1-.983 1.187h-.548a1 1 0 0 1-.916-.599l-1.314-2.48a65.81 65.81 0 0 1 1.692.064c.327.017.65.037.966.06z"/>
    </svg> &nbsp;
    <strong>It's a FRIDAY ....   Today is Backup Day {{ Auth::user()->username }}!</strong>&nbsp;  Don't let your files feel lonely, give 'em a backup buddy! ✨&nbsp; <a href="{{ route('doc') }}" class="alert-link"><b>Go to the backup</b></a>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<div class="container1">
<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-interval="5000">
      <img src="/images/H1.jpg" class="d-block w-100" alt="image1">
    </div>
</div>
</div>

    <div style="margin-left: 10px; margin-top:0;">
        <h3 style="font-weight: bold;"> <center> <span style="color:#1980c1;">Welcome, </span><span style="color:#f10a6d;">{{ Auth::user()->username }}</span> ✌️ </center> </h3> <br>
            <p style="text-align: justify;"> 
            Welcome to our Hospital Information Management System, dedicated to ensuring a smooth and effective healthcare experience for both patients and staff. Our intuitive management system enables convenient appointment scheduling, access to medical records, and communication with healthcare providers anytime, anywhere. We trust that this system will be a valuable asset to our community. For inquiries, please feel free to contact us.
            </p>
    </div>

    <div style="text-align: right; margin-top: 20px;">
        <a href="https://www.csc.jfn.ac.lk/index.php/staff/" target="blank">Help</a> &emsp;
        <a href="{{ route('contactus') }}" >Contact Us</a>
    </div>
</div>

<footer>
    <div class=" text-center">
        <p>&copy; 2023 ALL RIGHTS RESERVED DEPARTMENT OF COMPUTER SCIENCE. UNIVERSITY OF JAFFNA.</P>
    </div>
</footer>


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
</script>
@endsection