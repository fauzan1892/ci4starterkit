<?= alert_swal();?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modelId">
    <i class="fa fa-plus"></i> Hak Akses
</button>
<div class="card mt-2">
    <div class="card-header bg-primary text-white">
        Data Hak Akses
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-sm table-bordered w-100" id="example1">
                <thead>
                    <tr>
                        <th> No. </th>
                        <th>Hak Akses</th>
                        <th> Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no =1;
                        foreach($roles as $r){
                    ?>
                    <tr>
                        <td><?= $no;?></td>
                        <td><?=$r->roles;?></td>      
                        <td>
                            <div class="btn-group" role="group" aria-label="">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success btn-sm" 
                                    data-toggle="modal" data-target="#modelId<?= $r->id;?>">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <a href="javascript:void(0)" 
                                    class="btn btn-danger btn-sm" 
                                    onclick="javascript:return Remove_form('<?= base_url('admin/roles/delete/'.$r->id);?>');" 
                                    title="Delete">
                                    <i class="fa fa-times"></i> 
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php $no++; }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php foreach($roles as $r){ ?>
<!-- Modal -->
<div class="modal fade" data-backdrop="static" id="modelId<?= $r->id;?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-edit mr-1"></i> Edit Hak Akses</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form method="post" action="<?= base_url('admin/roles/update');?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="roles">Hak Akses</label>
                        <input type="text" class="form-control" value="<?= $r->roles;?>" name="roles" id="roles" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" value="<?= $r->id;?>" name="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php }?>
<!-- Modal -->
<div class="modal fade" id="modelId" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-plus"></i> Hak Akses
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('admin/roles/store');?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="roles">Hak Akses</label>
                        <input type="text" class="form-control" name="roles" id="roles" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>