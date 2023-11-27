<!-- Bootstrap core JavaScript-->
<script src="{{ asset('sb-template/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('sb-template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('sb-template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('sb-template/js/sb-admin-2.min.j') }}s"></script>

<!-- Page level plugins -->
<script src="{{ asset('sb-template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('sb-template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('sb-template/js/demo/datatables-demo.js') }}"></script>

<!-- validation form -->
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    </script>

<script>
    function showJenisBarang(select) {
        if (select.value == 'Berat') {
            document.getElementById('pilihUkuran').style.display = "block";
            document.getElementById('labelPilihUkuran').innerHTML = "Masukan berat (Kg)";

        } else if(select.value == 'Kubikasi') {
            document.getElementById('pilihUkuran').style.display = "block";
            document.getElementById('labelPilihUkuran').innerHTML = "Masukan Kubikasi (m³)";
        }
    }
</script>



</body>
</html>
