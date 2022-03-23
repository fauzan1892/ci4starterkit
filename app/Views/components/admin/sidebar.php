<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" style="width:35px;height:35px;"
            src="<?= cek_file_avatar(auth()->avatar);?>" alt="User Image">
        <div>
            <p class="app-sidebar__user-name"><?= auth()->name;?></p>
            <!-- <p class="app-sidebar__user-designation">Frontend Developer</p> -->
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item active" href="<?= base_url('admin/dashboard');?>">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i
                class="app-menu__icon fa fa-laptop"></i>
                <span class="app-menu__label">UI Elements</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="bootstrap-components.html">
                        <i class="icon fa fa-circle-o"></i>
                        Bootstrap Elements
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>