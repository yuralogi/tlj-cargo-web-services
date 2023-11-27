@include('layouts.customer-logged.meta')
@include('layouts.customer-logged.sidebar')
@include('layouts.customer-logged.navbar')
<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Profile </h3>
                <p class="text-subtitle text-muted">
                  Halaman Profile
                </p>
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav
                  aria-label="breadcrumb"
                  class="breadcrumb-header float-start float-lg-end"
                >
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="{{ '/dashboard-customer' }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Profile
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <section class="section">
            <div class="row match-height">
            <div class="card">
                <div class="card-body">
                <div class="row justify-content-center match-height">
                    <div class="col-md-auto profile-picture">
                        <img src="{{ asset('mazer-template/assets/compiled/jpg/1.jpg') }}" alt="pp">
                    </div>
                </div>
            </div>
            </div>
        </div>
        </section>
        <section id="basic-vertical-layouts">
            <div class="row match-height">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Profile</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">
                      <form class="form form-vertical" method="POST" action="{{ '/update-profile' }}">
                        <div class="form-body">
                          <div class="row">
                            <div class="col-12">
                              <div class="form-group has-icon-left">
                                <label for="first-name-icon">Name</label>
                                <div class="position-relative">
                                  <input
                                    type="text"
                                    class="form-control"
                                    placeholder="{{ Auth::guard('customer')->user()->name }}"
                                    id="first-name-icon"
                                  readonly/>
                                  <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group has-icon-left">
                                <label for="email-id-icon">Email</label>
                                <div class="position-relative">
                                  <input
                                    type="text"
                                    class="form-control"
                                    placeholder="{{ Auth::guard('customer')->user()->email }}"
                                    id="email-id-icon"
                                    readonly/>
                                  <div class="form-control-icon">
                                    <i class="bi bi-envelope"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group has-icon-left">
                                <label for="mobile-id-icon">No Tlp</label>
                                <div class="position-relative">
                                  <input
                                    type="text"
                                    class="form-control"
                                    placeholder="{{ Auth::guard('customer')->user()->no_tlp }}"
                                    id="mobile-id-icon"
                                  readonly/>
                                  <div class="form-control-icon">
                                    <i class="bi bi-phone"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                            {{-- <div class="col-12 d-flex justify-content-end">
                              <button
                                type="submit"
                                class="btn btn-primary me-1 mb-1"
                              >
                                Submit
                              </button>
                              <button
                                type="reset"
                                class="btn btn-light-secondary me-1 mb-1"
                              >
                                Reset
                              </button>
                            </div> --}}
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
          </section>
          <section id="basic-vertical">
            <div class="row match-height">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Ganti Password</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">
                      <form class="form needs-validation form-vertical" method="POST" action="{{ "/update-password" }}" >
                        @csrf
                        <div class="form-body">
                          <div class="row">
                            <div class="col-12">
                              <div class="form-group has-icon-left">
                                <label for="password-old">Masukan Password Lama</label>
                                <div class="position-relative">
                                  <input
                                    type="password"
                                    class="form-control"
                                    placeholder="Password"
                                    id="old_password"
                                    name="old_password"
                                  required/>
                                  <div class="form-control-icon">
                                    <i class="bi bi-lock"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                  <label for="new-password">Masukan Password Baru</label>
                                  <div class="position-relative">
                                    <input
                                      type="password"
                                      class="form-control"
                                      placeholder="Password"
                                      id="new_password"
                                      name="new_password"
                                      required/>
                                    <div class="form-control-icon">
                                      <i class="bi bi-lock"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <div class="col-12 d-flex justify-content-end">
                              <button
                                type="submit"
                                class="btn btn-primary me-1 mb-1"
                              >
                                Submit
                              </button>
                              <button
                                type="reset"
                                class="btn btn-light-secondary me-1 mb-1"
                              >
                                Reset
                              </button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
          </section>
    </div>

</div>

@include('layouts.customer-logged.footer')
@include('layouts.customer-logged.js.js')
@include('sweetalert::alert')
</body>
</html>
