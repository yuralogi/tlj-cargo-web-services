@include('layouts.admin.meta')
@include('layouts.admin.sidebar')
@include('layouts.admin.navbar')

 <!-- form start -->
 <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 ml-3 text-gray-800">Edit Ongkir</h1>
    <div class="flash-data" data-flashdata=""></div>
    <form class="needs-validation" role="form" method="POST" action="{{ 'update-ongkir' }}"
        novalidate>
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="ongkirBerat">Ongkir Berdasarkan Berat</label>
                <input type="" max-length="3" class="form-control" id="ongkirBerat"
                    name="ongkirBerat" value="{{ $data_ongkir[0]->tarif_ongkir }}" placeholder="" max='100' required>
                <div class=" invalid-feedback">
                    Ongkir Berat Wajib di Isi
                </div>
            </div>
            <div class="form-group">
                <label for="ongkirKubikasi">Ongkir Berdasarkan Kubikasi</label>
                <input type="" value="{{ $data_ongkir[1]->tarif_ongkir }}" class="form-control"
                    id="ongkirKubikasi" name="ongkirKubikasi" placeholder="" required>
                <div class="invalid-feedback">
                    Ongkir Kubikasi Wajib di Isi
                </div>
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary ml-3 float-right ">Update</button>
        </div>
        <!-- /.card-body -->
    </form>
</div>
</div>
</div>

@include('layouts.admin.footer')
@include('layouts.admin.js.js')
@include('layouts.admin.js.js-barang-data')
@include('sweetalert::alert')
