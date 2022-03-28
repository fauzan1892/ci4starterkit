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
                        title: 'Loading...',
                        didOpen: () => {
                            Swal.showLoading();
                        },
                    })
                },
                'success': function(data){
                    if(data.cek == 'error'){
                        Swal.fire({
                            title: 'Failed !',
                            html: data.msg,
                            icon: 'warning',
                            confirmButtonText: 'Ok',
                        });
                    }else{
                        Swal.fire({
                            title: 'Success !',
                            html: data.msg,
                            icon: 'success',
                            confirmButtonText: 'Ok',
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
                        <?php if($idSubmit == '#avatar_form'){?>
                            $("#avatar_edit").val(data.avatar);
                            $("#avatar_img").attr("src","<?= base_url('assets/uploads/avatar');?>/"+data.avatar);
                        <?php }?>
                    }
                },
                'error': function(xmlhttprequest, textstatus, message) {
                    Swal.fire({
                        title: 'Error Request Timeout !',
                        text:  message,
                        icon: 'error',
                        confirmButtonText: 'Oke',
                    })
                }
                
            });
        });
    });
</script>