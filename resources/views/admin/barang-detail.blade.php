@include('layouts.admin.meta')
@include('layouts.admin.sidebar')
@include('layouts.admin.navbar')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class=" mb-0 text-gray-800">Detail Barang</h2>
    </div>
    <div class="card mb-4 py-3 border-left-primary">
        @foreach($detail as $d)
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
                    <h5>: {{  $d->alamat_penerima }}</h5>
                    <h5>: {{ $d->jumlah_barang }}</h5>
                    <h5>: {{ $d->ukuran_barang }}</h5>
                    <h5>: {{ $d->jenis_ukuran }}</h5>
                    <h5>: {{ $d->waktu_terima }}</h5>
                    <h5>: {{ $d->waktu_kirim }}</h5>
                    <h5>: {{ $d->waktu_sampai }}</h5>
                    <h5>: {{ $d->waktu_diterima }}</h5>
                    <h5>: Rp. {{ number_format($d->biaya_ongkir, 2,',','.') }}</h5>
                    <h5>: {{ $d->metode_bayar }}</h5>
                    <h5>: {{ $d->status_barang }}</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->


@include('layouts.admin.footer')
@include('layouts.admin.js.js')
@include('sweetalert::alert')

