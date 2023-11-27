<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>MyTLJ | Login</title>
    {{-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> --}}
      <!-- Template Main CSS File -->
    <link href="{{ 'sb-template/css/login-customer.css' }}" rel="stylesheet">
    <link href="{{ asset('sb-template/img/TLJ.png') }}" rel="icon">
    <link href="{{ asset('sb-template/img/TLJ.png') }}" rel="apple-touch-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>

    <div class="container">
      <div class="logoCircle">
        <img class="logoCircle shadow img-profile rounded-circle" src="{{ asset('sb-template/img/TLJ.png') }}" alt="">
    </div>

      <form action="/authenticate-customer" method="POST">
        @csrf

        <div class="input-box underline">
          <input type="email" name="email" placeholder="Email" required />
          <div class="underline"></div>
        </div>
        <div class="input-box">
          <input type="password" id="password" name="password" placeholder="Password" required />
          <div class="underline"></div>
        </div>
        <br>
        <input type="checkbox" onclick="showPasswordCheck()"> Show Password
        <div class="input-box button">
          <input type="submit" />
        </div>
        <div class="text">
          <h4>Belum Punya Akun? <a href="/register-customer">Daftar Disini!</a></h4>
        </div>
        <br>
      </form>

    </div>
  </body>
</html>

@include('layouts.customer.js.js')
@include('layouts.customer.js.js-login')
@include('sweetalert::alert')
