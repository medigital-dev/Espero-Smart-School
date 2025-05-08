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
    <link rel="stylesheet" href="/plugins/datatables-fixedcolumns/css/fixedColumns.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="/plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="/plugins/select2/css/select2.css">
    <link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.css">
    <link rel="stylesheet" href="/plugins/bootstrap4-offcanvas/offcanvas-bs4.css">
    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.css">
    <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css">
    <link rel="stylesheet" href="/assets/css/adminlte.min.css">
    <link rel="stylesheet" href="/assets/css/global.css">
    <style>
    </style>
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <img src="/assets/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <img src="/assets/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <img src="/assets/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="<?= base_url(); ?>" class="brand-link elevation-4 text-center">
                <img src="<?= base_url('/assets/img/brands/logo2.png'); ?>" alt="ESS Logo" class="brand-image">
                <span class="brand-text font-weight-light">
                    EsperoSmartSchool
                </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/assets/img/brands/meDigital-dev.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Muhammad Said LG</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search Menu" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?= base_url('data/peserta-didik'); ?>" class="nav-link <?= $sidebar == 'peserta-didik' ? 'active' : ''; ?>">
                                <i class="fas fa-user-graduate nav-icon"></i>
                                <p>Peserta Didik</p>
                            </a>
                        </li>
                        <li class="nav-item <?= $sidebar == 'buku-induk-pd' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $sidebar == 'buku-induk-pd' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Buku Induk
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('buku-induk/pd'); ?>" class="nav-link <?= $sidebar == 'buku-induk-pd' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Peserta Didik</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('buku-induk/guru'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Guru</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('buku-induk/staff'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Staff</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('data/rombel'); ?>" class="nav-link <?= $sidebar == 'rombel' ? 'active' : ''; ?>">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Rombongan Belajar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('pengaturan/dapodik'); ?>" class="nav-link <?= $sidebar == 'dapodik' ? 'active' : ''; ?>">
                                <i class="fas fa-sync-alt nav-icon"></i>
                                <p>Koneksi Dapodik</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><?= $page; ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Dashboard</a></li>
                                <?php foreach ($breadcrumb as $uri): ?>
                                    <li class="breadcrumb-item"><?= $uri; ?></li>
                                <?php endforeach; ?>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <?= $this->renderSection('content'); ?>
                </div>
            </section>
        </div>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <a href="https://adminlte.io">AdminLTE.io</a>
            </div>
            <strong>&copy; 2024 | <a href="//muhsaidlg.my.id" class="text-decoration-none text-muted" target="_blank"> meDigital-dev</a>
        </footer>

        <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>
    <script src="/plugins/jquery/jquery.min.js"></script>
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/plugins/moment/moment-with-locales.js"></script>
    <script src="/plugins/bootstrap4-offcanvas/offcanvas-bs4.js"></script>
    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-fixedcolumns/js/dataTables.fixedColumns.min.js"></script>
    <script src="/plugins/datatables-fixedcolumns/js/fixedColumns.bootstrap4.min.js"></script>
    <script src="/plugins/toastr/toastr.min.js"></script>
    <script src="/plugins/sweetalert2/sweetalert2.js"></script>
    <script src="/plugins/select2/js/select2.full.js"></script>
    <script src="/plugins/select2-searchInputPlaceholder/select2-searchInputPlaceholder.js"></script>
    <script src="/plugins/bs-custom-file-input/bs-custom-file-input.js"></script>
    <script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.js"></script>
    <script src="/plugins/inputmask/jquery.inputmask.js"></script>
    <script src="/plugins/fetchData/fetchData.js"></script>
    <script src="/assets/js/adminlte.min.js"></script>
    <script src="/assets/js/functions.js"></script>
    <script src="/assets/js/global.js"></script>
    <!-- functions -->
    <script>
        let selectedRows = [];

        function checkRowDt() {
            $(".dtCheckbox").on("change", function() {
                let id = $(this).prop('id');
                if ($(this).is(':checked')) {
                    if (!selectedRows.includes(id)) {
                        selectedRows.push(id);
                    }
                } else {
                    selectedRows = selectedRows.filter(item => item !== id);
                }
                stateBtnCheckAll();
            });
        }

        function stateBtnCheckAll() {
            const countCheckbox = $(".dtCheckbox").length;
            const countCheckboxChecked = $(".dtCheckbox:checked").length;
            if (countCheckbox == countCheckboxChecked)
                $("#checkAllRow").prop("checked", true).prop("indeterminate", false);
            else if (countCheckboxChecked == 0)
                $("#checkAllRow").prop("checked", false).prop("indeterminate", false);
            else $("#checkAllRow").prop("indeterminate", true);
        }
    </script>
    <!-- end functions -->

    <!-- toastr config -->
    <script>
        $(document).ready(function() {
            $(".select2-getRombel").select2({
                placeholder: "Pilih rombel...",
                searchInputPlaceholder: "Cari Rombel..",
                theme: "bootstrap4",
                ajax: {
                    url: "/api/v0/rombel/get",
                    method: "GET",
                    dataType: "json",
                    data: function(params) {
                        return {
                            key: params.term,
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.nama,
                                    tingkat: item.tingkat,
                                    // wali: item.wali,
                                    // semester: item.semester,=
                                };
                            }),
                        };
                    },
                    cache: true,
                    error: function(jqXHR, status, error) {
                        return {
                            results: [],
                        };
                    },
                },
                templateResult: (option) => {
                    if (!option.id) {
                        return option.text;
                    }

                    var $option = $(
                        "<div>" +
                        "<h6 class='m-0'>" +
                        option.text +
                        "</h6>" +
                        "<p class='small m-0'>Tingkat: " +
                        option.tingkat +
                        "</p>" +
                        "</div>"
                    );
                    return $option;
                },
                templateSelection: (option) => {
                    if (!option.id) {
                        return option.text;
                    }
                    var $selection = $("<span>" + option.text + "</span>");
                    return $selection;
                },
            });

            $('.select2-getReferensi').each(function() {
                const $select = $(this);
                $(this).select2({
                    placeholder: $select.data('placeholder') || "Pilih referensi...",
                    searchInputPlaceholder: "Cari..",
                    theme: "bootstrap4",
                    ajax: {
                        url: "/api/v0/referensi/" + $select.data('referensi'),
                        method: "GET",
                        dataType: "json",
                        data: function(params) {
                            return {
                                key: params.term,
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        id: item.id,
                                        text: item.nama,
                                    };
                                }),
                            };
                        },
                        cache: true,
                        error: function(jqXHR, status, error) {
                            return {
                                results: [],
                            };
                        },
                    },
                    templateResult: function(option) {
                        if (!option.id) return option.text;
                        return $("<div><h6 class='m-0'>" + option.text + "</h6></div>");
                    },
                    templateSelection: function(option) {
                        if (!option.id) return option.text;
                        return $("<span>" + option.text + "</span>");
                    },
                });
            });
        });
    </script>
    <!-- end toastr config -->
    <!-- Global Script -->
    <script>
        $(document).ready(function() {
            bsCustomFileInput.init();

            $('#btnReloadTable').on('click', function() {
                $(this).prop('disabled', true).children('i').addClass('fa-spin');
                $('.table').DataTable().ajax.reload(null, false).on('draw', () => $(this).prop('disabled', false).children('i').removeClass('fa-spin'));
            });

            $('#checkAllRow').on('click', function() {
                const isChecked = $(this).is(':checked');
                $('.dtCheckbox').each(function() {
                    const id = $(this).prop('id');
                    $(this).prop('checked', isChecked);
                    if ($(this).is(':checked')) {
                        if (!selectedRows.includes(id)) {
                            selectedRows.push(id);
                        }
                    } else {
                        selectedRows = selectedRows.filter(item => item !== id);
                    }
                })

            });
        })
    </script>
    <!-- End Global Script -->
    <script>
        $(document).ready(function() {
            const dtAdminBukuIndukPd = $('#dtAdmin-bukuIndukPd').DataTable({
                dom: 't',
                pageLength: 5,
                processing: true,
                serverSide: true,
                fixedColumns: true,
                scrollX: true,
                order: [],
                drawCallback: function() {
                    $(".dtCheckbox").each(function() {
                        let id = $(this).prop('id');
                        if (selectedRows.includes(id)) {
                            $(this).prop('checked', true);
                        }
                    });

                    stateBtnCheckAll();
                },
                ajax: {
                    method: "POST",
                    url: "/api/v0/datatables/bukuInduk/pd",
                    data: (d) => {
                        d.status_pd = $('[name="radioDt-statusPd"]:checked').val();
                        d.kelas = $('#selectDt-rombelPd').val();
                        d.tingkat = $('#selectDt-tingkatRombelPd').val();
                        d.nama = $('#inputDt-namaPd').val();
                        d.nipd = $('#inputDt-nisPd').val();
                        d.nisn = $('#inputDt-nisnPd').val();
                        d.nik = $('#inputDt-nikPd').val();
                        d.agama = $('#selectDt-agamaPd').val();
                        d.ayah = $('#inputDt-namaAyahPd').val();
                        d.ibu_kandung = $('#inputDt-namaIbuPd').val();
                        d.jk = $('[name="radioDt-jkPd"]:checked').val();
                        d.tempat_lahir = $('#inputDt-tempatLahirPd').val();
                        d.tanggal_lahir_lengkap = $('#inputDt-tanggalLahirLengkapPd').val();
                        d.tanggal_lahir = $('#inputDt-tanggalLahirPd').val();
                        d.bulan_lahir = $('#inputDt-bulanLahirPd').val();
                        d.tahun_lahir = $('#inputDt-tahunLahirPd').val();
                        d.usia_awal = $('#inputDt-usiaPdAwal').val();
                        d.usia_akhir = $('#inputDt-usiaPdAkhir').val();
                        d.dusun = $('#inputDt-dusunPd').val();
                        d.desa = $('#inputDt-desaPd').val();
                        d.kecamatan = $('#inputDt-kecamatanPd').val();
                        d.jenis_mutasi = $('#selectDt-jenisMutasiPd').val();
                        d.jenis_registrasi = $('#selectDt-jenisRegistrasiPd').val();
                        d.tahun_registrasi = $('#inputDt-tahunRegistrasiPd').val();
                    }
                },
                language: {
                    url: "/plugins/datatables/id.json",
                },
                columns: [{
                        data: "peserta_didik_id",
                        className: "text-center",
                        orderable: false,
                        render: (data) => {
                            return `<div class="custom-control custom-checkbox">
                                        <input class="custom-control-input dtCheckbox" type="checkbox" id="check_${data}" value="${data}">
                                        <label for="check_${data}" class="custom-control-label"></label>
                                    </div>`;
                        }
                    },
                    {
                        data: "kelas",
                        className: 'text-center',
                        orderable: false,
                        render: (data, type, rows, meta) => {
                            if (data !== null)
                                return `<span class="badge bg-success">${data}</span>`;
                            else {
                                return `<span class="badge bg-danger"><i class="fas fa-minus-circle"></i></span>`;
                            }
                        }
                    },
                    {
                        data: "nama",
                        render: (data) => {
                            return `<a type="button" href="#">${data}</a>`;
                        }
                    },
                    {
                        data: "nipd",
                        className: "text-lg-center",
                    },
                    {
                        data: "nisn",
                        orderable: false,
                        className: "text-lg-center",
                    },
                    {
                        data: "nik",
                        orderable: false,
                        className: "text-lg-center",
                    },
                    {
                        data: "jenis_kelamin",
                        orderable: false,
                        className: 'text-lg-center'
                    },
                    {
                        data: "tempat_lahir",
                        orderable: false,
                    },
                    {
                        data: "tanggal_lahir",
                        orderable: false,
                        className: 'text-lg-center'
                    },
                    {
                        data: "agama",
                        orderable: false,
                        className: 'text-lg-center'
                    },
                    {
                        data: "peserta_didik_id",
                        orderable: false,
                        render: (data, type, rows, meta) => {
                            if (rows.alamat_jalan !== null)
                                return `${rows.dusun} ${rows.rt}/${rows.rw}, ${rows.desa}, ${rows.kecamatan}`;
                            else return '';
                        }
                    },
                    {
                        data: "hp",
                        orderable: false,
                    },
                    {
                        data: "ayah",
                        orderable: false,
                    },
                    {
                        data: "ibu",
                        orderable: false,
                    },
                    {
                        data: "jenis_registrasi",
                        orderable: false,
                    },
                    {
                        data: "tahun_registrasi",
                        orderable: false,
                    },
                    {
                        data: "jenis_mutasi",
                        orderable: false,
                    },
                    {
                        data: "tanggal_mutasi",
                        orderable: false,
                    },
                ],
            }).on('draw', function() {
                const pageInfo = dtAdminBukuIndukPd.page.info();
                const pageInfoElm = $('#dtPageInfo-bukuInduk');
                const selectPageElm = $('#selectPage-bukuInduk');
                const btnPrevious = $('.btnPreviousDt-bukuInduk');
                const btnNext = $('.btnNextDt-bukuInduk');
                const currentPageElm = $('.text-currentPage');
                const totalHalaman = $('.text-totalPage');

                const total = parseInt(pageInfo.recordsTotal);
                const filter = parseInt(pageInfo.recordsDisplay);
                const totalPage = parseInt(pageInfo.pages);
                const currentPage = parseInt(pageInfo.page) + 1;
                const startPage = filter == 0 ? 0 : parseInt(pageInfo.start) + 1;
                const endPage = parseInt(pageInfo.end);

                currentPageElm.val(currentPage).prop('max', totalPage);

                let text = startPage + ' - ' + endPage + ' dari ' + filter + ' entri';
                if (total !== filter) {
                    text += ' (disaring dari ' + total + ' entri keseluruhan';
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
                totalHalaman.text('/' + totalPage);

                checkRowDt();
                // restoreCheck();
            });

            let debounceTimer;
            $('#selectPage-bukuInduk').on('change', e => dtAdminBukuIndukPd.page(parseInt(e.target.value)).draw('page'));
            $('.btnPreviousDt-bukuInduk').on('click', () => dtAdminBukuIndukPd.page('previous').draw('page'));
            $('.btnNextDt-bukuInduk').on('click', () => dtAdminBukuIndukPd.page('next').draw('page'));
            $('#pageLenghtDt-bukuInduk').on('change', e => dtAdminBukuIndukPd.page.len(e.target.value).draw('page'));
            $('#searchDt-bukuInduk').on('input', e => {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(() => {
                    dtAdminBukuIndukPd.search(e.target.value).draw();
                }, 300);
            });
            $('#inputDtPage-bukuInduk').on('input', e => dtAdminBukuIndukPd.page(((parseInt(e.target.value) - 1))).draw('page'));

            // filter DT Peserta Didik
            $('#inputDt-tanggalLahirLengkapPd').datetimepicker({
                format: 'L',
                locale: 'id'
            });
            $('#formDt-filterPd').on('change input', 'input,select,checkbox,radio', () => {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(() => {
                    dtAdminBukuIndukPd.ajax.reload();
                }, 300);
            });
            $('#btnReset-filterPd').on('click', () => {
                $('#formDt-filterPd').trigger('reset');
                $('#formDt-filterPd select').val('').trigger('change');
                dtAdminBukuIndukPd.ajax.reload()
            });

            const tabelKoneksiDapodik = $('#tabelKoneksiDapodik').DataTable({
                dom: 't',
                processing: true,
                pagingType: "simple",
                responsive: true,
                fixedHeader: true,
                ordering: false,
                ajax: {
                    method: "POST",
                    url: "/api/v0/dapodik/getTable",
                    dataSrc: "",
                },
                language: {
                    url: "/plugins/datatables/id.json",
                },
                columns: [{
                        data: "checkbox",
                        className: "text-center",
                    },
                    {
                        data: "nama",
                    },
                    {
                        data: "url",
                    },
                    {
                        data: "npsn",
                        className: "text-center",
                    },
                    {
                        data: "token",
                        className: 'text-center'
                    },
                    {
                        data: "status",
                        className: 'text-center'
                    },
                    {
                        data: "koneksi",
                        className: 'text-center'
                    },
                ],
            });

            $('#btnRun-ImportDapodik').on('click', async function() {
                const inputElm = $('#inputFile');
                const file = inputElm.prop('files')[0];
                const btn = $(this);

                let data = new FormData();
                data.append('fileUpload', file);
                const result = await fetchData({
                    url: '/api/v0/dapodik/import/pd',
                    data: data,
                    method: 'POST',
                    button: btn,
                });
                if (!result) return;
                console.log(result.result.error);
                inputElm.val('').trigger('change');
                $('#modalImportDapodik').modal('hide');
                toast(result.message);
                dtAdminBukuIndukPd.ajax.reload();
            });

            tabelKoneksiDapodik.on('draw', function() {
                $('.dtCheckbox').change(function() {
                    const countCheckbox = $(".dtCheckbox").length;
                    const countCheckboxChecked = $(".dtCheckbox:checked").length;
                    if (countCheckbox == countCheckboxChecked)
                        $("#checkAllRow").prop("checked", true).prop("indeterminate", false);
                    else if (countCheckboxChecked == 0)
                        $("#checkAllRow").prop("checked", false).prop("indeterminate", false);
                    else $("#checkAllRow").prop("indeterminate", true);
                });

                $('.btnRiwayatTestKoneksiDapodik').on('click', function() {
                    const id = $(this).data('id');
                    const modal = $('#modalRiwayatTestKoneksiDapodik');
                    modal.modal('show');
                    $.post('/api/v0/dapodik/riwayat-test/get', {
                        id: id
                    }, r => {
                        modal.find('.modal-body').html(r);
                        $('#tabelRiwayatTestKoneksiDapodik').DataTable({
                            lengthMenu: [
                                [5, 10, 25, 50, -1],
                                [5, 10, 25, 50, 'Semua']
                            ],
                            ordering: false,
                            pagingType: "simple",
                            language: {
                                url: "/plugins/datatables/id.json",
                            },
                        });
                    }).fail(err => errorHandle(err));
                });
            }).on('xhr', function() {
                $('#checkAllRow').prop('checked', false).prop('indeterminate', false);
            });

            $('#btnSimpanFormKoneksiDapodik').on('click', function() {
                const btn = $(this);
                const form = $('#formKoneksiDapodik');
                const id = $('#idKoneksi');
                const nama = $('#namaProfil');
                const url = $('#urlProfil');
                const port = $('#portUrl');
                const npsn = $('#npsnProfil')
                const token = $('#tokenProfil')
                const check = validationElm([nama, url, port, npsn, token], ['', '0']);

                if (!check) return;
                btn.html('<i class="fas fa-spin fa-spinner"></i>').prop('disabled', true);

                $.post('/api/v0/dapodik/set', {
                    id: id.val(),
                    set: {
                        nama: nama.val(),
                        url: url.val(),
                        port: port.val(),
                        npsn: npsn.val(),
                        token: token.val(),
                    }
                }, r => {
                    toast(r.message, 'success');
                    tabelKoneksiDapodik.ajax.reload(null, false);
                    btn.text('Simpan').prop('disabled', false);
                    form.trigger('reset');
                    $('#modalFormKoneksiDapodik').modal('hide');
                    $('.modal-backdrop').remove();
                }).fail(err => {
                    errorHandle(err);
                    btn.text('Simpan').prop('disabled', false)
                });
            });

            $('#btnEditKoneksiDapodik').click(function() {
                const btn = $(this);
                const checked = $('.dtCheckbox:checked');
                if (checked.length !== 1) {
                    toast('Pilih satu baris data yang akan dilakukan perubahan.');
                    return;
                }
                $.post('/api/v0/dapodik/get', {
                    id: checked.val()
                }, r => {
                    $('#idKoneksi').val(r.id);
                    $('#namaProfil').val(r.nama);
                    $('#urlProfil').val(r.url);
                    $('#portUrl').val(r.port);
                    $('#npsnProfil').val(r.npsn);
                    $('#tokenProfil').val(r.token);
                    $('#modalFormKoneksiDapodik').modal('show');
                }).fail(err => errorHandle(err));
            });

            $('#modalFormKoneksiDapodik').on('hide.bs.modal', () => $('#formKoneksiDapodik').trigger('reset'));
            $('#modalRiwayatTestKoneksiDapodik').on('hide.bs.modal', function() {
                $(this).find('.modal-body').html('<div class="d-flex justify-content-center">' +
                    '<div class="spinner-border" role="status">' +
                    '<span class="sr-only">Loading...</span>' +
                    '</div></div>');
            });

            $('#btnHapusKoneksiDapodik').on('click', function() {
                const checked = $('.dtCheckbox:checked');
                let dataId = [];
                if (checked.length == 0) {
                    toast('Pilih satu atau beberapa baris data yang akan dihapus.');
                    return;
                }
                checked.each(function() {
                    dataId.push($(this).val());
                })
                Swal.fire({
                    icon: "warning",
                    title: "Hapus?",
                    text: "Data koneksi dapodik akan dihapus permanen.",
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Ya, Hapus",
                    cancelButtonText: "Batal",
                    customClass: {
                        confirmButton: "bg-danger",
                    },
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        return $.post(
                            "/api/v0/dapodik/delete", {
                                ids: dataId,
                            },
                            (r) => {
                                return r;
                            }
                        ).fail((err) => errorHandle(err));
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        toast(result.value.message);
                        tabelKoneksiDapodik.ajax.reload(null, false);
                    }
                });
            });

            $('#btnAktifkanKoneksiDapodik').on('click', function() {
                const checked = $('.dtCheckbox:checked');
                if (checked.length != 1) {
                    toast('Pilih satu baris data yang akan diaktifkan.');
                    return;
                }
                const id = checked.val();
                Swal.fire({
                    icon: "warning",
                    title: "Aktifkan?",
                    text: "Data koneksi dapodik akan diaktifkan.",
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Ya, Aktifkan",
                    cancelButtonText: "Batal",
                    customClass: {
                        confirmButton: "bg-success",
                    },
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        return $.post(
                            "/api/v0/dapodik/setAktif", {
                                id: id,
                            },
                            (r) => {
                                return r;
                            }
                        ).fail((err) => errorHandle(err));
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        toast(result.value.message);
                        tabelKoneksiDapodik.ajax.reload(null, false);
                    }
                });
            });

            $('#cariTabelKoneksiDapodik').on('input', function() {
                const key = $(this).val();
                tabelKoneksiDapodik.search(key).draw(false);
            })

            $('#btnTestKoneksiDapodik').on('click', function() {
                const btn = $(this);
                const checked = $('.dtCheckbox:checked');
                if (checked.length != 1) {
                    toast('Pilih satu baris data yang akan diaktifkan.');
                    return;
                }
                btn.html('<i class="fas fa-spinner fa-spin fa-fw"></i>').prop('disabled', true);
                $('#btnAktifkanKoneksiDapodik').prop('disabled', true);

                $.post('/api/v0/dapodik/test', {
                    id: checked.first().val()
                }, r => {
                    Swal.fire('Koneksi Berhasil', 'Koneksi ke Aplikasi Dapodik berhasil. <br><strong>(' + r.npsn + ') ' + r.nama + '</strong>', 'success');
                }).fail(err => {
                    errorHandle(err);
                }).always(() => {
                    tabelKoneksiDapodik.ajax.reload(null, false);
                    btn.html('<i class="fas fa-exchange-alt fa-fw"></i>').prop('disabled', false);
                    $('#btnAktifkanKoneksiDapodik').prop('disabled', false);
                });
            });

            const tabelPesertaDidikBaru = $('#tabelPesertaDidikBaru').DataTable({
                dom: 't',
                processing: true,
                pagingType: "simple",
                responsive: true,
                fixedHeader: true,
                ordering: false,
                ajax: {
                    method: "POST",
                    url: "/api/v0/peserta-didik/baru/getTable",
                    dataSrc: "",
                },
                language: {
                    url: "/plugins/datatables/id.json",
                },
                columns: [{
                        data: 'checkbox',
                        className: 'text-center',
                    }, {
                        data: "nama",
                    },
                    {
                        data: "nisn",
                        className: 'text-center',
                    },
                    {
                        data: "jk",
                        className: "text-center",
                    },
                    {
                        data: "tempatLahir",
                    },
                    {
                        data: "tanggalLahir",
                        className: 'text-center'
                    },
                    {
                        data: "nik",
                        className: 'text-center'
                    },
                    {
                        data: "agama",
                    },
                ],
            });

            $('#btnSinkronPdDapodik').on('click', function() {
                const btn = $(this);
                btn.prop('disabled', true).children('i').addClass('fa-spin');

                Swal.fire({
                    icon: "warning",
                    title: "Sinkron Dapodik?",
                    text: "Data peserta didik akan disinkronkan dengan data di aplikasi Dapodik.",
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Ya, Sinkron",
                    cancelButtonText: "Batal",
                    customClass: {
                        confirmButton: "bg-success",
                    },
                    showLoaderOnConfirm: true,
                    allowOutsideClick: () => !Swal.isLoading(),
                    preConfirm: () => {
                        return $.post('/api/v0/dapodik/sync/pd')
                            .then(response => response)
                            .fail(err => {
                                return Promise.reject(err.responseJSON ? err.responseJSON.message : "Terjadi kesalahan pada sinkronisasi");
                            })
                            .always(() => btn.prop('disabled', false).children('i').removeClass('fa-spin'));
                    },
                }).then((result) => {
                    if (result.isConfirmed && result.value) {
                        console.log(result.value.errors);
                        toast(result.value.message);
                        dtAdminBukuIndukPd.ajax.reload(null, false);
                    }
                }).catch((errorMessage) => {
                    errorHandle(errorMessage);
                    Swal.close();
                }).finally(() => {
                    btn.prop('disabled', false).children('i').removeClass('fa-spin');
                });
            });

            // Unduh DT Peserta Didik
            $('#btnUnduhExcel-bukuIndukPd').on('click', async function() {
                const btnElm = $(this);

                const resp = await fetchData({
                    url: '/api/v0/buku-induk/export/' + 'pesertaDidik',
                    method: 'POST',
                    data: {
                        keyword: $('#searchDt-publicPesertaDidik').val(),
                        status_pd: $('[name="radioDt-statusPd"]:checked').val(),
                        kelas: $('#selectDt-rombelPd').val(),
                        tingkat: $('#selectDt-tingkatRombelPd').val(),
                        nama: $('#inputDt-namaPd').val(),
                        nipd: $('#inputDt-nisPd').val(),
                        nisn: $('#inputDt-nisnPd').val(),
                        nik: $('#inputDt-nikPd').val(),
                        ayah: $('#inputDt-namaAyahPd').val(),
                        ibu_kandung: $('#inputDt-namaIbuPd').val(),
                        jk: $('[name="radioDt-jkPd"]:checked').val(),
                        tempat_lahir: $('#inputDt-tempatLahirPd').val(),
                        tanggal_lahir_lengkap: $('#inputDt-tanggalLahirLengkapPd').val(),
                        tanggal_lahir: $('#inputDt-tanggalLahirPd').val(),
                        bulan_lahir: $('#inputDt-bulanLahirPd').val(),
                        tahun_lahir: $('#inputDt-tahunLahirPd').val(),
                        usia_awal: $('#inputDt-usiaPdAwal').val(),
                        usia_akhir: $('#inputDt-usiaPdAkhir').val(),
                        dusun: $('#inputDt-dusunPd').val(),
                        desa: $('#inputDt-desaPd').val(),
                        kecamatan: $('#inputDt-kecamatanPd').val(),
                        jenis_mutasi: $('#selectDt-jenisMutasiPd').val(),
                        jenis_registrasi: $('#selectDt-jenisRegistrasiPd').val(),
                        tahun_registrasi: $('#inputDt-tahunRegistrasiPd').val(),
                    },
                    button: btnElm
                });

                if (!resp.status) return;
                toast('Silahkan unduh file excel <a href="/' + resp.data.path + '" target="_blank" class="text-bold">di sini</a>', 'success', 0);
            });
        });
    </script>
</body>

</html>