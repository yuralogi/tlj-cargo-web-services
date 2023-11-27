
<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration or Sign Up form in HTML CSS | CodingLab </title>
    <link href="{{ 'sb-template/css/login-customer.css' }}" rel="stylesheet">
   </head>
<body>
  <div class="container">
    <h2>Registrasi</h2>

    <form action="/registrasi-store" method="POST">
      @csrf
      <div class="input-box">
        <input type="text" name="name" placeholder="Masukan Nama Anda" required>
        <div class="underline"></div>
      </div>
      <div class="input-box">
        <input type="email" name="email" placeholder="Masukan Email Anda" required>
        <div class="underline"></div>
      </div>
      <div class="input-box">
        <input type="number" min=0 name="notlp" placeholder="Masukan No Tlp Anda" required>
        <div class="underline"></div>
      </div>
      <div class="input-box">
        <input type="password" id="password" name="password" placeholder="Buat Password" id="password"  required>
        <div class="underline"></div>
      </div>
      <div class="input-box">
        <input type="password" id="confirm_password" name="confirm-password" placeholder="Konfirmasi Password" id="confirm_password"  required>
        <div class="underline"></div>
      </div>
      <br>
      <input type="checkbox" onclick="showPasswordCheck()"> Show Password
      <div class="input-box button">
        <input type="Submit" value="Register Now">
      </div>
      <div class="text">
        <h4>Suda Punya Akun? <a href="/login-customer">Login Disini!</a></h4>
      </div>
      <br>
    </form>
  </div>

</body>
</html>



@include('layouts.customer.js.js-registrasi')
@include('layouts.customer.js.js')
@include('sweetalert::alert')
