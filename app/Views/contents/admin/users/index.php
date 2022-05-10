<?= alert_bs();?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modelId">
    <i class="fa fa-user-plus"></i> Users
</button>
<div class="card mt-2">
    <div class="card-header bg-primary text-white">
        Data Users
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-sm table-bordered w-100" id="table-users-csrf">
                <thead>
                    <tr>
                        <th> No. </th>
                        <th> Avatar</th>
                        <th> Name</th>
                        <th> Username</th>
                        <th> E-mail</th>
                        <th> Roles</th>
                        <th> Status </th>
                        <th> Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modelId" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-user-plus"></i> Users
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="AddUsers">
                <!-- <input type="hidden" id="csrf_name_addusers" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" /> -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" placeholder="Name" name="name" id="name" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" placeholder="Username" name="username" id="username" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" placeholder="E-mail" name="email" id="email" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password" id="password" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="retype_password">Retype Password</label>
                                <input type="password" class="form-control" placeholder="Retype Password" name="retype_password" id="retype_password" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="number" class="form-control" name="phone" id="phone" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" style="height:100px;" name="address" id="address" placeholder=""></textarea>
                            </div>
                            <div class="form-group">
                                <label for="active_users">Status</label>
                                <select class="form-control" name="active_users" id="active_users">
                                    <option disabled selected value="">- Select -</option>
                                    <option value="1">Active</option>
                                    <option value="0">Non Active</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="users_role_id">Roles</label>
                                <select class="form-control" name="users_role_id" id="users_role_id">
                                    <option disabled selected value="">- Select -</option>
                                    <?php foreach($roles as $r){?>
                                        <option value="<?= $r->id;?>"><?= $r->roles;?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
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
<?= view('contents/admin/users/js/index_js');?>