@if($page_title == 'Data Barang Jakarta')
    <script>
    function GetDetail(noTlp){
        if (noTlp.length == 0) {
            document.getElementById("namaPengirim").value = "";
            $('#namaPengirim').prop('readonly', false);
            return;
        }
        else {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var dataToSend = new FormData();
            dataToSend.append('data_telepon', noTlp);
            $.ajax({
                url: '/get-name-by-tlp',
                type: 'POST',
                data: dataToSend,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    // Handle the response from the server here
                    if (response.user.length != 0 ) {
                        $('#namaPengirim').val(response.user[0].name);
                        $('#idHidden').val(response.user[0].id);
                        $('#namaPengirim').prop('readonly', true);
                    } else {
                        $('#namaPengirim').prop('readonly', false);
                        $('#namaPengirim').val("");
                        $('#idHidden').val(null);
                    }
                },
                error: function(xhr, status, error) {
                    // console.error(error);
                }
            });
        }
    }
    </script>
@endif
