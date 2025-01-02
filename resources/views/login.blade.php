<html>
    <head>
        <title>HIMS</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="icon" type="image/x-icon" href="/images/hos_logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />  
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">  

        <style>
            .colored-letter {
                color: #FF55BB;  
            }
            form{
              display:flex;
              flex-wrap:wrap;
              gap: 6px;
            }
            #username{
              flex:1 0 130px;
            }
            #password{
              flex:1 0 130px;
            }
            button{
              flex:1 0 40px;
            }

            body{
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                font-family: 'Poppins', sans-serif;
                background: linear-gradient(to bottom,#5E78C1,#84b1df,#5E78C1);
              }
        </style>
    </head>
    <body >

<br><br><br>

    <div class="bg-light p-2 text-black"  style="box-shadow: 0 0 20px 1px #241468; margin-left:38%; margin-right:38%; margin-top:4%;margin-bottom:5%;border-radius: 4%">
      <form class="row g-3" style="padding:20px" action="{{ route('login') }}" method="POST">
        @csrf


        <!-- THIS FIELD FOR ERROR MSG -->

        @if ($message =Session::get('error'))
          <div class="alert alert-danger" role="alert">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
          <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
          <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
          </svg>
          &ensp;<strong>{{$message}}</strong>
        </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <u1>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </u1>
            </div>
        <br/>
        @endif

        <div><img src="/images/baby copy.png" class="rounded mx-auto d-block" style="width:100px; height:100px" alt="logo"></div>
          <h2 style="padding:0%; color:#1980c1; font-weight:bold; margin-top:1%;text-align:center;">HI<span class="colored-letter">M</span>S</h2>
          <div style="padding:2%">
          <div class="col-md-12" style="padding:5px; text-align:center" id="username">
            <input type="text" class="form-control" id="floatingInput" name="username" placeholder="User name">
          </div><br>
          <div class="col-md-12" style="padding:5px; text-align:center" id="password">
            <div class="input-group">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
              <span class="input-group-text" id="togglePassword">
              <i class="fa fa-eye-slash"></i>  
            </div>
          </div>
          <br>
          <div class="col-md-12" style="padding:5px; text-align:center">
              <button type="submit" class="btn btn-info" style="font-weight:bold; color:white; background-color:#1980c1">Sign in</button>
          </div>

        </div>

      </form>
    </div>
    <script src="{{ asset('script.js') }}"></script>
    </div>
  </body>
</html>