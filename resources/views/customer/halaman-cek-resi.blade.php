@include('layouts.customer.meta')
@include('layouts.customer.navbar')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Solusi Terbaik Pengiriman Anda</h1>
          <h2>Kami adalah perusahaan ekspedisi yang melayani pengiriman Jakarta - Lampung</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{ 'sb-template/img/hero-img.png' }}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">

     
      <div class="container">
        <div class="section-title">
          <h2>LACAK KIRIMAN</h2>
          <form action="/cek-resi" method="POST">
            @csrf
          <input type="text" name="cek-resi" class="input-large"  required> <button class="btn-cekresi" type="submit">Lacak</button>
        </form>
        </div>
        
        
        {{-- <div class="row" data-aos="zoom-in">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ 'sb-template/img/clients/client-1.png' }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ 'sb-template/img/clients/client-2.png' }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ 'sb-template/img/clients/client-3.png' }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ 'sb-template/img/clients/client-4.png' }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ 'sb-template/img/clients/client-5.png' }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ 'sb-template/img/clients/client-6.png' }}" class="img-fluid" alt="">
          </div>

        </div>  --}}

      </div>
    </section><!-- End Cliens Section -->
   

    @isset($dataResi)
    <section id="skills" class="skills">
      <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Resi</th>
                        <th>Nama Pengirim</th>
                        <th>Nama Penerima</th>
                        <th>Alamat Penerima</th>
                        <th>Nama Barang</th>
                        <th>Jmlah</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tfoot>
                        <th>No</th>
                        <th>No Resi</th>
                        <th>Nama Pengirim</th>
                        <th>Nama Penerima</th>
                        <th>Alamat Penerima</th>
                        <th>Nama Barang</th>
                        <th>Jmlah</th>
                        <th>Status</th>
                </tfoot>
                <tbody>
             
                @foreach($dataResi as $no => $b)
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $b->no_resi }}</td>
                        <td>{{ $b->nama_pengirim }}</td>
                        <td>{{ $b->nama_penerima }}</td>
                        <td>{{ $b->alamat_penerima }}</td>
                        <td>{{ $b->nama_barang }}</td>
                        <td>{{ $b->jumlah_barang  }}</td>
                        <td>{{ $b->status_barang  }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endisset

  </main><!-- End #main -->


@include('layouts.customer.footer')
@include('layouts.customer.js.js')
