@include('layouts.admin.meta')
@include('layouts.admin.sidebar')
@include('layouts.admin.navbar')


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class=" mb-0 text-gray-800">Profile</h2>
    </div>
    <div class="card mb-4 py-3 border-left-primary">
        <div class="card-body">
            <img class="img-profile rounded-circle"
                src="{{ asset('sb-template/img/undraw_profile.svg') }}"
                style="height: 150px">
        </div>
        <div class="card-body">
            <h4>Nama : {{ Auth::user()->name_user }}</h4>
            <h4>Email : {{ Auth::user()->username }}</h4>
        </div>
    </div>


<!-- /.container-fluid -->
    </div>
</div>
<!-- End of Main Content -->

@include('layouts.admin.footer')
@include('layouts.admin.js.js')
