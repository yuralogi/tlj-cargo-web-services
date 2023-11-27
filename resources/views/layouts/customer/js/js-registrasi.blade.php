<script>
    var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");
  
    function validatePassword(){
    if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Tidak Sama");
    } else {
        confirm_password.setCustomValidity('');
    }
    }
  
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
  </script>
  
  <script>
    function showPasswordCheck() {
    var x = document.getElementById("password");
    var x_confirm = document.getElementById("confirm_password");
    
    if (x.type === "password" && x_confirm.type === "password") {
      x.type = "text";
      x_confirm.type = "text";
    } else {
      x.type = "password";
      x_confirm.type = "password";
    }
  }
  </script>