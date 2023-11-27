<script src="{{ asset('mazer-template/assets/static/js/components/dark.js') }}"></script>
<script src="{{ asset('mazer-template/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('mazer-template/assets/compiled/js/app.js') }}"></script>

@if (Session::has('sweet_alert.alert'))
    <script>
        swal({
            text: "{!! Session::get('sweet_alert.text') !!}",
            title: "{!! Session::get('sweet_alert.title') !!}",
            timer: {!! Session::get('sweet_alert.timer') !!},
            type: "{!! Session::get('sweet_alert.type') !!}",
            showConfirmButton: "{!! Session::get('sweet_alert.showConfirmButton') !!}",
            confirmButtonText: "{!! Session::get('sweet_alert.confirmButtonText') !!}",
            confirmButtonColor: "#AEDEF4"

            // more options
        });
    </script>
@endif