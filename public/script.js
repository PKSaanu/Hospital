function capitalizeNames(input)
    {
    var inputValue = input.value;
    var names = inputValue.split(' ');
    var capitalizedNames = names.map(function(name) {
      return name.charAt(0).toUpperCase() + name.slice(1);
    });
    var capitalizedValue = capitalizedNames.join(' ');
    input.value = capitalizedValue;
  }
function capitalizeInput(input) 
  {
    var inputValue = input.value;
    var capitalizedValue = inputValue.toUpperCase();
    input.value = capitalizedValue;
  }
  function validateNIC(input) {
    input.addEventListener('input', function () {
        // Convert to uppercase and replace any lowercase 'v' with 'V'
        input.value = input.value.toUpperCase().replace(/v/g, 'V');
        
        var nicPattern = /^\d{9}[VX]$/;
    var newNICPattern = /^\d{12}$/;

        if (nicPattern.test(input.value) || newNICPattern.test(input.value)) {
            input.setCustomValidity('');
            document.getElementById("nic-format-example").style.display = "none";
        } else {
            input.setCustomValidity('Invalid NIC format');
            document.getElementById("nic-format-example").style.display = "inline";
        }
    });
}


  function validatePhoneNumber(input) {
    var phoneNumber = input.value;
    var cleanedNumber = phoneNumber.replace(/\D/g, '');

    // Define a regular expression pattern for a valid Sri Lankan phone number
    var phonePattern = /^(?:\+?94|0)(?:7\d|9\d|2\d|3\d|4\d|5\d|6\d|8\d)\d{7}$/;

    if (phonePattern.test(cleanedNumber)) {
        input.setCustomValidity('');
        document.getElementById("phone-error-msg").style.display = "none";
    } else {
        input.setCustomValidity('Invalid phone number format');
        document.getElementById("phone-error-msg").style.display = "inline";
    }
}

    const togglePasswordButton = document.querySelector('#togglePassword');
    const passwordInput = document.querySelector('#floatingPassword');

    togglePasswordButton.addEventListener('click', function () {
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
      this.querySelector('i').classList.toggle('fa-eye');
      this.querySelector('i').classList.toggle('fa-eye-slash');
    });
