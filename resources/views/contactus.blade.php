<!DOCTYPE html>
<html>
<head>
    <title>HIMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="/images/hos_logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />  
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">  

    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, #5E78C1, #84b1df, #5E78C1);
        }

        .container {
            margin: 4% auto;
            padding: 20px;
            background-color: #FFF;
            border-radius: 10px;
            max-width: 1200px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .logo {
            display: block;
            margin: 0 auto;
            width: 100px;
            height: 100px;
        }

        .header {
            margin-top: 1%;
            color: #1980c1;
            font-weight: bold;
            text-align: center;
        }

        .content {
            margin-top: 2rem;
            text-align: center;
            padding: 10px;
        }

        .email {
            color: blue; /* Blue font color for emails */
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
    </style>
</head>

<body>
    <div class="container">
        <img src="/images/baby copy.png" class="logo" alt="logo">
        <h2 class="header">HI<span style="color: #FF55BB">M</span>S</h2>
        <div class="content" style="text-align:left">
            <p><b>Welcome to the HIMS ✨</b></p>
            We're delighted to have you here! The HIMS management System is a collaborative project brought to life by honours degree students from the Department of Computer Science, UoJ.
            Our team has worked diligently to create an exceptional experience for you. We're committed to providing the best service and information possible.
            If you have any queries, suggestions, or simply wish to explore more about our project and its features, please feel free to reach out. Your feedback is incredibly valuable to us, and we're eager to address any questions you might have.
            <br><br>
            <p><u>The Project Team</u></p>
            <p>
                <span style="font-weight: bold;">Thanushika T:</span> <span class="email">thanushika19991116@gmail.com</span><br>
                <span style="font-weight: bold;">Nisoothanan J:</span> <span class="email">Jeganthanaa1998@gmail.com</span><br>
                <span style="font-weight: bold;">Saanusan K:</span> <span class="email">saanusansaanu@gmail.com</span>
            </p>
            <p>We will do our utmost to respond promptly and ensure your inquiries are addressed comprehensively. Your satisfaction is our priority, and we look forward to assisting you in any way we can.</p>
        
            <br>
                <button class="btn btn-sm btn-purple" onclick="window.location.href = '{{ route('home') }}'">
                         Go back to Home
                </button>
            <br><br>
        </div>
    </div>
</body>
</html>