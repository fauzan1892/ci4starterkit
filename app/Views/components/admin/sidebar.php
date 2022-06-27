<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" style="width:35px;height:35px;"
            src="<?= cek_file_avatar(auth()->avatar);?>" alt="User Image">
        <div>
            <p class="app-sidebar__user-name"><?= auth()->name;?></p>
            <p class="app-sidebar__user-designation">
                <span class="badge badge-success"><?= auth()->roles;?></span>
            </p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item <?= $sidebar == 'dashboard' ? 'active' : ''?>" href="<?= base_url('admin/dashboard');?>">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li class="treeview 
            <?php 
                if(in_array($sidebar,['users','roles','settings'])){ 
                    echo 'is-expanded'; 
                }
            ?>">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-cog"></i>
                <span class="app-menu__label">Pengaturan</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item <?= $sidebar == 'users' ? 'active' : ''?>" href="<?= base_url('admin/users');?>">
                        <i class="icon fa fa-user pr-1"></i>
                        Users
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?= $sidebar == 'roles' ? 'active' : ''?>" href="<?= base_url('admin/roles');?>">
                        <i class="icon fa fa-ban pr-1"></i>
                        Roles
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?= $sidebar == 'settings' ? 'active' : ''?>" href="<?= base_url('admin/settings');?>">
                        <i class="icon fa fa-cog pr-1"></i>
                        Profil Aplikasi
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>