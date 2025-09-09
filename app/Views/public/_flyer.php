<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Espero Smart School - Flyer</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/select2/css/select2.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/select2-bootstrap4-theme/select2-bootstrap4.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/cropperjs/cropper.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/toastr/toastr.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/fancyapps/fancybox.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/adminlte.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/global.css'); ?>">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="<?= base_url(); ?>" class="navbar-brand">
                    <img src="<?= base_url('assets/img/brands/logo2.png'); ?>" alt="ESS Logo" class="brand-image">
                    <span class="brand-text font-weight-light"><strong>Espero</strong>SmartSchool</span>
                </a>

                <!-- <button type="button" class="btn btn-sm btn-primary">Cek Kode</button> -->
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-8 text-center mx-auto">
                            <h1 class="m-0">Buat Flyer</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">

                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="container">
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">
                    <a href="https://github.com/medigital-dev/Espero-Smart-School" target="_blank">
                        ESS_v1.0-pre_alpha
                    </a>
                </div>
                <!-- Default to the left -->
                <strong><a href="https://muhsaidlg.my.id" class="text-muted" target="_blank">&copy; 2025</a> | <span class="text-primary">Tim IT & Digitalisasi Sekolah.</span></strong>
            </div>
        </footer>
        <?= modal('add-flyer'); ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url('plugins/jquery/jquery.min.js'); ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/select2/js/select2.full.js'); ?>"></script>
    <script src="<?= base_url('plugins/select2-searchInputPlaceholder/select2-searchInputPlaceholder.js'); ?>"></script>
    <script src="<?= base_url('plugins/bs-custom-file-input/bs-custom-file-input.js'); ?>"></script>
    <script src="<?= base_url('plugins/cropperjs/cropper.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/toastr/toastr.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/fancyapps/fancybox.umd.js'); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/js/adminlte.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/functions.js'); ?>"></script>
    <script src="<?= base_url('assets/js/variable.js'); ?>"></script>
    <script src="<?= base_url('assets/js/select2-ajax.js'); ?>"></script>
    <script src="<?= base_url('assets/js/global.js'); ?>"></script>
    <!-- myScript -->
    <script>
        $(document).ready(function() {

        });
    </script>
</body>

</html>