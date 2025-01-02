<html>
    <head>
        <title> HIMS </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> 
        <link href="{{ asset('bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="/images/hos_logo.png">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script> 
        <script src="{{ asset('bootstrap/js/bootstrap.bunddle.min.js') }}" ></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  

        <!-- ajax suggestion box -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
        <!-- table use -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" />
        
        <style>
            .navigationbar{
                display:flex;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: top;
                background-color: #f0f0f0; /* Customize the background color */
                z-index: 100;
                box-shadow: 0 0 5px 0 #241468;
            }
            .colored-letter {
                color: #FF55BB;
            }
            .table-wrapper {
                position: relative;
            }
            .table {
                font-family: 'Poppins', sans-serif;
                width: 100%;
                border-collapse: collapse;
            }
            thead {
                position: sticky;
                top: 12%;
                background-color:#95BDFF;
                font-weight: bold;
                color:black;
            }
            tbody {
                margin-top: 80px;
                top: 15%; /* Change this value to match the height of your thead */
                color:white;
            }

            .table-container {
            max-height: 25%; /* Set the maximum height of the table container */
            overflow-y: auto; /* Enable vertical scrolling for the table body */
            position: relative; /* Required for positioning the fixed header */
            }

            td {
            padding: 8px;
            white-space: nowrap; /* Optional: Prevent text wrapping within cells */
            text-overflow: ellipsis; /* Optional: Add ellipsis for long cell content */
            overflow: hidden; /* Optional: Hide any overflowing content */
            }
            .hover-row:hover {
                font-weight: bold;
            }
            #visit:hover{
                background-color:#C9EEFF;
                color:blue;
            }
            #visit{
                border:2px solid;
                display: flex;
            }
            #bluebutton{
                color:blue;
            }
            #bluebutton:hover{
                color:#241468;
            }a
            #colorbutton:hover{
                color:#241468;
            }
            body{
                margin: 0;
                padding: 0;
                justify-content: center;
                align-items: center;              
                font-family: 'Poppins', sans-serif;
                background: linear-gradient(to bottom,#5E78C1,#84b1df,#5E78C1);
            }

            .popup {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 9999;
                display: none;
            }

            .popup-content {
                background: linear-gradient(to bottom,#5E78C1,#84b1df,#5E78C1);
                padding: 40px;
                text-align: center;
            }

            .popup button {
                margin: 20px;
            }
            .treatments-container {
                display: flex;
                flex-wrap: wrap;
                gap: 20px;
            }

            /* Style for each treatment card */
            .treatment-card {
                flex: 1;
                border: 1px solid #ccc;
                padding: 15px;
                border-radius: 8px;
                background-color: #f9f9f9;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            /* Style for the section headers */
            .section-header {
                background-color: #95BDFF;
                font-weight: bold;
                margin-bottom: 5px;
            }

            .btn-circle {
            display: inline-block;
            width: 50px; /* Set the desired width of the circular button */
            height: 50px; /* Set the desired height of the circular button */
            line-height: 40px; /* Ensure content is centered vertically */
            text-align: center; /* Center the content horizontally */
            border-radius: 50%; /* Set the border-radius to half the width/height to create a circle */
            padding: 1;

            }

            /* Additional styles for the outline button appearance (adjust as needed) */
            .btn-outline-primary {
            border-color: #007bff;
            color: #007bff;
            }
            .btn-outline-primary:hover {
            background-color: #007bff;
            color: #ffffff;
            }

            /* Add green mark to the circular button when authenticated */
            .btn-has-green-mark::before {
            content: ''; /* Unicode for checkmark icon (you can replace this with your desired icon) */
            font-family: 'Font Awesome'; /* Replace 'Font Awesome' with your icon font or custom font */
            position: absolute;
            top: -1px;
            right: -1px;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            background-color: #5cb85c; /* Green color for the mark */
            color: #ffffff; /* White color for the mark icon */
            text-align: center;
            line-height: 20px;
            font-size: 14px;
            z-index: 2; /* Ensure the mark is above the circular button */
            
            }
            .btn-group.dropup .dropdown-toggle::after {
                /* Set the content to an empty string to hide the arrow */
                content: none;
            }

            .username {
                white-space: nowrap; /* Prevents wrapping the username */
                overflow: hidden; /* Hides overflowing content */
                text-overflow: ellipsis; /* Adds ellipsis (...) at the end if content overflows */
                max-width: 100px; /* Set the maximum width of the username before truncation */
                transition: max-width 0.3s ease; /* Add transition for smooth animation */

            }

            .username.show-full {
                max-width: none; /* Remove the max-width limit on hover */
            }
            .truncate-text {
                max-width: 200px; /* Adjust the max-width as needed */
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }
            .container1 {
                margin: 4% auto;
                padding: 15px;
                background-color: #FFF;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            .btn-purple {
                background-color: purple;
                border-color: purple;
                color:white;
            }

            .btn-purple:hover {
                background-color:purple;
                border-color: purple;
                color: #FDE5EC;
            }

            .btn-pink {
                background-color: #b91372;
                border-color: #b91372;
                color:white;
            }

            .btn-pink:hover {
                background-color:#b91372;
                border-color: #b91372;
                color: #FDE5EC;
            }

            
            .btn-bk {
                background-color: #62b6cb;
                border-color: #62b6cb;
                color:black;
                font-weight:bold;
            }

            .btn-bk:hover {
                background-color:red;
                border-color: red;
                color: white;
            }
        </style>
        
    </head>
    <body>

    <div class="container">
        <nav class="navbar navbar-expand-sm bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <div class="col-md-3" style="display:flex; margin-top:4px">
                <img src="/images/baby copy.png" style="padding:10px; width:60px; height:60px" alt="hos_logo">
                <h2 style="padding:8px; color:#1980c1; font-weight:bold; margin-top:1%">HI<span class="colored-letter">M</span>S</h2>
            </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            @if(Auth::user()->role == 'admin') 
            <div class="collapse navbar-collapse grid gap-4 column-gap-4" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto ">
                <!-- Use ms-auto to move all buttons to the right -->
                <li class="nav-item  p-2 g-col-4">
                <a class="nav-link mouse-over" aria-current="page" href="{{ route('home') }}" style="font-size:18px;">Home</a>
                </li>
                <li class="nav-item  p-2 g-col-4">
                <a class="nav-link  mouse-over" href="{{ route('admission') }}" style="font-size:18px;">Admission </a>
                </li>
                <li class="nav-item  p-2 g-col-4">
                <a class="nav-link  mouse-over" href="{{ route('patients') }}" style="font-size:18px;">Patients</a>
                </li>
                <li class="nav-item  p-2 g-col-4">
                <a class="nav-link  mouse-over" href="{{ route('doc') }}" style="font-size:18px;">Documents</a>
                </li>
                <li class="nav-item dropdown btn-group dropdown  p-2 g-col-6">
                <a class="nav-link mouse-over" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#5cb85c">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
                    </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><button class="dropdown-item" type="button">{{ Auth::user()->username }}</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"> Logout</a></li>
                </ul>

                </li>
            </ul>
            </div>
            <script>
                var currentRoute = "{{ Route::currentRouteName() }}";
                var navLinks1 = document.querySelectorAll('.navigation1 a');
                if ("home" === currentRoute || "login" === currentRoute) {
                        navLinks1[0].classList.add('active');
                }else if ("admission" === currentRoute) {
                    navLinks1[1].classList.add('active');
                }else if ("patients" === currentRoute ||  "patient.show" === currentRoute || "patient.edit" === currentRoute ||
                        "show" === currentRoute || "poh" === currentRoute || "addpoh" === currentRoute ||
                        "pohedit" === currentRoute || "daytoday" === currentRoute || "DayShow" === currentRoute ||
                        "treatmentEdit" === currentRoute || "visit" === currentRoute) {
                    navLinks1[2].classList.add('active');
                }
            </script>
            @elseif(Auth::user()->role == 'superadmin')
            <div class="collapse navbar-collapse grid gap-4 column-gap-4" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <!-- Use ms-auto to move all buttons to the right -->
                <li class="nav-item  p-2 g-col-4">
                <a class="nav-link mouse-over" aria-current="page"  href="{{ route('home') }}" style="font-size:18px;">Home</a>
                </li>
                <li class="nav-item  p-2 g-col-4">
                <a class="nav-link  mouse-over" href="{{ route('staff') }}" style="font-size:18px;">Staffs</a>
                </li>
                <li class="nav-item  p-2 g-col-4">
                <a class="nav-link  mouse-over" href="{{ route('patients') }}" style="font-size:18px;">Patients</a>
                </li>
                <li class="nav-item  p-2 g-col-4">
                <a class="nav-link  mouse-over" href="{{ route('monthentrycharts') }}" style="font-size:18px;">Analysis</a>
                </li>
                <li class="nav-item dropdown btn-group dropdown  p-2 g-col-6">
                <a class="nav-link  mouse-over" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#5cb85c">
              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
              </svg>
            </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><button class="dropdown-item" type="button">{{ Auth::user()->username }}</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"> Logout</a></li>
                </ul>

                </li>
            </ul>
            </div>
            </div>
            <script>
                var currentRoute = "{{ Route::currentRouteName() }}";
                var navLinks2 = document.querySelectorAll('.navigation2 a');

                if ("home" === currentRoute || "login" === currentRoute) {
                    navLinks2[0].classList.add('active');
                }else if ("staff" === currentRoute || "user.create" === currentRoute || "user.edit" === currentRoute || "reset" === currentRoute) {
                    navLinks2[1].classList.add('active');
                }else if ("patients" === currentRoute || "admittedView" === currentRoute || "dischargedView" === currentRoute || "patient.show" === currentRoute || "patient.edit" === currentRoute ||
                        "show" === currentRoute || "poh" === currentRoute || "addpoh" === currentRoute ||
                        "pohedit" === currentRoute || "daytoday" === currentRoute || "DayShow" === currentRoute ||
                        "treatmentEdit" === currentRoute || "visit" === currentRoute) {
                    navLinks2[2].classList.add('active');
                }else if ("monthentrycharts" === currentRoute || "yearentrycharts" === currentRoute){
                    navLinks2[3].classList.add('active');
                }

            </script>
            @endif
        </div>
        </nav>
        <div class="p-2 text-black"  style="margin-left:6%; margin-right:6%; margin-top:8%; margin-bottom:1% ">
            @yield('content')
        </div>
</div>
<script src="{{ asset('script.js') }}" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    </body>
</html>

<script>
    // Using pure JavaScript
    const usernameBtn = document.querySelector('.username');

    usernameBtn.addEventListener('mouseover', function() {
        this.classList.add('show-full');
    });

    usernameBtn.addEventListener('mouseout', function() {
        this.classList.remove('show-full');
    });

    // Using jQuery
    $('.username').hover(function() {
        $(this).addClass('show-full');
    }, function() {
        $(this).removeClass('show-full');
    });

</script>