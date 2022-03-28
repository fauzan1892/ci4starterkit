<?php if(isset($pesan)){ $psn = $pesan; }else{ $psn = 'Are you sure the data will be deleted ?';}?>
<script>
    $('<?= $table;?> tbody').on('click', '<?= $idSubmit;?>', function(){
        var did = $(this).attr('data-id');
        Swal.fire({
            title: 'Delete Data ! ',
            text: "<?= $psn;?>",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?= $urlForm;?>",
                    type: "POST",
                    data: { "id": did},
                    dataType: "json",
                    timeout:6000,
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Loading ...',
                            didOpen: () => {
                                Swal.showLoading();
                            },
                        })
                    },
                    success: function(data){
                        if(data.cek == 'error'){
                            Swal.fire({
                                title: 'Failed !',
                                html: data.msg,
                                icon: 'warning',
                                confirmButtonText: 'Ok',
                            })
                        }else{
                            Swal.fire({
                                title: 'Success !',
                                html: data.msg,
                                icon: 'success',
                                confirmButtonText: 'Ok',
                            });
                            $("<?= $table;?>").DataTable().ajax.reload();
                        }
                    },
                    error: function(xmlhttprequest, textstatus, message) {
                        Swal.fire({
                            title: 'Error Request Timeout !',
                            text: "terjadi error mohon cek kembali internet anda !",
                            icon: 'error',
                            confirmButtonText: 'Oke',
                        })
                    }
                }); 
            }else{
                Swal.fire({
                    title: "Canceled !",
                    icon: "success",
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok',
                })
            }
        });
    });
</script>