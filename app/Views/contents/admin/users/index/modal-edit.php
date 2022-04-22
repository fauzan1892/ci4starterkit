<div class="modal-header border-0">
    <h5 class="modal-title"><i class="fa fa-edit mr-1"></i>Edit Users</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="post" id="EditUsers">
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" value="<?= $edit->name;?>" placeholder="Name" name="name"
                        id="name" placeholder="">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" value="<?= $edit->username;?>" placeholder="Username"
                        name="username" id="username" placeholder="">
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" value="<?= $edit->email;?>" placeholder="E-mail"
                        name="email" id="email" placeholder="">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" value="<?= $edit->phone;?>" class="form-control" name="phone" id="phone"
                        placeholder="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" style="height:120px;" name="address" id="address"
                        placeholder=""><?= $edit->address;?></textarea>
                </div>
                <div class="form-group">
                    <label for="active_users">Status</label>
                    <select class="form-control" name="active_users" id="active_users">
                        <option disabled selected value="">- Select -</option>
                        <option value="1" <?= $edit->active_users == 1 ? 'selected' : ''?>>Active</option>
                        <option value="0" <?= $edit->active_users == 0 ? 'selected' : ''?>>Non Active</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="users_role_id">Roles</label>
                    <select class="form-control" name="users_role_id" id="users_role_id">
                        <option disabled selected value="">- Select -</option>
                        <?php foreach($roles as $r){?>
                        <option value="<?= $r->id;?>" <?=$edit->users_role_id == $r->id ? 'selected' : ''?>>
                            <?= $r->roles;?>
                        </option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="password">Password <small class="text-danger pr-3">* Opsional</small></label>
                    <div class="input-group" id="pw_profil_edit">
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Ganti Password">
                        <div class="input-group-append">
                            <a href="javascript:void:(0)" style="text-decoration:none" class="input-group-text"><i
                                    class="fa fa-eye-slash text-danger" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer border-0">
        <input type="hidden" name="id" value="<?= $edit->id;?>">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
<script>
    $(document).ready(function() {
        $("#pw_profil_edit a").on('click', function(event) {
            event.preventDefault();
            if ($('#pw_profil_edit input').attr("type") == "text") {
                $('#pw_profil_edit input').attr('type', 'password');
                $('#pw_profil_edit i').addClass("fa-eye-slash text-danger");
                $('#pw_profil_edit i').removeClass("fa-eye text-success");
            } else if ($('#pw_profil_edit input').attr("type") == "password") {
                $('#pw_profil_edit input').attr('type', 'text');
                $('#pw_profil_edit i').removeClass("fa-eye-slash text-danger");
                $('#pw_profil_edit i').addClass("fa-eye text-success");
            }
        });
    });
</script>
<?php 
    echo view('components/ajax/ajax_form',[
        'tipe'      => 'edit',
        'table'     => '#table-users-csrf',
        'idSubmit'  => '#EditUsers',
        'urlForm'   => base_url('admin/users/update?tipe=edit'),
        'modal'     => 'open',
    ]);
?>