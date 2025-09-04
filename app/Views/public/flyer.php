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
                    <div class="row">
                        <div class="col-lg-6 mx-auto">
                            <div class="card card-primary shadow">
                                <div class="card-header">
                                    <h3 class="card-title">Form Flyer</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3 mb-3 mb-lg-0">
                                            <div class="nav flex-row flex-sm-column nav-pills" id="tabs-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link active" id="tabs-prestasi-tab" data-toggle="pill" href="#tabs-prestasi" role="tab" aria-controls="tabs-prestasi" aria-selected="true">
                                                    <i class="fas fa-trophy fa-fw"></i>
                                                    <span class="d-none d-sm-inline">
                                                        Prestasi
                                                    </span>
                                                </a>
                                                <a class="nav-link" id="tabs-duka-tab" data-toggle="pill" href="#tabs-duka" role="tab" aria-controls="tabs-duka" aria-selected="false">
                                                    <i class="fas fa-hand-holding-heart fa-fw"></i>
                                                    <span class="d-none d-sm-inline">
                                                        Duka
                                                    </span>
                                                </a>
                                                <a class="nav-link" id="tabs-info-tab" data-toggle="pill" href="#tabs-info" role="tab" aria-controls="tabs-info" aria-selected="false">
                                                    <i class="fas fa-info-circle fa-fw"></i>
                                                    <span class="d-none d-sm-inline">
                                                        Info
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="tab-content" id="tabs-tabContent">
                                                <div class="tab-pane active show fade" id="tabs-prestasi" role="tabpanel" aria-labelledby="tabs-prestasi-tab">
                                                    <h6 class="text-bold m-0">Flyer Prestasi</h6>
                                                    <hr class="my-2">
                                                    <form id="formFlyer-prestasi">
                                                        <input type="hidden" name="kode" id="formFlyer-prestasi_kode">
                                                        <div class="form-group row">
                                                            <label for="formFlyer-prestasi_untuk" class="col-sm-3 col-form-label">Untuk</label>
                                                            <div class="col-sm-9">
                                                                <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                                                    <label class="btn btn-outline-primary">
                                                                        <input type="radio" name="target" value="pd"> Murid
                                                                    </label>
                                                                    <label class="btn btn-outline-primary disabled">
                                                                        <input type="radio" name="target" value="gtk"> Guru/TU
                                                                    </label>
                                                                    <label class="btn btn-outline-primary">
                                                                        <input type="radio" name="target" value="custom"> Custom
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="formFlyer-prestasi_atasNama" class="col-sm-3 col-form-label">Nama</label>
                                                            <div class="col-sm-9" id="formFlyer-prestasi_nama">
                                                                <input type="text" class="form-control" disabled>
                                                                <div class="invalid-feedback">Harus di input!</div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="formFlyer-prestasi_content" class="col-sm-3 col-form-label">Uraian</label>
                                                            <div class="col-sm-9">
                                                                <textarea class="form-control" id="formFlyer-prestasi_content" name="isi" rows="3"></textarea>
                                                                <div class="invalid-feedback">Harus di input!</div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-1">
                                                            <label for="formFlyer-prestasi_foto" class="col-sm-3 col-form-label">Foto</label>
                                                            <div class="col-sm-9">
                                                                <div class="mb-2">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" id="formFlyer-prestasi_foto" accept="image/*">
                                                                        <label class="custom-file-label" for="formFlyer-prestasi_foto">Choose file</label>
                                                                        <div class="invalid-feedback">File foto harus di pilih!</div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <div class="mb-1 d-none w-100" id="formFlyer-prestasi_fotoPreview" style="max-height: 360px;">
                                                                        <img id="formFlyer-prestasi_previewImage" class="img-fluid">
                                                                        <small class="form-text text-muted text-center m-0 mb-2">
                                                                            Pastikan wajah berada ditengah-tengah bingkai.
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="form-group row mb-0">
                                                        <label for="formFlyer-prestasi_preview" class="col-sm-3 col-form-label">Preview</label>
                                                        <div class="col-sm-9" id="formFlyer-prestasi_preview">
                                                            <p class="text-center pt-2 m-0 small">Klik tombol generate terlebih dahulu.</p>
                                                        </div>
                                                    </div>
                                                    <hr class="my-2">
                                                    <div class="float-right">
                                                        <button type="button" class="btn btn-outline-primary" id="btnGenerate-prestasi"><i class="fas fa-save mr-1"></i>Generate</button>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tabs-duka" role="tabpanel" aria-labelledby="tabs-duka-tab">
                                                    <h6 class="text-bold m-0">Flyer Duka Cita</h6>
                                                    <hr class="my-2">
                                                    <form id="formFlyer-duka">
                                                        <input type="hidden" name="kode" id="formFlyer-duka_kode">
                                                        <div class="form-group row">
                                                            <label for="formFlyer-duka_atasNama" class="col-sm-3 col-form-label">Nama</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="nama" id="formFlyer-duka_atasNama">
                                                                <div class="invalid-feedback">Harus di input!</div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="formFlyer-duka_content" class="col-sm-3 col-form-label">Keterangan</label>
                                                            <div class="col-sm-9">
                                                                <textarea class="form-control" id="formFlyer-duka_content" name="keterangan" rows="2"></textarea>
                                                                <div class="invalid-feedback">Harus di input!</div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-1">
                                                            <label for="formFlyer-duka_foto" class="col-sm-3 col-form-label">Foto</label>
                                                            <div class="col-sm-9">
                                                                <div class="mb-2">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" id="formFlyer-duka_foto" accept="image/*">
                                                                        <label class="custom-file-label" for="formFlyer-duka_foto">Choose file</label>
                                                                        <div class="invalid-feedback">File foto harus di pilih!</div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <div class="mb-1 d-none w-100" id="formFlyer-duka_fotoPreview" style="max-height: 360px;">
                                                                        <img id="formFlyer-duka_previewImage" class="img-fluid">
                                                                        <small class="form-text text-muted text-center m-0 mb-2">
                                                                            Pastikan wajah berada ditengah-tengah bingkai.
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="form-group row mb-0">
                                                        <label for="formFlyer-duka_preview" class="col-sm-3 col-form-label">Preview</label>
                                                        <div class="col-sm-9" id="formFlyer-duka_preview">
                                                            <p class="text-center pt-2 m-0 small">Klik tombol generate terlebih dahulu.</p>
                                                        </div>
                                                    </div>
                                                    <hr class="my-2">
                                                    <div class="float-right">
                                                        <button type="button" class="btn btn-outline-primary" id="btnGenerate-duka"><i class="fas fa-save mr-1"></i>Generate</button>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tabs-info" role="tabpanel" aria-labelledby="tabs-info-tab">
                                                    <h6 class="text-bold m-0">Flyer Informasi</h6>
                                                    <hr class="my-2">
                                                    <form id="formFlyer-info">
                                                        <input type="hidden" name="kode" id="formFlyer-info_kode">
                                                        <div class="form-group row">
                                                            <label for="formFlyer-info_judul" class="col-sm-3 col-form-label">Judul</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="judul" id="formFlyer-info_judul">
                                                                <div class="invalid-feedback">Harus di input!</div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="formFlyer-info_content" class="col-sm-3 col-form-label">Konten</label>
                                                            <div class="col-sm-9">
                                                                <textarea class="form-control" id="formFlyer-info_content" name="konten" rows="4"></textarea>
                                                                <div class="invalid-feedback">Harus di input!</div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="form-group row mb-0">
                                                        <label for="formFlyer-info_preview" class="col-sm-3 col-form-label">Preview</label>
                                                        <div class="col-sm-9" id="formFlyer-info_preview">
                                                            <p class="text-center pt-2 m-0 small">Klik tombol generate terlebih dahulu.</p>
                                                        </div>
                                                    </div>
                                                    <hr class="my-2">
                                                    <div class="float-right">
                                                        <button type="button" class="btn btn-outline-primary" id="btnGenerate-info"><i class="fas fa-save mr-1"></i>Generate</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
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
            $('#formFlyer-prestasi input[name="target"]').on('change', function() {
                const anElm = $('#formFlyer-prestasi_nama');

                if ($(this).val() == 'pd') {
                    anElm.html(`<select class="custom-select select2-getPd" name="idTarget" id="formFlyer-prestasi_atasNama"></select><div class="invalid-feedback">Harus di input!</div>`);
                    runSelect2GetPd();
                } else if ($(this).val() == 'custom') {
                    anElm.html('<input type="text" name="idTarget" id="formFlyer-prestasi_atasNama" class="form-control"><div class="invalid-feedback">Harus di input!</div>')
                }
            });

            let cropper;
            $("#formFlyer-prestasi_foto").on("change", function(e) {
                const $prevElm = $('#formFlyer-prestasi_fotoPreview');
                const $image = $("#formFlyer-prestasi_previewImage");
                const files = e.target.files;
                if (files && files.length > 0) {
                    $prevElm.removeClass('d-none');
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $image.attr("src", e.target.result);
                        if (cropper)
                            cropper.destroy();
                        cropper = new Cropper($image[0], {
                            aspectRatio: 1,
                            viewMode: 1,
                        });
                    };
                    reader.readAsDataURL(files[0]);
                } else $prevElm.addClass('d-none');
            });

            $("#formFlyer-duka_foto").on("change", function(e) {
                const $prevElm = $('#formFlyer-duka_fotoPreview');
                const $image = $("#formFlyer-duka_previewImage");
                const files = e.target.files;
                if (files && files.length > 0) {
                    $prevElm.removeClass('d-none');
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $image.attr("src", e.target.result);
                        if (cropper)
                            cropper.destroy();
                        cropper = new Cropper($image[0], {
                            aspectRatio: 1,
                            viewMode: 1,
                        });
                    };
                    reader.readAsDataURL(files[0]);
                } else $prevElm.addClass('d-none');
            });

            $('#btnGenerate-prestasi').on('click', async function() {
                const btn = $(this);
                if (!validationElm(['formFlyer-prestasi_atasNama', 'formFlyer-prestasi_content', 'formFlyer-prestasi_foto'], ['', null])) return;
                const form = $('#formFlyer-prestasi');
                cropper.getCroppedCanvas({
                    width: 720,
                    height: 720,
                }).toBlob(async function(blob) {
                    let formData = new FormData(form[0]);
                    formData.append('foto', blob, 'foto.png');
                    const resp = await fetchData({
                        url: '/webService/flyer/prestasi/generate',
                        data: formData,
                        method: 'POST',
                        button: btn
                    });
                    if (resp) {
                        $('#formFlyer-prestasi_kode').val(resp.kode);
                        $('#formFlyer-prestasi_preview').html(`
                            <div class="mb-1">
                                <a href="${resp.src}" data-fancybox>
                                    <img src="${resp.src}" class="img-fluid">
                                </a>
                            </div>
                            <p class="form-text text-muted small m-0 mb-1">
                                Klik pada foto untuk memperbesar.
                            </p>
                            <a class="btn btn-sm btn-success" href="${resp.src}" download><i class="fas fa-download fa-fw mr-1"></i>Unduh Flyer</a>
                        `);
                    }
                });
            });

            $('#btnGenerate-duka').on('click', async function() {
                const btn = $(this);
                if (!validationElm(['formFlyer-duka_atasNama', 'formFlyer-duka_content', 'formFlyer-duka_foto'], ['', null])) return;
                const form = $('#formFlyer-duka');
                cropper.getCroppedCanvas({
                    width: 720,
                    height: 720,
                }).toBlob(async function(blob) {
                    let formData = new FormData(form[0]);
                    formData.append('foto', blob, 'foto.png');
                    const resp = await fetchData({
                        url: '/webService/flyer/duka/generate',
                        data: formData,
                        method: 'POST',
                        button: btn
                    });
                    if (resp) {
                        $('#formFlyer-duka_kode').val(resp.kode);
                        $('#formFlyer-duka_preview').html(`
                            <div class="mb-1">
                                <a href="${resp.src}" data-fancybox>
                                    <img src="${resp.src}" class="img-fluid">
                                </a>
                            </div>
                            <p class="form-text text-muted small m-0 mb-1">
                                Klik pada foto untuk memperbesar.
                            </p>
                            <a class="btn btn-sm btn-success" href="${resp.src}" download><i class="fas fa-download fa-fw mr-1"></i>Unduh Flyer</a>
                        `);
                    }
                });
            });

            $('#btnGenerate-info').on('click', async function() {
                const btn = $(this);
                if (!validationElm(['formFlyer-info_atasNama', 'formFlyer-info_content', 'formFlyer-info_foto'], ['', null])) return;
                const form = $('#formFlyer-info');
                let formData = new FormData(form[0]);
                const resp = await fetchData({
                    url: '/webService/flyer/info/generate',
                    data: formData,
                    method: 'POST',
                    button: btn
                });
                if (resp) {
                    $('#formFlyer-info_kode').val(resp.kode);
                    $('#formFlyer-info_preview').html(`
                        <div class="mb-1">
                            <a href="${resp.src}" data-fancybox>
                                <img src="${resp.src}" class="img-fluid">
                            </a>
                        </div>
                        <p class="form-text text-muted small m-0 mb-1">
                            Klik pada foto untuk memperbesar.
                        </p>
                        <a class="btn btn-sm btn-success" href="${resp.src}" download><i class="fas fa-download fa-fw mr-1"></i>Unduh Flyer</a>
                    `);
                }
            });
        });
    </script>
</body>

</html>