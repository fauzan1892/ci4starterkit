<script>
    $(document).ready(function(){
        $('<?= $idSubmit;?>').submit(function(e){
            e.preventDefault();
            $.ajax({
                'type': 'POST',
                'url': '<?= $urlForm;?>',
                'data':  new FormData(this),
                'contentType': false,
                'cache': false,
                'processData':false,
                'dataType' : 'json',
                'timeout':60000,
                'beforeSend': function() {
                    Swal.fire({
                        title: 'Memuat',
                        didOpen: () => {
                            Swal.showLoading();
                        },
                    })
                },
                'success': function(data){
                    if(data.cek == 'error'){
                        Swal.fire({
                            title: 'Gagal !',
                            html: data.msg,
                            icon: 'warning',
                            confirmButtonText: 'Oke',
                        });
                    }else{
                        Swal.fire({
                            title: 'Berhasil !',
                            html: data.msg,
                            icon: 'success',
                            confirmButtonText: 'Oke',
                        });
                        <?php if(isset($table)){?>
                            $("<?= $table;?>").DataTable().ajax.reload();
                        <?php }?>
                        <?php if($tipe == 'tambah'){?>
                            $('<?= $idSubmit;?>').trigger("reset");
                        <?php }?>
                        <?php if($modal == 'close'){?>
                            $('.modal').modal('hide');
                        <?php }?>
                    }
                    <?php if($form_csrf){?>
                        $('<?= $form_csrf;?>').val(data.csrf_hash); // CSRF hash
                    <?php }?>
                },
                'error': function(xmlhttprequest, textstatus, message) {
                    Swal.fire({
                        title: 'Error Request Timeout !',
                        text: "terjadi error mohon cek kembali internet anda !",
                        icon: 'error',
                        confirmButtonText: 'Oke',
                    })
                }
                
            });
        });
    });
</script>