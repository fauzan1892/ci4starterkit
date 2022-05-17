<div class="row">
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-header bg-primary text-white">
                <i class="fa fa-edit mr-1"></i> Edit Profil
            </div>
            <div class="card-body">
                <form method='POST' id="profil_form">
                    <!-- <input type="hidden" id="csrf_name_profil" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" /> -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" value="<?= $edit->name;?>" name="name" id="name"
                                    placeholder="" />
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" value="<?= $edit->username;?>" name="username"
                                    id="username" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="text" class="form-control" value="<?= $edit->email;?>" name="email"
                                    id="email" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label for="password">Password <small class="text-danger pr-3">* Opsional</small></label>
								<div class="input-group" id="pw_profil">
                                	<input type="password" class="form-control" name="password" id="password" placeholder="Ganti Password">
									<div class="input-group-append">
										<a href="javascript:void:(0)" style="text-decoration:none" class="input-group-text"><i class="fa fa-eye-slash text-danger" aria-hidden="true"></i></a>
									</div>
								</div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="<?= $edit->id;?>" name="id">
                    <button type="submit" class="btn btn-primary btn-md">Save</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-header bg-primary text-white">
                <i class="fa fa-image mr-1"></i> Foto Profil
            </div>
            <div class="card-body">
                <img class="img-fluid" id="avatar_img" src="<?= cek_file_avatar($edit->avatar);?>" alt="User Image">
            </div>
            <div class="card-footer text-muted">
                <form method='POST' enctype="multipart/form-data" id="avatar_form">
                    <!-- <input type="hidden" id="csrf_name_avatar" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" /> -->
                    <div class="form-group">
                        <label for="avatar">Avatar</label>
                        <input type="file" name="avatar" id="avatar" placeholder="" />
                        <input type="hidden" value="<?= $edit->avatar;?>" name="avatar_edit" id="avatar_edit">
                        <input type="hidden" value="<?= $edit->id;?>" name="id">
                    </div>
                    <button type="submit" class="btn btn-primary btn-md">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= view('contents/admin/users/js/profil_js');?>
