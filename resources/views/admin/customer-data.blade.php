@include('layouts.admin.meta')
@include('layouts.admin.sidebar')
@include('layouts.admin.navbar')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" id="pageTitle">{{ $page_title }}</h1>
    </div>

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
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No Tlp</th>
                                <th>Tanggal Akun Dibuat</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No Tlp</th>
                            <th>Tanggal Akun Dibuat</th>
                        </tfoot>
                        <tbody>

                        @foreach($data as $no => $b)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $b->name }}</td>
                                <td>{{ $b->email }}</td>
                                <td>{{ $b->no_tlp }}</td>
                                <td>{{ $b->created_at }}</td>
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
