<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description"
        content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:description"
        content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title><?= $title_web;?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin/vali-admin-3.0.0/docs');?>/css/main.css">
    
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/vali-admin-3.0.0/docs');?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/admin/vali-admin-3.0.0/docs');?>/plugins/datatables-bs4/css/responsive.bootstrap4.min.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="<?= base_url('assets/admin/vali-admin-3.0.0/docs');?>/js/popper.min.js"></script>
    <script src="<?= base_url('assets/admin/vali-admin-3.0.0/docs');?>/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="app sidebar-mini">
    <?= view('components/admin/navbar');?>
    <!-- Sidebar menu-->
    <?= view('components/admin/sidebar');?>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="<?= $icons;?> mr-1"></i> <?= $title_web;?></h1>
                <!-- <p>A free and open source Bootstrap 4 admin template</p> -->
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#"><?= $title_web;?></a></li>
            </ul>
        </div>
        <?= view($view_template);?>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="<?= base_url('assets/admin/vali-admin-3.0.0/docs');?>/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= base_url('assets/admin/vali-admin-3.0.0/docs');?>/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="<?= base_url('assets/admin/vali-admin-3.0.0/docs');?>/js/plugins/chart.js">
    </script>
    <script src="<?= base_url('assets/admin/vali-admin-3.0.0/docs');?>/plugins/datatables-bs4/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/admin/vali-admin-3.0.0/docs');?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/admin/vali-admin-3.0.0/docs');?>/plugins/datatables-bs4/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('assets/admin/vali-admin-3.0.0/docs');?>/plugins/datatables-bs4/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example1').DataTable({resonsive:true});
        });
        AvatarExists = (url) => {
            var img = new Image();
            img.src = url;
            if (img.height > 0) {
                return url;
            } else {
                return "<?= base_url('assets/uploads/default/avatar-1.png');?>";
            }
        }
    </script>
</body>

</html>