<div class="modal fade" id="<?= $modalIdEdit;?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog <?= $modal_size ?? '';?>" role="document">        
        <div class="modal-content" id="ubah-content<?= $modalIdEdit;?>"></div>
    </div>
</div>
<script>
    $('#<?= $tableIdEdit;?> tbody').on('click', '.<?= $classButtonEdit;?>', function(){
        var id = $(this).attr('data-id');
        $('#<?= $modalIdEdit;?>').modal('show');
        $.ajax({
            type: "POST",
            url: "<?= $urlModalEdit;?>",
            data: {id:id},
            success:function(html){
                $("#ubah-content<?= $modalIdEdit;?>").html(html);
            }
        });
    });
</script>