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
                        <div class="col-md-6 mx-auto">
                            <div class="card shadow">
                                <div class="card-body">
                                    <input type="hidden" id="idPrestasi">
                                    <div class="form-group">
                                        <label for="formPrestasi-namaPd">Nama Murid <small class="text-danger">*) Wajib</small></label>
                                        <select name="peserta_didik_id" id="formPrestasi-namaPd" class="custom-select select2-getPd"></select>
                                        <div class="invalid-feedback">Harus diisi.</div>
                                    </div>
                                    <form id="formPrestasi-tambahPrestasi">
                                        <div class="form-row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="formPrestasi-sebagai">Sebagai <small class="text-danger">*) Wajib</small></label>
                                                    <select name="hasil_id" id="formPrestasi-hasil" class="custom-select select2-getReferensi" data-referensi="hasilPrestasi"></select>
                                                    <div class="invalid-feedback">Harus diisi.</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label for="formPrestasi-cabang">Cabang Lomba</label>
                                                    <input type="text" class="form-control" id="formPrestasi-cabang" name="cabang" data-limit-max="10">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="formPrestasi-namaKejuaraan">Nama Kejuaraan/Kegiatan <small class="text-danger">*) Wajib</small></label>
                                            <textarea type="text" class="form-control" id="formPrestasi-namaKejuaraan" name="nama" rows="3" data-limit data-limit-max="20"></textarea>
                                            <div class="invalid-feedback">Harus diisi.</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="formPrestasi-namaKejuaraan">Penyelenggara <small class="text-danger">*) Wajib</small></label>
                                            <textarea type="text" class="form-control" id="formPrestasi-penyelenggara" name="penyelenggara" rows="2" data-limit data-limit-max="20"></textarea>
                                            <div class="invalid-feedback">Harus diisi.</div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="formPrestasi-namaPd">Tingkat Prestasi <small class="text-danger">*) Wajib</small></label>
                                                    <select name="tingkat_id" id="formPrestasi-tingkat" class="custom-select select2-getReferensi" data-referensi="tingkatPrestasi"></select>
                                                    <div class="invalid-feedback">Harus diisi.</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="formPrestasi-namaPd">Bidang Prestasi <small class="text-danger">*) Wajib</small></label>
                                                    <select name="bidang_id" id="formPrestasi-bidang" class="custom-select select2-getReferensi" data-referensi="bidangPrestasi"></select>
                                                    <div class="invalid-feedback">Harus diisi.</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label for="formPrestasi-fotoPiagam">Foto Piagam <small class="text-danger">*) Jika ada</small></label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="formPrestasi-fotoPiagam" accept="image/*">
                                                    <label class="custom-file-label" for="formPrestasi-fotoPiagam">Choose file</label>
                                                </div>
                                            </div>
                                            <div class="mb-3 d-none" id="piagamPreview">
                                                <div class="mb-1">
                                                    <a data-fancybox>
                                                        <img id="imgPiagam" class="img-fluid">
                                                    </a>
                                                </div><small class="form-text text-muted m-0 mb-2">
                                                    Klik pada foto untuk memperbesar.
                                                </small>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="d-flex justify-content-end">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-primary float-right" id="btnRun-saveFlyer">
                                                <i class="fas fa-save"></i>
                                                <span>
                                                    Simpan & Buat Flyer
                                                </span>
                                            </button>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" data-display="static" aria-expanded="false">
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                    <a class="dropdown-item" href="#">Simpan & Buat Baru</a>
                                                    <a class="dropdown-item" href="#">Simpan & Salin Form</a>
                                                    <a class="dropdown-item" href="#">Hanya Simpan/Update</a>
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
        (function($) {
            $.fn.limitInput = function(options) {
                return this.each(function() {
                    let $input = $(this);

                    // baca data-* attribute
                    let settings = $.extend({
                        type: $input.data("limit-type") || "all", // default "all"
                        max: $input.data("limit-max") || null, // max karakter
                        allow: $input.data("limit-allow") || null, // regex string
                        deny: $input.data("limit-deny") || null, // regex string
                        notify: $input.data("limit-notify") !== false, // default true
                        notifyContainer: $input.data("limit-container") || null
                    }, options);

                    // convert string ke RegExp jika ada
                    if (settings.allow) settings.allow = new RegExp(settings.allow);
                    if (settings.deny) settings.deny = new RegExp(settings.deny);

                    function showNotif(message) {
                        if (!settings.notify) return;

                        // hapus notif lama
                        $input.next(".invalid-feedback").remove();

                        // target notif
                        let $target = settings.notifyContainer ? $(settings.notifyContainer) : $input;

                        // sisipkan notif bootstrap
                        $target.after(`<div class="invalid-feedback d-block">${message}</div>`);

                        // auto hilang
                        setTimeout(() => {
                            $input.next(".invalid-feedback").fadeOut(300, function() {
                                $(this).remove();
                            });
                        }, 2000);
                    }

                    $input.on("keypress", function(e) {
                        let char = String.fromCharCode(e.which);

                        // cek max
                        if (settings.max !== null && $input.val().length >= settings.max) {
                            e.preventDefault();
                            showNotif(`Maksimal ${settings.max} karakter`);
                            return false;
                        }

                        // preset type
                        if (settings.type === "number" && !/[0-9]/.test(char)) {
                            e.preventDefault();
                            showNotif("Hanya boleh angka");
                            return false;
                        } else if (settings.type === "letter" && !/[a-zA-Z]/.test(char)) {
                            e.preventDefault();
                            showNotif("Hanya boleh huruf");
                            return false;
                        }

                        // allow regex
                        if (settings.allow instanceof RegExp && !settings.allow.test(char)) {
                            e.preventDefault();
                            showNotif("Karakter tidak diizinkan");
                            return false;
                        }

                        // deny regex
                        if (settings.deny instanceof RegExp && settings.deny.test(char)) {
                            e.preventDefault();
                            showNotif("Karakter dilarang");
                            return false;
                        }
                    });
                });
            };
        })(jQuery);
    </script>
    <script>
        $(document).ready(function() {
            $("[data-limit]").limitInput();

            $('#formPrestasi-fotoPiagam').on('change', function(e) {
                const $prevElm = $('#piagamPreview');
                const $img = $('#imgPiagam');
                const files = e.target.files;
                if (files && files.length > 0) {
                    $prevElm.removeClass('d-none');
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $img.attr('src', e.target.result);
                        $img.parents('a').attr('href', e.target.result);
                    }
                    reader.readAsDataURL(files[0]);
                } else $prevElm.addClass('d-none');
            });

            let cropper;
            const $prevElm = $('#fotoPreview');
            const $image = $("#previewImage");

            $("#formPrestasi-fotoJuara").on("change", function(e) {
                const files = e.target.files;
                if (files && files.length > 0) {
                    $prevElm.removeClass('d-none');
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $image.attr("src", e.target.result);

                        if (cropper) {
                            cropper.destroy();
                        }

                        cropper = new Cropper($image[0], {
                            aspectRatio: 1,
                            viewMode: 1,
                        });
                    };
                    reader.readAsDataURL(files[0]);
                } else $prevElm.addClass('d-none');
            });

            $('#btnRun-saveFlyer').on('click', function() {
                const btn = $(this);
                const validate = validationElm(['formPrestasi-namaPd', 'formPrestasi-hasil',
                    'formPrestasi-namaKejuaraan', 'formPrestasi-penyelenggara', 'formPrestasi-tingkat',
                    'formPrestasi-bidang', 'formPrestasi-fotoJuara',
                ], ['', null])
                if (!validate) return;
                const idPd = $('#formPrestasi-namaPd').val();
                const form = $('#formPrestasi-tambahPrestasi');
                const piagam = $('#formPrestasi-fotoPiagam');
                const filePiagam = piagam.prop('files');
                cropper.getCroppedCanvas({
                    width: 1080,
                    height: 1080,
                }).toBlob(async function(blob) {
                    let formData = new FormData(form[0]);
                    formData.append('foto', blob, 'foto.png');
                    if (filePiagam.length > 0)
                        formData.append('piagam', filePiagam[0]);

                    const resp = await fetchData({
                        url: '/webService/peserta-didik/prestasi/set/' + idPd,
                        data: formData,
                        method: 'POST',
                        button: btn
                    });
                    console.log(resp);

                });
            })
        });
    </script>
</body>

</html>