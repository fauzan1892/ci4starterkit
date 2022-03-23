<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin/vali-admin-3.0.0/docs/css/main.css');?>">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?= $title_web;?></title>
    <?= csrf_meta() ?>
</head>

<body>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <div class="logo">
            <h1>Vali</h1>
        </div>
        <?= alert_bs();?>
        <?= view($view_template);?>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="<?= base_url('assets/admin/vali-admin-3.0.0/docs/js/jquery-3.3.1.min.js');?>"></script>
    <script src="<?= base_url('assets/admin/vali-admin-3.0.0/docs/js/popper.min.js');?>"></script>
    <script src="<?= base_url('assets/admin/vali-admin-3.0.0/docs/js/bootstrap.min.js');?>"></script>
    <script src="<?= base_url('assets/admin/vali-admin-3.0.0/docs/js/main.js');?>"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= base_url('assets/admin/vali-admin-3.0.0/docs/js/plugins/pace.min.js');?>"></script>
    <script type="text/javascript">
    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
    });
    </script>
</body>

</html>