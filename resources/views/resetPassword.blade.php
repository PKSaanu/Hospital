@extends('layout')
@section('content')

<!-- THIS FIELD FOR ERROR MSG -->

@if ($message =Session::get('error'))
          <div class="alert alert-danger" role="alert" id="error-msg">
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
        <script>
                setTimeout(function() {
                    $('#error-msg').fadeOut('fast');
                }, 3000); // Delay the fade out by 1.5 seconds
        </script>
<br><br>



<div class="bg-light p-2 text-black"  style="box-shadow: 0 0 10px 2px #2F58CD; margin-left:28%; margin-right:28%; margin-top:4%;margin-bottom:5%;border-radius: 4%">
<div id="error" style="border-radius: 4%; color:red; padding:5px"> </div>
<form class="row g-3" method="post" action="{{ route('getpassword',$user->id)}}" >
@csrf

<diV class="container-sm" style="padding:30px;text-align:center">

        <div class="col-md-12" style="padding:5px; text-align:center" id="password">
          <div class="input-group">
          <label for="inputPassword" class="col-sm-6 col-form-label" >New Password :</label>
          <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="Password">
            <span class="input-group-text" id="togglePassword2">
            <i class="fa fa-eye-slash"></i>  
          </div><br>
        <div class="col-md-12" style="padding:5px; text-align:center" id="password">
          <div class="input-group">
          <label for="inputPassword" class="col-sm-6 col-form-label" >Confirm New Password:</label>
          <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Password">
            <span class="input-group-text" id="togglePassword3">
            <i class="fa fa-eye-slash"></i>  
          </div>
     
  <br>
            <div style="padding:5px; text-align:center">
                <a name="reg"  style="font-weight:bold" class="btn btn-success" onclick="openPopup3()">Change</a>&emsp;&ensp;
                <div id="popup3" class="popup">
                      <div class="popup-content">
                          <h2>Confirmation</h2>
                          <p>Are you sure you want to change your password?</p>
                          <button class="btn btn-info" style="font-weight:bold" type="submit" onclick="closePopup3(true)">Yes</button>
                          <a class="btn btn-info" style="font-weight:bold"   onclick="closePopup3(false)">No</a>
                      </div>
                  </div>
                <a class="btn btn-danger" style="font-weight:bold" role="button" href="{{ route('user.edit',$user->id) }}">Cancel</a>
            </div>
            
        </diV>

</form>
</div>

<script>

  function openPopup3() {
    const newpassword = document.getElementById('newpassword').value;
    const confirmpassword = document.getElementById('confirmpassword').value;
    const sentence = 'Please fill in both New Password and Confirm Password fields!';

    if (newpassword && confirmpassword) {
      var popup = document.getElementById('popup3');
      popup.style.display = 'flex';
    } else {
        var error = document.getElementById('error');
        error.style.backgroundColor = '#C5DFF8';
        error.innerHTML = sentence;  
        }
  }


  function closePopup3(choice) {
    var popup = document.getElementById('popup3');
    popup.style.display = 'none';
  
    if (choice) {
      console.log('Change password confirmed');
    } else {
      console.log('Change password canceled');
      window.location.back();
    }
  }


  const toggleNewPasswordButton = document.querySelector('#togglePassword2');
    const newpassword = document.querySelector('#newpassword');

    toggleNewPasswordButton.addEventListener('click', function () {
      const type = newpassword.getAttribute('type') === 'password' ? 'text' : 'password';
      newpassword.setAttribute('type', type);
      this.querySelector('i').classList.toggle('fa-eye');
      this.querySelector('i').classList.toggle('fa-eye-slash');
    });

    const toggleConfirmPasswordButton = document.querySelector('#togglePassword3');
    const confirmpassword = document.querySelector('#confirmpassword');

    toggleConfirmPasswordButton.addEventListener('click', function () {
      const type = confirmpassword.getAttribute('type') === 'password' ? 'text' : 'password';
      confirmpassword.setAttribute('type', type);
      this.querySelector('i').classList.toggle('fa-eye');
      this.querySelector('i').classList.toggle('fa-eye-slash');
    });
</script>

@endsection()