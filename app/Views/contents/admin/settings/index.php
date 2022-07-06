<?= alert_swal();?>
<div class="row">
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-header bg-primary text-white">
                <i class="fa fa-edit mr-1"></i> Edit Profil Aplikasi
            </div>
            <form method='POST' action='<?= base_url('admin/settings/update');?>' enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="app_name">Web Name</label>
                        <input type="text" class="form-control" value="<?= $edit->app_name;?>" name="app_name" id="app_name" placeholder=""/>
                    </div>
                    <div class="form-group">
                        <label for="app_description">Description</label>
                        <textarea class="form-control" name="app_description" id="app_description" placeholder=""><?= $edit->app_description;?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="app_owner">Owner</label>
                        <input type="text" class="form-control" value="<?= $edit->app_owner;?>" name="app_owner" id="app_owner" placeholder=""/>
                    </div>
                    <div class="form-group">
                        <label for="app_phone">Phone</label>
                        <input type="number" class="form-control" value="<?= $edit->app_phone;?>" name="app_phone" id="app_phone" placeholder=""/>
                    </div>
                    <div class="form-group">
                        <label for="app_email">E-mail</label>
                        <input type="email" class="form-control" value="<?= $edit->app_email;?>" name="app_email" id="app_email" placeholder=""/>
                    </div>
                    <div class="form-group">
                        <label for="app_address">Address</label>
                        <textarea class="form-control" name="app_address" id="app_address" placeholder=""><?= $edit->app_address;?></textarea>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="app_favicon">Favicon</label><br>
                                <input type="file" accept="image/*" name="app_favicon" id="app_favicon" placeholder=""/>
                                <input type="hidden" value="<?= $edit->app_favicon;?>" name="app_favicon_edit" id="app_favicon_edit" placeholder=""/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="app_logo">Logo</label><br>
                                <input type="file" accept="image/*" name="app_logo" id="app_logo" placeholder=""/>
                                <input type="hidden" value="<?= $edit->app_logo;?>" name="app_logo_edit" id="app_logo_edit" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <button type="submit" class="btn btn-primary btn-md">Save</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-header bg-primary text-white">
                <i class="fa fa-image mr-1"></i> Favicon 
            </div>
            <div class="card-body text-center">
                <img src="<?= cek_file_image($edit->app_favicon);?>" class="img-fluid">
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header bg-primary text-white">
                <i class="fa fa-image mr-1"></i> Logo
            </div>
            <div class="card-body text-center">
                <img src="<?= cek_file_image($edit->app_logo);?>" class="img-fluid">
            </div>
        </div>
    </div>
</div>