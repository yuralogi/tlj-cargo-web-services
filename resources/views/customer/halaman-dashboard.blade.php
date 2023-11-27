@include('layouts.customer-logged.meta')
@include('layouts.customer-logged.sidebar')
@include('layouts.customer-logged.navbar')

    <div id="main-content">
        <div class="page-heading">
        <div class="page-title">
            <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="mb-4">Selamat Datang {{ Auth::guard('customer')->user()->name }}</h3>
                {{-- <p class="text-subtitle text-muted">
                Navbar will appear on the top of the page.
                </p> --}}
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
                </ol>
                </nav>
            </div>
            </div>
        </div>
        <div class="page-content">
            <section class="row">
                <div class="row">
                  <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                      <div class="card-body px-4 py-4-5">
                        <div class="row">
                          <div
                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
                          >
                            <div class="stats-icon purple mb-2">
                              <i class="fas fa-warehouse fa-xs"></i>
                            </div>
                          </div>
                          <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">
                              Barang di Jakarta
                            </h6>
                            <h6 class="font-extrabold mb-0">{{ $barangJakarta }}</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                      <div class="card-body px-4 py-4-5">
                        <div class="row">
                          <div
                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
                          >
                            <div class="stats-icon blue mb-2">
                              <i class="fas fa-truck fa-xs"></i>
                            </div>
                          </div>
                          <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Barang di Perjalanan</h6>
                            <h6 class="font-extrabold mb-0">{{ $barangKirim }}</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                      <div class="card-body px-4 py-4-5">
                        <div class="row">
                          <div
                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
                          >
                            <div class="stats-icon green mb-2">
                              <i class="fas fa-boxes"></i>
                            </div>
                          </div>
                          <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Barang di Lampung</h6>
                            <h6 class="font-extrabold mb-0">{{ $barangLampung }}</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                      <div class="card-body px-4 py-4-5">
                        <div class="row">
                          <div
                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
                          >
                            <div class="stats-icon red mb-2">
                              <i class="fas fa-check fa-xs"></i>
                            </div>
                          </div>
                          <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Barang Sampai</h6>
                            <h6 class="font-extrabold mb-0">{{ $barangSampai }}</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </section>
          </div>
        </div>
    </div>
@include('layouts.customer-logged.footer')
@include('layouts.customer-logged.js.js')
</body>
</html>
