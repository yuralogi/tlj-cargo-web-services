@include('layouts.admin.meta')

<body class="body-animation">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block tlj-bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><strong>TLJ Admin</strong></h1>
                                    </div>
                                    @if(session('error'))
                                    <div class="alert alert-danger">
                                        <b>Opps!</b> {{session('error')}}
                                    </div>
                                    @endif
                                    <form class="user" action="/authenticate" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="username" name="username" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..."  autofocus required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Password"   oninvalid="this.setCustomValidity('Silahkan Masukan Password')"
                                                oninput="setCustomValidity('')" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="rememberMe" value="lsRememberMe">
                                                <label class="custom-control-label" for="rememberMe">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" onclick="lsRememberMe()">
                                            Login
                                        </button>

                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('layouts.admin.js.js-login')
@include('sweetalert::alert')

