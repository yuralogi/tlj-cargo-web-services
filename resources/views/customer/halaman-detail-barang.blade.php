@include('layouts.customer-logged.meta')
@include('layouts.customer-logged.sidebar')
@include('layouts.customer-logged.navbar')
<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
          <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
              <h3>Detail Data Barang</h3>
              <p class="text-subtitle text-muted">
                Berikut ini detail data barang
              </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
              <nav
                aria-label="breadcrumb"
                class="breadcrumb-header float-start float-lg-end"
              >
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="index.html">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Chat Application
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
        <section class="section">
        @foreach($detail as $d)
            @switch($d->status_barang)
                @case('DITERIMA DI JAKARTA')
                    <?php $bg_color = 'bg-primary'; ?>
                    @break
                @case('SEDANG DIKIRIM')
                    <?php $bg_color = 'bg-warning'; ?>
                    @break
                @case('DITERIMA DI LAMPUNG')
                    <?php $bg_color = 'bg-info'; ?>
                    @break
                @case('TELAH SAMPAI')
                    <?php $bg_color = 'bg-success'; ?>
                    @break
                @default
            @endswitch
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5>No Resi</h5>
                            <h5>Nama Barang</h5>
                            <h5>Nama Pengirim</h5>
                            <h5>Tlp Pengirim</h5>
                            <h5>Nama Penerima</h5>
                            <h5>Tlp Penerima</h5>
                            <h5>Alamat Penerima</h5>
                            <h5>Jumlah Barang</h5>
                            <h5>Ukuran Barang</h5>
                            <h5>Jenis Ukuran</h5>
                            <h5>Waktu Terima</h5>
                            <h5>Waktu Kirim</h5>
                            <h5>Waktu Sampai</h5>
                            <h5>Waktu Diterima</h5>
                            <h5>Ongkos Kirim</h5>
                            <h5>Metode Bayar</h5>
                            <h5>Status</h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5>: <strong>{{ $d->no_resi }}</strong></h5>
                            <h5>: {{ $d->nama_barang }}</h5>
                            <h5>: {{ $d->nama_pengirim }}</h5>
                            <h5>: {{ $d->tlp_pengirim }}</h5>
                            <h5>: {{ $d->nama_penerima }}</h5>
                            <h5>: {{ $d->tlp_penerima }}</h5>
                            <h5>: {{ $d->alamat_penerima }}</h5>
                            <h5>: {{ $d->jumlah_barang }}</h5>
                            <h5>: {{ $d->ukuran_barang }}</h5>
                            <h5>: {{ $d->jenis_ukuran }}</h5>
                            <h5>: {{ $d->waktu_terima }}</h5>
                            <h5>: {{ $d->waktu_kirim }}</h5>
                            <h5>: {{ $d->waktu_sampai }}</h5>
                            <h5>: {{ $d->waktu_diterima }}</h5>
                            <h5>: Rp. {{ number_format($d->biaya_ongkir, 2,',','.') }}</h5>
                            <h5>: {{ $d->metode_bayar }}</h5>
                            <h5>: <span class="badge {{ $bg_color }}">{{ $d->status_barang }}</span></h5>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        </section>
      </div>

</div>
@include('layouts.customer-logged.footer')
@include('layouts.customer-logged.js.js')
</body>
</html>
