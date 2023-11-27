@include('layouts.admin.meta')
@include('layouts.admin.sidebar')
@include('layouts.admin.navbar')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" id="pageTitle">{{ $page_title }}</h1>
    </div>
@if(Auth::user()->role == 'admin_jakarta' && $page_title == 'Data Barang Jakarta')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form start -->
                <form class="needs-validation" role="form" method="POST"
                    action="/barang-jakarta/store" novalidate>
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="namaBarang">Nama Barang</label>
                            <input type="text" class="form-control" id="namaBarang" name="namaBarang"
                                placeholder="" required>
                            <div class="invalid-feedback">
                                Nama Barang Wajib di Isi
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tlpPengirim">No Tlp Pengirim</label>
                            <input type="number" min="0" class="form-control" id="tlpPengirim" name="tlpPengirim"
                                placeholder="" onkeyup="GetDetail(this.value)" required>

                            <div class="invalid-feedback">
                                No Telepon Wajib di Isi
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="namaPengirim">Nama Pengirim</label>
                            <input type="text" class="form-control" id="namaPengirim" name="namaPengirim"
                                placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Nama Pengirim Wajib di Isi
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="namaPenerima">Nama Penerima</label>
                            <input type="text" class="form-control" id="namaPenerima" name="namaPenerima"
                                placeholder="" required>
                            <div class="invalid-feedback">
                                Nama Penerima Wajib di Isi
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamatPenerima">Alamat Penerima</label>
                            <input type="text" class="form-control" id="alamatPenerima" name="alamatPenerima"
                                placeholder="" required>
                            <div class="invalid-feedback">
                                Alamat Penerima Wajib di Isi
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tlpPenerima">No Tlp Penerima</label>
                            <input type="number" min="0" class="form-control" id="tlpPenerima" name="tlpPenerima"
                                placeholder="" required>
                            <div class="invalid-feedback">
                                No Telepon Wajib di Isi
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="caraPacking">Cara Packing</label>
                            <select class="custom-select" id="caraPacking" name="caraPacking"
                                placeholder="Pilih Cara Packing" required>
                                <option selected></option>
                                <option value="Colly">Colly</option>
                                <option value="Dus">Dus</option>
                            </select>

                            <div class="invalid-feedback">
                                Cara Packing Wajib di Isi
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jenisUkuran">Ongkir Berdasarkan</label>
                            <select class="custom-select" id="jenisUkuran" name="jenisUkuran"
                                placeholder="Pilih Metode Pembayaran" onchange="showJenisBarang(this)" required>
                                <option selected></option>
                                <option value="Berat">Berat</option>
                                <option value="Kubikasi">Kubikasi</option>
                            </select>

                            <div class="invalid-feedback">
                                Pilih Klasifikasi Barang
                            </div>
                        </div>

                        <div class="form-group  pilihUkuran" id="pilihUkuran">
                            <label for="pilihUkuran" id="labelPilihUkuran"></label>
                            <input type="number" min="0" class="form-control" id="ukuranBarang" name="ukuranBarang"
                                placeholder="" required>
                            <div class="invalid-feedback">
                                Ukuran Wajib di Isi
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="jumlahBarang">Jumlah Barang</label>
                            <input type="number" min="0" class="form-control" id="jumlahBarang" name="jumlahBarang"
                                placeholder="" required>
                            <div class="invalid-feedback">
                                Jumlah Barang Wajib di Isi
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="metodeBayar">Metode Pembayaran</label>
                            <select class="custom-select" id="metodeBayar" name="metodeBayar"
                                placeholder="Pilih Metode Pembayaran" required>
                                <option selected></option>
                                <option value="Pengirim">Bayar Sekarang</option>
                                <option value="Penerima">Bayar Bila Sampai</option>
                            </select>

                            <div class="invalid-feedback">
                                Metode Pembayaran Wajib di Isi
                            </div>
                        </div>

                        <input type="hidden" id="idHidden" name="idHidden" value="">
                        <button type="submit" class="btn btn-primary ml-3 float-right ">Submit</button>
                        <!-- <button type=" button" class="btn btn-warning float-right">Kosongkan</button> -->

                    </div>
                    <!-- /.card-body -->
                </form>
            </div>
        </div>
    </div>
</div>


<div class="btn-toolbar mb-2" role="toolbar" aria-label="toolbar with button groups">
            <div class="btn-group mr-2" role="group" aria-label="First group">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-plus-circle"> </i> Input Barang</button>
            </div>
         <!-- DataTales Example -->

             <div class="btn-group mr-2" role="group" aria-label="First group">
                 <button type="submit" name="submit-btn" value="updateForm" form="updateForm" class="btn btn-primary">
                     <i class="fas fa-truck"> </i> Kirim Barang</button>
             </div>

             <div class="btn-group mr-2" role="group" aria-label="First group">
                <button type="submit" name="submit-btn" value="deleteForm" form="updateForm" class="btn btn-danger">
                    <i class="fas fa-trash"> </i> Hapus Barang</button>
            </div>
         </div>
@elseif(Auth::user()->role == 'admin_lampung' && $page_title == 'Data Barang Di Perjalanan' )
        <div class="btn-toolbar mb-2" role="toolbar" aria-label="toolbar with button groups">
        <div class="btn-group mr-2" role="group" aria-label="First group">
            <button type="submit" name="submit-btn" value="updateFormKonfirmasiDiterima" form="updateForm" class="btn btn-primary">
                <i class="fas fa-check-circle"> </i> Konfirmasi Barang Diterima</button>
        </div>
        </div>
@elseif(Auth::user()->role == 'admin_lampung' && $page_title == 'Data Barang Lampung' )
    <div class="btn-toolbar mb-2" role="toolbar" aria-label="toolbar with button groups">
        <div class="btn-group mr-2" role="group" aria-label="First group">
            <button type="submit" name="submit-btn" value="updateFormKonfirmasiSampai" form="updateForm" class="btn btn-primary">
                <i class="fas fa-check-circle"> </i> Konfirmasi Barang Sampai Tujuan</button>
        </div>
        </div>
@endif

         <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel {{ $page_title }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form id="updateForm" class="needs-validation" role="form" method="POST"
                    action="{{ '/update-kirim' }}" novalidate>
                    @csrf
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="{{ $hidden }}">Pilih</th>
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
                                <th class="{{ $hidden }}">Pilih</th>
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

                        @foreach($barang as $no => $b)
                            <tr>
                                <td class="{{ $hidden }}"><input type="checkbox" name="checkbox_value[]" value="{{ $b->id_barang }}"></td>
                                <td>{{ $no+1 }}</td>
                                <td><a href="{{ url('detail/'.$b->no_resi) }}">{{ $b->no_resi }}</a></td>
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
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

@include('layouts.admin.footer')
@include('layouts.admin.js.js')
@include('layouts.admin.js.js-barang-data')
@include('sweetalert::alert')

