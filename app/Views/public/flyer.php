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

                <button type="button" class="btn btn-sm btn-primary">Cek Kode</button>
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
                                    <h6 class="text-bold m-0">Flyer Prestasi</h6>
                                    <hr class="my-2">
                                    <div class="form-group row">
                                        <label for="formPrestasi-untuk" class="col-sm-3 col-form-label">Untuk</label>
                                        <div class="col-sm-9">
                                            <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                                <label class="btn btn-outline-primary">
                                                    <input type="radio" name="atas_nama" value="pd"> Murid
                                                </label>
                                                <label class="btn btn-outline-primary disabled">
                                                    <input type="radio" name="atas_nama" value="gtk"> Guru/TU
                                                </label>
                                                <label class="btn btn-outline-primary">
                                                    <input type="radio" name="atas_nama" value="custom"> Custom
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="formPrestasi-atasNama" class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9" id="formPrestasi-nama">
                                            <input type="text" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <form id="formPrestasi-tambahFlyer">
                                        <div class="form-group row">
                                            <label for="formPrestasi-content" class="col-sm-3 col-form-label">Uraian</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" id="formPrestasi-content" name="content" rows="3"></textarea>
                                                <div class="invalid-feedback">Harus di input!</div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label for="formPrestasi-fotoJuara" class="col-sm-3 col-form-label">Foto</label>
                                            <div class="col-sm-9">
                                                <div class="mb-2">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="formPrestasi-fotoJuara" accept="image/*">
                                                        <label class="custom-file-label" for="formPrestasi-fotoJuara">Choose file</label>
                                                        <div class="invalid-feedback">File foto harus di pilih!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="form-group row">
                                        <label for="previewFlyer" class="col-sm-3 col-form-label">Preview</label>
                                        <div class="col-sm-9">
                                            <div class="row row-cols-1 row-cols-sm-2">
                                                <div class="col mb-2" id="fotoPreview">
                                                    <div class="mb-1">
                                                        <img id="previewImage" class="img-fluid">
                                                    </div>
                                                    <div class="invalid-feedback">Harus diisi.</div>
                                                    <small class="form-text text-muted text-center m-0 mb-2">
                                                        Pastikan wajah berada ditengah-tengah bingkai.
                                                    </small>
                                                </div>
                                                <div class="col mb-2" id="previewFlyer">
                                                    <p class="text-center small">Klik tombol generate terlebih dahulu.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-2">
                                    <div class="float-right">
                                        <button type="button" class="btn btn-outline-primary" id="btnRun-generateFlyer"><i class="fas fa-save mr-1"></i>Generate</button>
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
                        ess_v1.0-pre_alpha
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
            $('input[name="atas_nama"]').on('change', function() {
                const anElm = $('#formPrestasi-nama');
                const tagName = anElm.prop('tagName').toLowerCase();

                if ($(this).val() == 'pd') {
                    anElm
                        .html(`<select class="custom-select select2-getPd" name="atas_nama" id="formPrestasi-atasNama"></select><div class="invalid-feedback">Harus di input!</div>`);
                    runSelect2GetPd();
                } else if ($(this).val() == 'custom') {
                    anElm.html('<input type="text" name="atas_nama" id="formPrestasi-atasNama" class="form-control"><div class="invalid-feedback">Harus di input!</div>')
                }
            });

            let cropper;
            $("#formPrestasi-fotoJuara").on("change", function(e) {
                const $prevElm = $('#fotoPreview');
                const $image = $("#previewImage");
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

            $('#btnRun-generateFlyer').on('click', async function() {
                const btn = $(this);
                if (!validationElm(['formPrestasi-atasNama', 'formPrestasi-content', 'formPrestasi-fotoJuara'], ['', null])) return;
                const untuk = $('input[name="atas_nama"]:checked').val();
                const id = $('#formPrestasi-atasNama').val();
                const isi = $('#formPrestasi-content').val();
                let nama = '';
                if (untuk == 'pd') {
                    const pd = await fetchData({
                        url: '/api/v0/buku-induk/peserta-didik/profil/' + id,
                        button: btn
                    })
                    if (pd)
                        nama = pd.nama + " - " + pd.rombel;
                } else if (untuk == 'custom')
                    nama = $('#formPrestasi-atasNama').val();
                cropper.getCroppedCanvas({
                    width: 720,
                    height: 720,
                }).toBlob(async function(blob) {
                    let formData = new FormData();
                    formData.append('foto', blob, 'foto.png');
                    formData.append('nama', nama);
                    formData.append('isi', isi)
                    const resp = await fetchData({
                        url: '/webService/flyer/generate',
                        data: formData,
                        method: 'POST',
                        button: btn
                    });
                    if (resp) {
                        $('#previewFlyer').html(`
                            <div class="mb-1">
                                <a href="${resp}" data-fancybox>
                                    <img src="${resp}" class="img-fluid">
                                </a>
                            </div>
                            <small class="form-text text-muted m-0 mb-2">
                                Klik pada foto untuk memperbesar. <a href="${resp}" target="_blank" download>Unduh Flyer disini</a>
                            </small>
                        `);
                    }
                });
            });
        });
    </script>
</body>

</html>