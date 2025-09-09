<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/select2/css/select2.css">
    <link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.css">
    <link rel="stylesheet" href="<?= base_url('plugins/cropperjs/cropper.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/fancyapps/fancybox.css'); ?>">
    <!-- <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.css">
    <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css"> -->
    <link rel="stylesheet" href="/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="/assets/css/adminlte.min.css">
    <!-- <link rel="stylesheet" href="/assets/css/global.css"> -->
    <!-- MyCss -->
    <style>

    </style>
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white sticky-top">
            <div class="container">
                <a href="<?= base_url(); ?>" class="navbar-brand">
                    <img src="<?= base_url('assets/img/brands/logo2.png'); ?>" alt="ESS Logo" class="brand-image">
                    <span class="brand-text font-weight-light"><strong>Espero</strong>SmartSchool</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdown-data" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle <?= $sidebar['parent'] == 'database' ? 'active' : ''; ?>">Data</a>
                            <ul aria-labelledby="dropdown-data" class="dropdown-menu shadow">
                                <li><a href="<?= base_url('peserta-didik'); ?>" class="dropdown-item <?= $sidebar['current'] == 'data-pd' ? 'active' : ''; ?>">Murid </a></li>
                                <li><a href="<?= base_url('guru'); ?>" class="dropdown-item <?= $sidebar['current'] == 'data-guru' ? 'active' : ''; ?>">Guru</a></li>
                                <li><a href="<?= base_url('pegawai'); ?>" class="dropdown-item <?= $sidebar['current'] == 'data-pegawai' ? 'active' : ''; ?>">Pegawai</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdown-layanan" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle <?= $sidebar['parent'] == 'layanan' ? 'active' : ''; ?>">Layanan</a>
                            <ul aria-labelledby="dropdown-layanan" class="dropdown-menu shadow">
                                <li><a href="<?= base_url('flyer'); ?>" class="dropdown-item <?= $sidebar['current'] == 'flyer' ? 'active' : ''; ?>">Buat Flyer </a></li>
                            </ul>
                        </li>
                    </ul>
                    <a href="#" class="btn btn-sm btn-primary ml-auto">Login</a>
                </div>
            </div>
        </nav>

        <div class="content-wrapper pt-3">
            <div class="content">
                <div class="container">
                    <?= $this->renderSection('content'); ?>
                </div>
            </div>
        </div>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>

        <footer class="main-footer">
            <div class="container">
                <div class="float-right">
                    <a href="https://muhsaidlg.my.id" data-toggle="tooltip" title="Dibuat dan dikembangkan oleh muhsaidlg.my.id" target="_blank">
                        <img src="<?= base_url('assets/img/brands/meDigital-dev.png'); ?>" alt="Logo" height="20">
                    </a>
                    <div class="d-none d-sm-inline">
                        <a href="https://github.com/medigital-dev/Espero-Smart-School" target="_blank">
                            ESS_v1.0-pre_alpha
                        </a>
                    </div>
                </div>
                &copy; 2025 | <span class="text-primary">Tim IT & Digitalisasi Sekolah.</span></strong>
            </div>
        </footer>
    </div>

    <script src="/plugins/jquery/jquery.min.js"></script>
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="/plugins/moment/moment-with-locales.js"></script> -->
    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/plugins/select2/js/select2.full.js"></script>
    <script src="/plugins/select2-searchInputPlaceholder/select2-searchInputPlaceholder.js"></script>
    <script src="<?= base_url('plugins/fancyapps/fancybox.umd.js'); ?>"></script>
    <!-- <script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.js"></script>
    <script src="/plugins/inputmask/jquery.inputmask.js"></script>-->
    <script src="<?= base_url('plugins/bs-custom-file-input/bs-custom-file-input.js'); ?>"></script>
    <script src="<?= base_url('plugins/cropperjs/cropper.min.js'); ?>"></script>
    <script src="/plugins/toastr/toastr.min.js"></script>
    <!-- <script src="/plugins/fetchData/fetchData.js"></script>  -->
    <script src="/assets/js/adminlte.min.js"></script>
    <script src="/assets/js/functions.js"></script>
    <!-- <script src="/assets/js/global.js"></script> -->
    <!-- function script -->
    <script>

    </script>
    <!-- end function script -->
    <!-- Global Script -->
    <script>
        $(document).ready(function() {
            runBsCustomFileInput();
            runFancyBox();
        });
    </script>
    <!-- End Global Script -->
    <!-- Constanta DataTables -->
    <script>
        const dtPublicPd = $('#dtPublic-pesertaDidik').DataTable({
            dom: 't',
            pageLength: 5,
            processing: true,
            serverSide: true,
            responsive: true,
            order: [],
            ajax: {
                method: "POST",
                url: "/webService/v1/peserta-didik/datatable",
            },
            language: {
                url: "/plugins/datatables/id.json",
            },
            columns: [{
                    data: null,
                    className: 'text-lg-center',
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                }, {
                    data: "kelas",
                    name: 'rombongan_belajar.nama',
                    className: 'text-lg-center',
                    render: (data) => {
                        return `<span class="badge bg-success">${data}</span>`;
                    }
                }, {
                    data: "nama",
                    name: 'peserta_didik.nama',
                },
                {
                    data: "nipd",
                    name: 'nipd',
                    className: "text-lg-center",
                },
                {
                    data: "nisn",
                    name: 'nisn',
                    orderable: false,
                    className: "text-lg-center",
                },
                {
                    data: "jenis_kelamin",
                    name: 'ref_jenis_kelamin.nama',
                    orderable: false,
                    className: 'text-lg-center'
                },
                {
                    orderable: false,
                    name: 'tempat_lahir',
                    data: "tempat_lahir",
                },
                {
                    data: "tanggal_lahir",
                    name: 'tanggal_lahir',
                    className: 'text-lg-center',
                    render: (data) => {
                        return tanggal(data, 'dd mmmm Y')
                    }
                },
            ],
        })
    </script>
    <!-- End Constanta DataTables -->

    <!-- Start Main Script -->
    <script>
        $(document).ready(function() {
            dtPublicPd.on('draw', function() {
                const pageInfo = dtPublicPd.page.info();
                const pageInfoElm = $('#dtPageInfo-publicPesertaDidik');
                const selectPageElm = $('#selectPage-publicPesertaDidik');
                const btnPrevious = $('#btnPreviousDt-publicPesertaDidik');
                const btnNext = $('#btnNextDt-publicPesertaDidik');
                const allHalamanElm = $('#dtPageInfo-allHalaman');

                const total = parseInt(pageInfo.recordsTotal);
                const filter = parseInt(pageInfo.recordsDisplay);
                const totalPage = parseInt(pageInfo.pages);
                const currentPage = parseInt(pageInfo.page) + 1;
                const startPage = filter == 0 ? 0 : parseInt(pageInfo.start) + 1;
                const endPage = parseInt(pageInfo.end);

                let text = startPage + ' - ' + endPage + ' dari ' + filter + ' entri';
                if (total !== filter) {
                    text += ' (disaring dari ' + total + ' entri keseluruhan)';
                }
                pageInfoElm.text(text);

                if (currentPage == 1) btnPrevious.prop('disabled', true);
                else btnPrevious.prop('disabled', false);

                if (currentPage == totalPage || totalPage == 0) btnNext.prop('disabled', true);
                else btnNext.prop('disabled', false);

                selectPageElm.html('');
                for (let index = 0; index < totalPage; index++) {
                    const selected = index + 1 == currentPage ? 'selected' : '';
                    selectPageElm.append(`<option value="${index}" ${selected}>${index+1}</option>`)
                }
                allHalamanElm.text('dari ' + totalPage);
            });

            $('#selectPage-publicPesertaDidik').on('change', e => dtPublicPd.page(parseInt(e.target.value)).draw('page'));
            $('#btnPreviousDt-publicPesertaDidik').on('click', () => dtPublicPd.page('previous').draw('page'));
            $('#btnNextDt-publicPesertaDidik').on('click', () => dtPublicPd.page('next').draw('page'));
            $('#pageLenghtDt-publicPesertaDidik').on('change', e => dtPublicPd.page.len(e.target.value).draw('page'));
            $('#searchDt-publicPesertaDidik').on('input', e => dtPublicPd.search(e.target.value).draw());
            $('#btnReloadDt-publicPesertaDidik').on('click', function() {
                const btn = $(this);
                btn.prop('disabled', true).children("i").addClass("fa-spin");
                dtPublicPd.ajax
                    .reload(null, false)
                    .on("draw", () => btn.prop('disabled', false).children("i").removeClass("fa-spin"));
            });

            $('#btnFilterDt-publicPesertaDidik').click('click', () => $('#offcanvas-filterPd').offcanvas('toggle'));
            $('#selectDt-publicPesertaDidik').on('select2:select', function() {
                console.log($(this).val());
                dtPublicPd.column(7).search($(this).val()).draw('page');
            });

            // === FLYER ===
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
                        url: '/webService/v1/flyer/prestasi/generate',
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
                        url: '/webService/v1/flyer/duka/generate',
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
                    url: '/webService/v1/flyer/info/generate',
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
            // === END FLYER ===
        });
    </script>
    <!-- End Main Script -->
</body>

</html>