@include('layouts.customer-logged.meta')
@include('layouts.customer-logged.sidebar')
@include('layouts.customer-logged.navbar')

<div id="main-content">
    <div class="page-heading">
    <div class="page-title">
        <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3 class="mb-4">{{ $page_title }}</h3>
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
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $page_title }}
                </li>
            </ol>
            </nav>
        </div>
        </div>
    </div>
    <div class="page-content">

        <section class="section">
            <div class="card">
              {{-- <div class="card-header">jQuery Datatable</div> --}}
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" id="table1">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>No Resi</th>
                        <th>Nama Pengirim</th>
                        <th>Nama Penerima</th>
                        <th>Alamat Penerima</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        {{-- <th>Test</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($barang as $no => $b)
                      <tr>
                        <td>{{ $no+1 }}</td>
                                <td><a href="{{ url('detail-barang/'.$b->no_resi) }}">{{ $b->no_resi }}</a></td>
                                <td>{{ $b->nama_pengirim }}</td>
                                <td>{{ $b->nama_penerima }}</td>
                                <td>{{ $b->alamat_penerima }}</td>
                                <td>{{ $b->nama_barang }}</td>
                                <td>{{ $b->jumlah_barang  }}</td>
                                {{-- <td>{{ $b->status_barang  }}</td> --}}
                        <td>
                          <span class="badge {{ $bg_color }}">{{ $b->status_barang  }}</span>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </section>
      </div>
    </div>
</div>

@include('layouts.customer-logged.footer')
@include('layouts.customer-logged.js.js')
@include('layouts.customer-logged.js.js-data-barang')
</body>
</html>
