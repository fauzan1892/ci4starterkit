<?php if(isset($pesan)){ $psn = $pesan; }else{ $psn = 'Apakah anda yakin data akan dihapus ?';}?>
<script>
    $('<?= $table;?> tbody').on('click', '<?= $idSubmit;?>', function(){
        var did = $(this).attr('data-id');
        Swal.fire({
            title: 'Hapus Data ! ',
            text: "<?= $psn;?>",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oke',
            cancelButtonText: 'Batal'
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
                            title: 'Memuat',
                            didOpen: () => {
                                Swal.showLoading();
                            },
                        })
                    },
                    success: function(data){
                        if(data.cek == 'error'){
                            Swal.fire({
                                title: 'Gagal !',
                                html: data.msg,
                                icon: 'warning',
                                confirmButtonText: 'Oke',
                            })
                        }else{
                            Swal.fire({
                                title: 'Berhasil !',
                                html: data.msg,
                                icon: 'success',
                                confirmButtonText: 'Oke',
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
                    title: "Dibatalkan !",
                    icon: "success",
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Oke',
                })
            }
        });
    });
</script>