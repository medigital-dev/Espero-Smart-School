<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-fixedcolumns/css/fixedColumns.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/toastr/toastr.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/sweetalert2/sweetalert2.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/select2/css/select2.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/select2-bootstrap4-theme/select2-bootstrap4.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/bootstrap4-offcanvas/offcanvas-bs4.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/icheck-bootstrap/icheck-bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/fancyapps/fancybox.css'); ?>">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="<?= base_url('assets/css/adminlte.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/global.css'); ?>">
    <style>
        .fancybox__container {
            z-index: 1800 !important;
        }

        .tab-pane>.overlay-wrapper>.overlay {
            margin-top: -1rem;
            margin-left: -1rem;
            height: calc(100% + 2 * 1rem);
            width: calc(100% + 2 * 1rem);
        }

        .card .overlay,
        .info-box .overlay,
        .overlay-wrapper .overlay,
        .small-box .overlay {
            z-index: 1035;
        }

        .photo-profile {
            width: 30px;
            height: 30px;
            overflow: hidden;
            position: relative;
        }

        .photo-profile img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
        }
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
                                <img src="/assets/img/users/user3.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
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
                                <img src="/assets/img/users/user3.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
                                <img src="/assets/img/users/user3.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
                            <i class="fas fa-envelope fa-fw mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users fa-fw mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file fa-fw mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-list-alt fa-fw mr-2"></i> Log Events
                            <span class="float-right text-muted text-sm">2 new</span>
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
                        <li class="nav-item <?= $sidebar == 'dapodik' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $sidebar == 'dapodik' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                    Pengaturan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item <?= $sidebar == 'dapodik' ? 'menu-is-opening menu-open' : '' ?>">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-database nav-icon"></i>
                                        <p>
                                            Aplikasi Dapodik
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview" style="display: <?= $sidebar == 'dapodik' ? 'block' : 'none'; ?>;">
                                        <li class="nav-item <?= $sidebar == 'dapodik' ? 'menu-is-open' : '' ?>">
                                            <a href="<?= base_url('pengaturan/dapodik/koneksi'); ?>" class="nav-link <?= $sidebar == 'dapodik' ? 'active' : '' ?>">
                                                <i class="fas fa-exchange-alt nav-icon fa-fw"></i>
                                                <p>Koneksi</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="fas fa-sync-alt nav-icon fa-fw"></i>
                                                <p>Sinkron</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="<?= base_url('pengaturan/dapodik'); ?>" class="nav-link <?= $sidebar == 'dapodik' ? 'active' : ''; ?>">
                                <i class="fas fa-sync-alt nav-icon"></i>
                                <p>Koneksi Dapodik</p>
                            </a>
                        </li> -->
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
    <script src="<?= base_url('plugins/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/moment/moment-with-locales.js'); ?>"></script>
    <script src="<?= base_url('plugins/bootstrap4-offcanvas/offcanvas-bs4.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-fixedcolumns/js/dataTables.fixedColumns.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-fixedcolumns/js/fixedColumns.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/toastr/toastr.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/sweetalert2/sweetalert2.js'); ?>"></script>
    <script src="<?= base_url('plugins/select2/js/select2.full.js'); ?>"></script>
    <script src="<?= base_url('plugins/select2-searchInputPlaceholder/select2-searchInputPlaceholder.js'); ?>"></script>
    <script src="<?= base_url('plugins/bs-custom-file-input/bs-custom-file-input.js'); ?>"></script>
    <script src="<?= base_url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.js'); ?>"></script>
    <script src="<?= base_url('plugins/inputmask/jquery.inputmask.js'); ?>"></script>
    <!-- <script src="<?= base_url('plugins/fetchData/fetchData.js'); ?>"></script> -->
    <script src="<?= base_url('plugins/fancyapps/fancybox.umd.js'); ?>"></script>
    <script src="<?= base_url('plugins/chart.js/Chart.bundle.min.js'); ?>"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="<?= base_url('assets/js/adminlte.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/functions.js'); ?>"></script>
    <script src="<?= base_url('assets/js/global.js'); ?>"></script>

    <!-- Global Constanta -->
    <script>
        let selectedRows = [],
            isLoading = false;
    </script>

    <!-- functions -->
    <script>
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
                runSelectedCount();
            });
        }

        function runSelectedCount() {
            const countInfo = $('#dtCountChecked-bukuInduk');
            if (selectedRows.length == 0) countInfo.html('');
            else countInfo.html(`${selectedRows.length} terpilih | `);
        }

        function stateBtnCheckAll() {
            const countCheckbox = $(".dtCheckbox").length;
            const countCheckboxChecked = $(".dtCheckbox:checked").length;
            if (countCheckbox == 0)
                $('#checkAllRow').prop('checked', false).prop('indeterminate', false);
            else if (countCheckboxChecked == 0)
                $("#checkAllRow").prop("checked", false).prop("indeterminate", false);
            else if (countCheckbox == countCheckboxChecked)
                $("#checkAllRow").prop("checked", true).prop("indeterminate", false);
            else $("#checkAllRow").prop("indeterminate", true);
        }

        function validationElm(idElm = [], invalidValue = [], errorMessage = 'Input tidak valid.') {
            let check = [];
            idElm.forEach(function(item) {
                let elm = $('#' + item);
                if (invalidValue.includes(elm.val())) {
                    check.push(elm.val());
                    elm.addClass("is-invalid");
                } else elm.removeClass("is-invalid");
            });
            if (check.length !== 0) {
                toast(errorMessage, "error");
                return false;
            }
            $(".is-invalid").removeClass("is-invalid");
            return true;
        }

        function runTooltip() {
            $('[data-toggle="tooltip"], .btn-tooltip').tooltip({
                html: true,
                trigger: 'hover',
            });
        }

        function runPopover() {
            $('[data-toggle="popover"]').popover({
                html: true,
                trigger: 'hover',
            });
        }

        function runOnlyInt() {
            $(".onlyInt, .intOnly, .int")
                .on("input", function() {
                    const $input = $(this);
                    const inputValue = $input.val();
                    const numericValue = inputValue.replace(/\D/g, "");
                    const useCurrencyFormat = $input.data("currency") === true || $input.data("currency") === "true";
                    $input.siblings("input:hidden").val(numericValue);
                    $input.toggleClass("text-right", useCurrencyFormat);
                    const formattedValue = useCurrencyFormat ? formatNumber(numericValue) : numericValue;
                    $input.val(formattedValue);
                })
                .on("click", function() {
                    $(this).select();
                });
        }

        function runInputMask() {
            $("[data-mask]").inputmask();
        }

        function runSelect2() {
            $("select.select2").select2({
                placeholder: "Pilih...",
                theme: "bootstrap4",
            });
        }

        function runBsDropdownAutoClose() {
            $('[data-autoclose="false"]')
                .siblings(".dropdown-menu")
                .attr("onclick", "event.stopPropagation()");
        }

        function runFancyBox() {
            Fancybox.bind("[data-fancybox]");
        }

        function runBsCustomFileInput() {
            bsCustomFileInput.destroy();
            bsCustomFileInput.init();
        }

        function initJs() {
            runInputMask();
            runOnlyInt();
            runSelect2();
            runTooltip();
            runPopover();
            runBsDropdownAutoClose();
            runBsCustomFileInput();
            runFancyBox();
            runSelectedCount();
        }

        function resetInput(elmInput, elmDatatables = false) {
            $(elmInput).val("").trigger("change");
            if (elmDatatables !== false) $(elmDatatables).DataTable().ajax.reload();
        }

        function tanggal(isoDate, format = "d-m-Y") {
            if (!isoDate) return "";

            const bulanNama = [
                "Januari",
                "Februari",
                "Maret",
                "April",
                "Mei",
                "Juni",
                "Juli",
                "Agustus",
                "September",
                "Oktober",
                "November",
                "Desember",
            ];

            const hariNama = [
                "Minggu",
                "Senin",
                "Selasa",
                "Rabu",
                "Kamis",
                "Jumat",
                "Sabtu",
            ];
            const hariSingkat = ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"];

            let date = new Date(isoDate);
            if (isNaN(date)) {
                if (/^\d{4}-\d{2}-\d{2}$/.test(isoDate)) {
                    date = new Date(isoDate + "T00:00:00");
                } else {
                    date = new Date(isoDate.replace(" ", "T"));
                }
            }
            if (isNaN(date)) return "";

            const day = date.getDate();
            const month = date.getMonth() + 1;
            const year = date.getFullYear();
            const dayIndex = date.getDay();

            const hours = date.getHours();
            const minutes = date.getMinutes();
            const seconds = date.getSeconds();

            const map = {
                d: day,
                dd: String(day).padStart(2, "0"),
                j: day,
                mm: String(month).padStart(2, "0"),
                m: month,
                mmm: bulanNama[month - 1].slice(0, 3),
                mmmm: bulanNama[month - 1],
                Y: year,
                yyyy: year,
                yy: String(year).slice(-2),
                F: bulanNama[month - 1],
                dddd: hariNama[dayIndex],
                ddd: hariSingkat[dayIndex],
                H: hours,
                HH: String(hours).padStart(2, "0"),
                i: minutes,
                ii: String(minutes).padStart(2, "0"),
                s: seconds,
                ss: String(seconds).padStart(2, "0"),
            };

            return format.replace(
                /dddd|ddd|mmmm|mmm|mm|m|dd|d|j|yyyy|yy|Y|F|HH?|ii?|ss?|H|i|s/g,
                (match) => map[match]
            );
        }

        function formatNumber(number) {
            return new Intl.NumberFormat("id-ID", {
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(number);
        }

        function toast(message, type = "info", delay = 5000, position = 'bottom-center') {
            function getPosition(poss) {
                switch (position) {
                    case 'top-left':
                        return 'toast-top-left';
                        break;

                    case 'top-center':
                        return 'toast-top-center';
                        break;

                    case 'top-right':
                        return 'toast-top-right';
                        break;

                    case 'bottom-left':
                        return 'toast-bottom-left';
                        break;

                    case 'bottom-center':
                        return 'toast-bottom-center';
                        break;

                    case 'bottom-right':
                        return 'toast-bottom-right';
                        break;

                    default:
                        return 'toast-bottom-center';
                        break;
                }
            }

            toastr.options = {
                timeOut: delay,
                progressBar: true,
                newestOnTop: true,
                positionClass: getPosition(position),
                extendedTimeOut: delay == 0 ? 0 : 2000,
                closeButton: delay == 0 ? true : false,
            };

            switch (type) {
                case "info":
                    toastr.info(message);
                    break;

                case "success":
                    toastr.success(message);
                    break;

                case "warning":
                    toastr.warning(message);
                    break;

                case "error":
                    toastr.error(message);
                    break;

                default:
                    toastr.info(message);
                    break;
            }
        }

        function errorHandle(err) {
            if (err.responseJSON && err.responseJSON.message) {
                toast(err.responseJSON.message, "error");
            } else if (err.code === 400) {
                toast(err.messages, "error");
            } else if (err.code === 500 || err.status === 400) {
                toast(
                    err.responseJSON ? err.responseJSON.messages.error : "Error server",
                    "error",
                    0
                );
            } else {
                toast("An error occurred", "error");
            }
        }

        /**
         * Mengambil data dari server dengan AJAX.
         * Bisa menerima parameter sebagai objek konfigurasi atau individual parameter.
         *
         * @param {string|Object} urlOrConfig - URL request atau objek konfigurasi.
         * @param {Object} [data={}] - Data yang dikirim (opsional, abaikan jika pakai objek konfigurasi).
         * @param {string} [dataType="json"] - Tipe data yang dikembalikan (opsional, abaikan jika pakai objek konfigurasi).
         * @param {string} [method="GET"] - Metode request (opsional, abaikan jika pakai objek konfigurasi).
         * @returns {Promise<any>} - Promise yang mengembalikan hasil response AJAX.
         * @throws {Error} - Jika terjadi error selama request.
         */
        async function fetchData(urlOrConfig, ...restParams) {
            let config;
            if (typeof urlOrConfig === "object") {
                if (restParams.length > 0) {
                    throw new Error(
                        "fetchData() tidak boleh memiliki parameter tambahan jika menggunakan objek konfigurasi."
                    );
                }

                config = {
                    url: urlOrConfig.url,
                    data: urlOrConfig.data || {},
                    dataType: urlOrConfig.dataType || "json",
                    method: urlOrConfig.method || "GET",
                    button: urlOrConfig.button || null,
                    headers: urlOrConfig.headers || null,
                };
            } else {
                config = {
                    url: urlOrConfig,
                    data: restParams[0] || {},
                    method: restParams[1] || "GET",
                    dataType: restParams[2] || "json",
                };
            }

            const btnText = config.button ? config.button.children("span").text() : null;
            const btnIcon = config.button ? config.button.children("i") : null;
            const iconClass = btnIcon ? btnIcon.prop("class") : null;

            if (config.button) {
                config.button.prop("disabled", true);

                if (btnIcon) {
                    config.button
                        .children("i")
                        .removeClass()
                        .addClass("fas fa-pulse fa-spinner mr-1");
                }
            }

            try {
                let isFormData = config.data instanceof FormData;

                let options = {
                    url: config.url,
                    method: config.method,
                    dataType: config.dataType,
                    cache: false,
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                    },
                };

                if (isFormData) {
                    options.processData = false;
                    options.contentType = false;
                    options.enctype = "multipart/form-data";
                    options.data = config.data;
                } else {
                    options.contentType = "application/x-www-form-urlencoded";
                    options.data = $.param(config.data);
                }
                return await $.ajax(options);
            } catch (error) {
                console.log(error);
                errorHandle(error);
                return false;
            } finally {
                if (config.button) {
                    config.button.prop("disabled", false);
                    if (btnIcon)
                        config.button.children("i").removeClass().addClass(iconClass);
                }
            }
        }
    </script>
    <!-- end functions -->

    <!-- select2 custom -->
    <script>
        $(document).ready(function() {
            $(".select2-getPd").each(function() {
                const $select = $(this);
                const status = $select.data('status');
                $select.select2({
                    placeholder: "Pilih peserta didik...",
                    searchInputPlaceholder: "Cari Nama/NIS/NISN/Kelas...",
                    theme: "bootstrap4",
                    dropdownParent: $select.parents(".modal").length ?
                        $select.parents(".modal").first() : $(document.body),
                    ajax: {
                        url: "/api/v0/buku-induk/peserta-didik/get/" + (status !== undefined ? status : ''),
                        method: "GET",
                        dataType: "json",
                        data: function(params) {
                            return {
                                key: params.term,
                                page: params.page || 1
                            };
                        },
                        processResults: function(data, params) {
                            params.page = params.page || 1;
                            return {
                                results: $.map(data.items, function(item) {
                                    return {
                                        id: item.id,
                                        text: item.text.toUpperCase(),
                                        kelas: item.kelas,
                                        nisn: item.nisn,
                                        nipd: item.nipd
                                    };
                                }),
                                pagination: {
                                    more: data.hasMore
                                }
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
                            "<p class='small m-0'>Kelas: " +
                            option.kelas +
                            "</p>" +
                            "<p class='small m-0'>NIS: " +
                            option.nipd +
                            "</p>" +
                            "<p class='small m-0'>NISN: " +
                            option.nisn +
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
            });

            $(".select2-getRombel").each(function() {
                const $select = $(this);
                $select.select2({
                    placeholder: "Pilih rombel...",
                    searchInputPlaceholder: "Cari Rombel..",
                    theme: "bootstrap4",
                    dropdownParent: $select.parents(".modal").length ?
                        $select.parents(".modal").first() : $(document.body),
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
            });

            $('.select2-getBgColor').each(function() {
                const $select = $(this);
                $select.select2({
                    placeholder: $select.data('placeholder') || "Pilih style...",
                    searchInputPlaceholder: "Cari..",
                    theme: "bootstrap4",
                    dropdownParent: $select.parents(".modal").length ?
                        $select.parents(".modal").first() : $(document.body),
                    ajax: {
                        url: "/api/v0/backgroundColor",
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
                                        id: item.kode,
                                        text: item.nama,
                                        kode: item.kode,
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
                        return $(`<div class="p-2 ${option.kode}">
                        <h6 class='m-0 text-bold'>${option.text}</h6>
                        </div>`);
                    },
                    templateSelection: function(option) {
                        if (!option.id) return option.text;
                        return $(`<span>${option.text}</span>`);
                    },
                });
            });

            $('.select2-getReferensi').each(function() {
                const $select = $(this);
                const modalDialog = $('#modalReferensi');
                $select.select2({
                    placeholder: $select.data('placeholder') || "Pilih referensi...",
                    searchInputPlaceholder: $select.data('tags') == true ? "Cari/Tambah baru..." : 'Cari...',
                    theme: "bootstrap4",
                    dropdownParent: $select.parents(".modal").length ?
                        $select.parents(".modal").first() : $(document.body),
                    ajax: {
                        url: "/api/v0/referensi?type=" + $select.data('referensi'),
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
                                        kode: item.kode,
                                        bgColor: item.bg_color,
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
                        if (option.newTag) return $(`<div class="d-flex justify-content-between align-items-center"><span>${option.text}</span><span class="badge bg-danger" data-toggle="tooltip" title="Tambah Baru">New</span></div>`);
                        return $(`<span>${option.text}</span>`);
                    },
                    templateSelection: function(option) {
                        if (!option.id) return option.text;
                        return $(`<span>${option.text}</span>`);
                    },
                    escapeMarkup: markup => markup,
                    createTag: function(params) {
                        var term = $.trim(params.term);
                        if (term === '') return null;
                        return {
                            id: new Date().getTime(),
                            text: term,
                            newTag: true,
                            type: $select.data('referensi'),
                        }
                    },
                }).on('select2:select', function(e) {
                    let data = e.params.data;
                    if (data.newTag) {
                        modalDialog.modal('show');
                        modalDialog.find('textarea[name="nama"],input[name="kode"]').val(data.text).trigger('change');
                        modalDialog.find('#targetTambahReferensi').val($select.attr('id'));
                        modalDialog.find('#tempId-selectNewTags').val(data.id);
                        modalDialog.find('#typeReferensi').val($select.data('referensi'));
                    }
                });
            });
        });
    </script>
    <!-- end select2 custom -->

    <!-- Global Script -->
    <script>
        $(document).ready(function() {
            initJs();

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
                        if (!selectedRows.includes(id))
                            selectedRows.push(id);
                    } else
                        selectedRows = selectedRows.filter(item => item !== id);
                });
                runSelectedCount();
            });

            $('#btnClearSelected').on('click', function() {
                selectedRows = [];
                const checked = $('.dtCheckbox:checked');
                checked.prop('checked', false);
                stateBtnCheckAll();
                runSelectedCount();
            });

            $('#btnSelectRow').on('click', function() {
                const checkbox = $('.dtCheckbox');
                checkbox.each(function() {
                    const id = $(this).val();
                    if ($(this).is(':checked')) {
                        $(this).prop('checked', false);
                        selectedRows = selectedRows.filter(item => item !== id);
                    } else {
                        $(this).prop('checked', true);
                        if (!selectedRows.includes(id)) {
                            selectedRows.push(id);
                        }
                    }
                });
                stateBtnCheckAll();
                runSelectedCount();
            });
        });
    </script>
    <!-- End Global Script -->
    <script>
        $(document).ready(function() {
            const dtAdminBukuIndukPd = $('#dtAdmin-bukuIndukPd').DataTable({
                dom: 't',
                pageLength: 5,
                processing: true,
                serverSide: true,
                fixedColumns: {
                    leftColumns: 3
                },
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
                        d.ids = selectedRows;
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
                        d.tahun_mutasi = $('#inputDt-tahunMutasiPd').val();
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
                        render: (data, type, rows, meta) => {
                            return `<div class="custom-control custom-checkbox">
                                        <input class="custom-control-input dtCheckbox" type="checkbox" data-nama="${rows.nama}" id="${data}" value="${data}">
                                        <label for="${data}" class="custom-control-label"></label>
                                    </div>`;
                        }
                    },
                    {
                        data: "mutasi_kode",
                        name: 'mutasi.kode',
                        className: 'text-center',
                        orderable: false,
                        render: (data, type, rows) => {
                            const isKosong = data == null && rows.kelas == null;
                            const warna = data ? rows.mutasi_warna : (rows.kelas ? 'bg-success' : 'bg-danger');
                            const text = isKosong ? '<i class="fas fa-minus-circle"></i>' : (data || rows.kelas);
                            const title = isKosong ? '' : (data ? rows.mutasi_nama : rows.kelas);

                            return `<span class="badge ${warna}" data-toggle="tooltip" data-title="${title}">${text}</span>`;
                        }
                    },
                    {
                        data: "nama",
                        name: 'peserta_didik.nama',
                        render: (data, type, rows, meta) => {
                            return `<a type="button" class="text-decoration-none btnRow-detailPd" data-toggle="tooltip" data-title="Detail Peserta Didik" data-id="${rows.peserta_didik_id}">${data}</a>`;
                        }
                    },
                    {
                        data: "nipd",
                        name: 'nipd',
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
                        data: "jk_kode",
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
                        className: 'text-lg-center',
                        render: data => {
                            return tanggal(data, 'dd/mm/Y');
                        }
                    },
                    {
                        data: "agama_str",
                        orderable: false,
                        className: 'text-lg-center'
                    },
                    {
                        data: "peserta_didik_id",
                        orderable: false,
                        render: (data, type, rows, meta) => {
                            return `${rows.dusun ?? ''}`;
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
                        data: "tanggal_registrasi",
                        orderable: false,
                        customClass: 'text-center',
                        render: (data) => {
                            return tanggal(data, 'Y');
                        }
                    },
                    {
                        data: "mutasi_nama",
                        orderable: false,
                    },
                    {
                        data: "mutasi_tanggal",
                        orderable: false,
                        render: data => {
                            return tanggal(data, 'dd/mm/Y');
                        }
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
                totalHalaman.text('/' + totalPage);

                checkRowDt();

                $('.btnRow-detailPd').on('click', async function() {
                    const id = $(this).data('id');
                    const formElm = $('#formData-tabsIdentitas');
                    const offcanvasElm = $('#offcanvasEdit-dataPd');
                    offcanvasElm.offcanvas('show');
                    offcanvasElm.find('.overlay').removeClass('d-none');
                    $('#tabs-profil-tab').tab('show');
                    const respData = await fetchData('/api/v0/buku-induk/peserta-didik/profil/' + id);
                    if (respData) {
                        $('.idPd').attr('data-id', id);
                        $('#detailPd-id').val(id);
                        $('#tabsProfile-nama, .offcanvas-header h5').text(respData.nama);
                        $('#tabsProfile-jk').text(respData.jenis_kelamin);
                        $('#tabsProfile-tempatLahir').text(respData.tempat_lahir);
                        $('#tabsProfile-tanggalLahir').text(tanggal(respData.tanggal_lahir, 'd mmmm Y'));
                        $('#tabsProfile-nisn').text(respData.nisn);
                        $('#tabsProfile-nipd').text(respData.nipd);
                        $('#tabsProfile-nik').text(respData.nik);
                        $('#tabsProfile-ibu').text(respData.ibu);
                        $('#tabsProfile-hp').text(respData.hp);
                        $('#tabsProfile-alamat').text(respData.dusun + ' ' + respData.rt + '/' + respData.rw + ', ' + respData.desa + ', ' + respData.kecamatan);
                        if (respData.jenis_mutasi)
                            $('#tabsProfile-status').text(respData.jenis_mutasi).attr('title', respData.jenis_mutasi).removeClass('bg-success').addClass('bg-secondary');
                        else
                            $('#tabsProfile-status').text(respData.kelas).attr('title', 'Aktif').addClass('bg-success').removeClass('bg-secondary');
                        if (respData.foto_src) {
                            $('#tabsProfile-foto a, .photo-profile a').attr('href', '/' + respData.foto_src);
                            $('#tabsProfile-foto img, .photo-profile img').attr('src', '/' + respData.foto_src);
                        } else {
                            $('#tabsProfile-foto a, .photo-profile a').attr('href', '/assets/img/users/_default.png');
                            $('#tabsProfile-foto img, .photo-profile img').attr('src', '/assets/img/users/_default.png');
                        }
                    }
                    offcanvasElm.find('.overlay').addClass('d-none');
                });
                runTooltip();
            });

            let debounceTimer;
            $('#selectPage-bukuInduk').on('change', e => dtAdminBukuIndukPd.page(parseInt(e.target.value)).draw('page'));
            $('.btnPreviousDt-bukuInduk').on('click', () => dtAdminBukuIndukPd.page('previous').draw('page'));
            $('.btnNextDt-bukuInduk').on('click', () => dtAdminBukuIndukPd.page('next').draw('page'));
            $('#pageLenghtDt-bukuInduk').on('change', e => dtAdminBukuIndukPd.page.len(e.target.value).draw('page'));
            $('#searchDt-bukuInduk').on('input', e => dtAdminBukuIndukPd.search(e.target.value).draw());
            $('#inputDtPage-bukuInduk').on('input', e => dtAdminBukuIndukPd.page(((parseInt(e.target.value) - 1))).draw('page'));

            // filter DT Peserta Didik
            $('.tanggal').datetimepicker({
                format: 'L',
                locale: 'id',
                maxDate: 'now'
            });

            $('.tanggal').on('change.datetimepicker', e => $(e.target).siblings('input:hidden').val(e.date ? e.date.format('YYYY-MM-DD') : ''));

            $('#tabsIdentitas-photoProfil').on('change', function() {
                const prevElm = $('#previewPassfoto');
                if ($(this).val() !== '')
                    prevElm.removeClass('d-none').children('img').attr('src', URL.createObjectURL($(this).prop('files')[0]));
                else
                    prevElm.addClass('d-none').children('img').attr('src', '#');
            });

            $('#formDt-filterPd').on('change input', 'input,select,checkbox,radio', () => {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(() => {
                    dtAdminBukuIndukPd.ajax.reload();
                }, 500);
            });
            $('#btnReset-filterPd').on('click', () => {
                $('#formDt-filterPd').trigger('reset');
                $('#formDt-filterPd select').val('').trigger('change');
                dtAdminBukuIndukPd.ajax.reload()
            });

            $('#tabs-profil-tab').on('click', async function(e) {
                e.preventDefault();
                const id = $(this).attr('data-id');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                $(this).tab('show');
                offcanvasElm.find('.overlay').removeClass('d-none');
                const respData = await fetchData('/api/v0/buku-induk/peserta-didik/profil/' + id);
                if (respData) {
                    $('.idPd').attr('data-id', id);
                    $('#detailPd-id').val(id);
                    $('#tabsProfile-nama, .offcanvas-header h5').text(respData.nama);
                    $('#tabsProfile-jk').text(respData.jenis_kelamin);
                    $('#tabsProfile-tempatLahir').text(respData.tempat_lahir);
                    $('#tabsProfile-tanggalLahir').text(tanggal(respData.tanggal_lahir, 'd mmmm Y'));
                    $('#tabsProfile-nisn').text(respData.nisn);
                    $('#tabsProfile-nipd').text(respData.nipd);
                    $('#tabsProfile-nik').text(respData.nik);
                    $('#tabsProfile-ibu').text(respData.ibu);
                    $('#tabsProfile-hp').text(respData.hp);
                    $('#tabsProfile-alamat').text(respData.dusun + ' ' + respData.rt + '/' + respData.rw + ', ' + respData.desa + ', ' + respData.kecamatan);
                    if (respData.jenis_mutasi)
                        $('#tabsProfile-status').text(respData.jenis_mutasi).attr('title', respData.jenis_mutasi).removeClass('bg-success').addClass('bg-secondary');
                    else
                        $('#tabsProfile-status').text(respData.kelas).attr('title', 'Aktif').addClass('bg-success').removeClass('bg-secondary');
                    if (respData.foto_src) {
                        $('#tabsProfile-foto a, .photo-profile a').attr('href', '/' + respData.foto_src);
                        $('#tabsProfile-foto img, .photo-profile img').attr('src', '/' + respData.foto_src);
                    } else {
                        $('#tabsProfile-foto a, .photo-profile a').attr('href', '/assets/img/users/_default.png');
                        $('#tabsProfile-foto img, .photo-profile img').attr('src', '/assets/img/users/_default.png');
                    }
                }
                offcanvasElm.find('.overlay').addClass('d-none');
            });

            $('#tabs-identitas-tab').on('click', async function(e) {
                e.preventDefault();
                let opt;
                const id = $(this).attr('data-id');
                const formElm = $('#formData-tabsIdentitas');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                $(this).tab('show');
                offcanvasElm.find('.overlay').removeClass('d-none');
                const respData = await fetchData('/api/v0/buku-induk/peserta-didik/identitas/' + id);
                if (respData) {
                    $('#tabsIdentitas-nama').val(respData.nama);
                    opt = new Option(respData.jenis_kelamin_str, respData.jenis_kelamin_id, false, true);
                    $('#tabsIdentitas-jenisKelamin').append(opt);
                    $('#tabsIdentitas-tempatLahir').val(respData.tempat_lahir);
                    $('#tabsIdentitas-tanggalLahir').val(tanggal(respData.tanggal_lahir, 'dd/mm/Y'));
                    $('#tabsIdentitas-tanggalLahirDb').val(respData.tanggal_lahir);
                    $('#tabsIdentitas-nisn').val(respData.nisn);
                    $('#tabsIdentitas-nomorAkte').val(respData.nomor_akte);
                    $('#tabsIdentitas-nomorKk').val(respData.nomor_kk);
                    $('#tabsIdentitas-nik').val(respData.nik);
                    $('#tabsIdentitas-anakKe').val(respData.anak_ke);
                    $('#tabsIdentitas-jumlahSaudara').val(respData.jumlah_saudara);
                    opt = new Option(respData.agama_str, respData.agama_id, false, true);
                    $('#tabsIdentitas-agama').append(opt);
                }
                offcanvasElm.find('.overlay').addClass('d-none');
            });

            $('#tabs-alamat-tab').on('click', async function(e) {
                e.preventDefault();
                const id = $(this).attr('data-id');
                const formElm = $('#formData-tabsIdentitas');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                $(this).tab('show');
                offcanvasElm.find('.overlay').removeClass('d-none');
                const respData = await fetchData('/api/v0/buku-induk/peserta-didik/alamat/' + id);
                if (respData) {
                    $('#tabsAlamat-alamatJalan').val(respData.alamat_jalan);
                    $('#tabsAlamat-rt').val(respData.rt);
                    $('#tabsAlamat-rw').val(respData.rw);
                    $('#tabsAlamat-dusun').val(respData.dusun);
                    $('#tabsAlamat-desa').val(respData.desa);
                    $('#tabsAlamat-kecamatan').val(respData.kecamatan);
                    $('#tabsAlamat-kabupaten').val(respData.kabupaten);
                    $('#tabsAlamat-provinsi').val(respData.provinsi);
                    $('#tabsAlamat-kodePos').val(respData.kode_pos);
                    $('#tabsAlamat-lintang').val(respData.lintang);
                    $('#tabsAlamat-bujur').val(respData.bujur);
                    $('#tabsAlamat-jarakRumah').val(respData.jarak_rumah);
                    $('#tabsAlamat-waktuTempuh').val(respData.waktu_tempuh);
                    if (respData.tinggal_id !== null) {
                        const optTinggal = new Option(respData.tinggal_str, respData.tinggal_id, false, true);
                        $('#tabsAlamat-jenisTinggal').append(optTinggal);
                    }
                    if (respData.transportasi_id !== null) {
                        const optTransportasi = new Option(respData.transportasi_str, respData.transportasi_id, false, true);
                        $('#tabsAlamat-alatTransportasi').append(optTransportasi);
                    }
                    if (respData.lintang && respData.bujur) {
                        const elm = $('#maps');
                        elm.height(200).html('');
                        const latitude = respData.lintang;
                        const longitude = respData.bujur;

                        if (window.map) {
                            window.map.remove(); // hapus map sebelumnya
                            window.map = null;
                        }

                        window.map = L.map('maps').setView([latitude, longitude], 15);
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            maxZoom: 18,
                        }).addTo(window.map);

                        L.marker([latitude, longitude]).addTo(window.map);
                    } else {
                        if (window.map) {
                            window.map.remove();
                            window.map = null;
                        }
                        $('#maps').height('auto').html('<div class="text-muted text-center py-2 border bg-secondary">Koordinat tidak tersedia</div>');
                    }
                }
                offcanvasElm.find('.overlay').addClass('d-none');
            });

            $('#tabs-ortuwali-tab').on('click', async function(e) {
                e.preventDefault();
                const id = $(this).attr('data-id');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                $(this).tab('show');
                offcanvasElm.find('.overlay').removeClass('d-none');
                const respData = await fetchData('/api/v0/buku-induk/peserta-didik/ortuwaliPd/' + id);
                if (respData) {
                    $('#tabs-ayah-tab').attr('data-id', respData.ayah_id).trigger('click');
                    $('#tabs-ibu-tab').attr('data-id', respData.ibu_id);
                    $('#tabs-wali-tab').attr('data-id', respData.wali_id);
                }
                offcanvasElm.find('.overlay').addClass('d-none');
            });

            $('#tabs-ayah-tab').on('click', async function(e) {
                e.preventDefault();
                const id = $(this).attr('data-id');
                const formElm = $('#formData-tabsAyah');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                $(this).tab('show');
                if (id == undefined || id == '') {
                    formElm.trigger('reset').find('option').remove();
                    return;
                }
                offcanvasElm.find('.overlay').removeClass('d-none');
                const respData = await fetchData('/api/v0/buku-induk/peserta-didik/ortuwali/' + id);
                if (!respData) {
                    formElm.trigger('reset').find('option').remove();
                    return;
                }
                $('#idAyah').val(respData.orangtua_id);
                $('#tabsAyah-nama').val(respData.nama);
                if (respData.jenis_kelamin_id) {
                    const optJk = new Option(respData.jenis_kelamin_str, respData.jenis_kelamin_id, false, true);
                    $('#tabsAyah-jenisKelamin').append(optJk);
                }
                $('#tabsAyah-tempatLahir').val(respData.tempat_lahir);
                $('#tabsAyah-tanggalLahir').val(tanggal(respData.tanggal_lahir, 'dd/mm/Y'));
                $('#tabsAyah-tanggalLahirDb').val(respData.tanggal_lahir);
                $('#tabsAyah-nik').val(respData.nik);
                if (respData.agama_id) {
                    const optAgama = new Option(respData.agama_str, respData.agama_id, false, true);
                    $('#tabsAyah-agama').append(optAgama);
                }
                if (respData.pendidikan_id) {
                    const optPendidikan = new Option(respData.pendidikan_str, respData.pendidikan_id, false, true);
                    $('#tabsAyah-pendidikan').append(optPendidikan);
                }
                if (respData.pekerjaan_id) {
                    const optpekerjaan = new Option(respData.pekerjaan_str, respData.pekerjaan_id, false, true);
                    $('#tabsAyah-pekerjaan').append(optpekerjaan);
                }
                if (respData.penghasilan_id) {
                    const optpenghasilan = new Option(respData.penghasilan_str, respData.penghasilan_id, false, true);
                    $('#tabsAyah-penghasilan').append(optpenghasilan);
                }
                offcanvasElm.find('.overlay').addClass('d-none');
            });

            $('#btnRun-deleteAyah').on('click', async function() {
                const konfirmasi = await Swal.fire({
                    icon: "info",
                    title: "Hapus Ayah?",
                    text: "Data ayah peserta didik akan dihapus. Apakah anda yakin?",
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Ya, Hapus",
                    cancelButtonText: "Batal",
                    customClass: {
                        confirmButton: "bg-danger",
                    },
                });
                if (!konfirmasi.isConfirmed) return;
                const btn = $(this);
                const tabsElm = $('#tabs-ayah-tab');
                const idAyahElm = $('#idAyah');
                const id = $('#detailPd-id').val();
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                const loading = offcanvasElm.find('.overlay');
                loading.removeClass('d-none');
                const respData = await fetchData({
                    url: '/api/v0/buku-induk/peserta-didik/ortuwalipd/' + id + '?t=ayah_id',
                    method: 'DELETE',
                    button: btn,
                });
                if (respData) {
                    toast(respData.message);
                    tabsElm.attr('data-id', '').trigger('click');
                    idAyahElm.val('');
                    dtAdminBukuIndukPd.ajax.reload(null, false);
                }
                loading.addClass('d-none');
            });

            $('#btnRun-deleteIbu').on('click', async function() {
                const konfirmasi = await Swal.fire({
                    icon: "info",
                    title: "Hapus Ibu?",
                    text: "Data ibu peserta didik akan dihapus. Apakah anda yakin?",
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Ya, Hapus",
                    cancelButtonText: "Batal",
                    customClass: {
                        confirmButton: "bg-danger",
                    },
                });
                if (!konfirmasi.isConfirmed) return;
                const btn = $(this);
                const tabsElm = $('#tabs-ibu-tab');
                const idIbuElm = $('#idIbu');
                const id = $('#detailPd-id').val();
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                const loading = offcanvasElm.find('.overlay');
                loading.removeClass('d-none');
                const respData = await fetchData({
                    url: '/api/v0/buku-induk/peserta-didik/ortuwalipd/' + id + '?t=ibu_id',
                    method: 'DELETE',
                    button: btn,
                });
                if (respData) {
                    toast(respData.message);
                    tabsElm.attr('data-id', '').trigger('click');
                    idIbuElm.val('');
                    dtAdminBukuIndukPd.ajax.reload(null, false);
                }
                loading.addClass('d-none');
            });

            $('#btnRun-deleteWali').on('click', async function() {
                const konfirmasi = await Swal.fire({
                    icon: "info",
                    title: "Hapus Wali?",
                    text: "Data wali peserta didik akan dihapus. Apakah anda yakin?",
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Ya, Hapus",
                    cancelButtonText: "Batal",
                    customClass: {
                        confirmButton: "bg-danger",
                    },
                });
                if (!konfirmasi.isConfirmed) return;
                const btn = $(this);
                const tabsElm = $('#tabs-wali-tab');
                const idWaliElm = $('#idWali');
                const id = $('#detailPd-id').val();
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                const loading = offcanvasElm.find('.overlay');
                loading.removeClass('d-none');
                const respData = await fetchData({
                    url: '/api/v0/buku-induk/peserta-didik/ortuwalipd/' + id + '?t=wali_id',
                    method: 'DELETE',
                    button: btn,
                });
                if (respData) {
                    toast(respData.message);
                    tabsElm.attr('data-id', '').trigger('click');
                    idWaliElm.val('');
                    dtAdminBukuIndukPd.ajax.reload(null, false);
                }
                loading.addClass('d-none');
            });

            $('#btnRun-saveAyah').on('click', async function() {
                const btn = $(this);
                const id = $('#idAyah').val();
                const formElm = $('#formData-tabsAyah');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                const loading = offcanvasElm.find('.overlay');
                const set = formElm.serializeArray();

                loading.removeClass('d-none');
                const respData = await fetchData({
                    url: '/api/v0/buku-induk/peserta-didik/ortuwali' + (id !== '' ? '/' + id : ''),
                    data: set,
                    method: 'POST',
                    button: btn,
                });

                if (respData) {
                    toast(respData.message);
                    $('#idAyah').val(respData.id);
                    $('#tabs-ayah-tab').attr('data-id', respData.id);
                    dtAdminBukuIndukPd.ajax.reload(null, false);
                }

                const respData2 = await fetchData({
                    url: '/api/v0/buku-induk/peserta-didik/ortuwalipd',
                    data: {
                        peserta_didik_id: $('#detailPd-id').val(),
                        ayah_id: respData.id
                    },
                    method: 'POST',
                    button: btn,
                });
                if (respData2) {
                    toast(respData2.message);
                    $('#tabs-ayah-tab').attr('data-id', respData.id);
                }
                loading.addClass('d-none');
            });

            $('#tabs-ibu-tab').on('click', async function(e) {
                e.preventDefault();
                const id = $(this).attr('data-id');
                const formElm = $('#formData-tabsIbu');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                $(this).tab('show');
                if (id == undefined || id == '') {
                    formElm.trigger('reset').find('option').remove();
                    return;
                }

                offcanvasElm.find('.overlay').removeClass('d-none');
                const respData = await fetchData('/api/v0/buku-induk/peserta-didik/ortuwali/' + id);
                if (!respData) {
                    formElm.trigger('reset').find('option').remove();
                    return;
                }
                $('#idIbu').val(respData.orangtua_id);
                $('#tabsIbu-nama').val(respData.nama);
                if (respData.jenis_kelamin_id) {
                    const optJk = new Option(respData.jenis_kelamin_str, respData.jenis_kelamin_id, false, true);
                    $('#tabsIbu-jenisKelamin').append(optJk);
                }
                $('#tabsIbu-tempatLahir').val(respData.tempat_lahir);
                $('#tabsIbu-tanggalLahir').val(tanggal(respData.tanggal_lahir, 'dd/mm/Y'));
                $('#tabsIbu-tanggalLahirDb').val(respData.tanggal_lahir);
                $('#tabsIbu-nik').val(respData.nik);
                if (respData.agama_id) {
                    const optAgama = new Option(respData.agama_str, respData.agama_id, false, true);
                    $('#tabsIbu-agama').append(optAgama);
                }
                if (respData.pendidikan_id) {
                    const optPendidikan = new Option(respData.pendidikan_str, respData.pendidikan_id, false, true);
                    $('#tabsIbu-pendidikan').append(optPendidikan);
                }
                if (respData.pekerjaan_id) {
                    const optpekerjaan = new Option(respData.pekerjaan_str, respData.pekerjaan_id, false, true);
                    $('#tabsIbu-pekerjaan').append(optpekerjaan);
                }
                if (respData.penghasilan_id) {
                    const optpenghasilan = new Option(respData.penghasilan_str, respData.penghasilan_id, false, true);
                    $('#tabsIbu-penghasilan').append(optpenghasilan);
                }
                offcanvasElm.find('.overlay').addClass('d-none');
            });

            $('#btnRun-saveIbu').on('click', async function() {
                const btn = $(this);
                const id = $('#idIbu').val();
                const formElm = $('#formData-tabsIbu');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                const loading = offcanvasElm.find('.overlay');
                const set = formElm.serializeArray();

                loading.removeClass('d-none');
                const respData = await fetchData({
                    url: '/api/v0/buku-induk/peserta-didik/ortuwali' + (id !== '' ? '/' + id : ''),
                    data: set,
                    method: 'POST',
                    button: btn,
                });
                if (respData) {
                    toast(respData.message);
                    $('#idIbu').val(respData.id);
                    $('#tabs-ibu-tab').attr('data-id', respData.id);
                    dtAdminBukuIndukPd.ajax.reload(null, false);
                }
                const respData2 = await fetchData({
                    url: '/api/v0/buku-induk/peserta-didik/ortuwalipd',
                    data: {
                        peserta_didik_id: $('#detailPd-id').val(),
                        ibu_id: respData.id
                    },
                    method: 'POST',
                    button: btn,
                });
                if (respData2)
                    toast(respData2.message);
                loading.addClass('d-none');
            });

            $('#tabs-wali-tab').on('click', async function(e) {
                e.preventDefault();
                const id = $(this).attr('data-id');
                const formElm = $('#formData-tabsWali');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                $(this).tab('show');
                if (id == undefined || id == '') {
                    formElm.trigger('reset').find('option').remove();
                    return;
                }
                offcanvasElm.find('.overlay').removeClass('d-none');
                const respData = await fetchData('/api/v0/buku-induk/peserta-didik/ortuwali/' + id);
                if (!respData) {
                    formElm.trigger('reset').find('option').remove();
                    return;
                }
                $('#idWali').val(respData.orangtua_id);
                $('#tabsWali-nama').val(respData.nama);
                if (respData.jenis_kelamin_id) {
                    const optJk = new Option(respData.jenis_kelamin_str, respData.jenis_kelamin_id, false, true);
                    $('#tabsWali-jenisKelamin').append(optJk);
                }
                $('#tabsWali-tempatLahir').val(respData.tempat_lahir);
                $('#tabsWali-tanggalLahir').val(tanggal(respData.tanggal_lahir, 'dd/mm/Y'));
                $('#tabsWali-tanggalLahirDb').val(respData.tanggal_lahir);
                $('#tabsWali-nik').val(respData.nik);
                if (respData.agama_id) {
                    const optAgama = new Option(respData.agama_str, respData.agama_id, false, true);
                    $('#tabsWali-agama').append(optAgama);
                }
                if (respData.pendidikan_id) {
                    const optPendidikan = new Option(respData.pendidikan_str, respData.pendidikan_id, false, true);
                    $('#tabsWali-pendidikan').append(optPendidikan);
                }
                if (respData.pekerjaan_id) {
                    const optpekerjaan = new Option(respData.pekerjaan_str, respData.pekerjaan_id, false, true);
                    $('#tabsWali-pekerjaan').append(optpekerjaan);
                }
                if (respData.penghasilan_id) {
                    const optpenghasilan = new Option(respData.penghasilan_str, respData.penghasilan_id, false, true);
                    $('#tabsWali-penghasilan').append(optpenghasilan);
                }
                offcanvasElm.find('.overlay').addClass('d-none');
            });

            $('#btnRun-saveWali').on('click', async function() {
                const btn = $(this);
                const id = $('#idWali').val();
                const formElm = $('#formData-tabsWali');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                const loading = offcanvasElm.find('.overlay');
                const set = formElm.serializeArray();

                loading.removeClass('d-none');
                const respData = await fetchData({
                    url: '/api/v0/buku-induk/peserta-didik/ortuwali' + (id !== '' ? '/' + id : ''),
                    data: set,
                    method: 'POST',
                    button: btn,
                });
                if (respData) {
                    toast(respData.message);
                    $('#idWali').val(respData.id);
                    $('#tabs-wali-tab').attr('data-id', respData.id);
                    dtAdminBukuIndukPd.ajax.reload(null, false);
                }
                const respData2 = await fetchData({
                    url: '/api/v0/buku-induk/peserta-didik/ortuwalipd',
                    data: {
                        peserta_didik_id: $('#detailPd-id').val(),
                        wali_id: respData.id
                    },
                    method: 'POST',
                    button: btn,
                });
                if (respData2)
                    toast(respData2.message);
                loading.addClass('d-none');
            });

            $('#btnSave-ortuwali').on('click', e => $(e.target).parents('.tab-pane').find('.active.show button.save').trigger('click'));
            $('#btnDelete-ortuwali').on('click', e => $(e.target).parents('.tab-pane').find('.active.show button.delete').trigger('click'));

            $('#btnSave-identitasPd').on('click', async function() {
                const btn = $(this);
                const id = $('#detailPd-id').val();
                const formElm = $('#formData-tabsIdentitas');
                const filesElm = formElm.find('input:file');
                const files = filesElm.prop('files');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                const loading = offcanvasElm.find('.overlay');
                const set = formElm.serializeArray();

                loading.removeClass('d-none');
                let data = new FormData();
                set.forEach(field => {
                    data.append(field.name, field.value);
                });
                if (files.length > 0)
                    data.append('file', files[0]);

                const respData = await fetchData({
                    url: '/api/v0/buku-induk/peserta-didik/identitas/' + id,
                    method: 'POST',
                    data: data,
                    button: btn,
                });
                loading.addClass('d-none');
                dtAdminBukuIndukPd.ajax.reload(null, false);
                if (respData) {
                    toast(respData.message);
                    filesElm.val('').trigger('change');
                    bsCustomFileInput.destroy();
                    bsCustomFileInput.init();
                }
            });

            $('#btnSave-alamatPd').on('click', async function() {
                const btn = $(this);
                const id = $('#detailPd-id').val();
                const formElm = $('#formData-tabsAlamat');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                const loading = offcanvasElm.find('.overlay');
                const set = formElm.serializeArray();

                loading.removeClass('d-none');

                const respData = await fetchData({
                    url: '/api/v0/buku-induk/peserta-didik/alamat/' + id,
                    data: set,
                    method: 'POST',
                    button: btn,
                });
                dtAdminBukuIndukPd.ajax.reload(null, false);
                if (respData)
                    toast(respData.message);
                loading.addClass('d-none');
            });

            $('#tabs-kontak-tab').on('click', async function(e) {
                e.preventDefault();
                const id = $(this).attr('data-id');
                const formElm = $('#formData-tabsKontak');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                $(this).tab('show');
                if (id == undefined || id == '') {
                    formElm.trigger('reset').find('option').remove();
                    return;
                }
                offcanvasElm.find('.overlay').removeClass('d-none');
                const respData = await fetchData('/api/v0/buku-induk/peserta-didik/kontak/' + id);
                $('#tabsKontak-telepon').val(respData.telepon);
                $('#tabsKontak-hp').val(respData.hp);
                $('#tabsKontak-email').val(respData.email);
                $('#tabsKontak-website').val(respData.website);
                offcanvasElm.find('.overlay').addClass('d-none');
            });

            $('#btnRun-saveKontakPd').on('click', async function() {
                const btn = $(this);
                const id = $('#detailPd-id').val();
                const formElm = $('#formData-tabsKontak');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                const loading = offcanvasElm.find('.overlay');
                const set = formElm.serializeArray();

                loading.removeClass('d-none');
                const respData = await fetchData({
                    url: '/api/v0/buku-induk/peserta-didik/kontak/' + id,
                    data: set,
                    method: 'POST',
                    button: btn
                });
                dtAdminBukuIndukPd.ajax.reload(null, false);
                if (respData)
                    toast(respData.message);
                loading.addClass('d-none');
            });

            $('#modalReferensi').on('shown.bs.modal', e => $('.modal-backdrop').css('z-index', 1060));
            $('#modalReferensi').on('hidden.bs.modal', e => $('.modal-backdrop').css('z-index', 1040));

            $('#formData-tambahReferensi').find('input,select,textarea').on('change input', e => {
                const kode = $('#formReferensi-kode').val();
                const bg = $('#formReferensi-bgColor').val();
                const elm = `<span class="badge ${bg}">${kode}</span>`;
                $('#refPreview').html('').append(elm);
            });

            $('#btnRun-simpanReferensi').on('click', async function() {
                const btn = $(this);
                const formElm = $('#formData-tambahReferensi');
                const type = $('#typeReferensi');
                const target = $('#targetTambahReferensi').val();
                const resp = await fetchData({
                    url: '/api/v0/referensi?type=' + type.val(),
                    data: formElm.serializeArray(),
                    method: 'POST',
                    button: btn,
                });
                if (!resp) return;
                formElm.trigger('reset').find('select,textarea').val(null).trigger('change');
                $('#refPreview').html('');
                $('#modalReferensi').modal('hide');
                const newOpt = new Option(resp.nama, resp.ref_id, false, true);
                $('#' + target).append(newOpt);
            });

            $('#btnCancel-simpanReferensi').on('click', function() {
                const targetElm = $('#targetTambahReferensi').val();
                const idOpt = $('#tempId-selectNewTags').val();
                $('#' + targetElm).find('option[value="' + idOpt + '"]').remove()
                $('#' + targetElm).val(null).trigger('change');
                $('#modalReferensi').modal('hide');
            });

            $('#btnRun-saveBeasiswa').on('click', async function() {
                const btn = $(this);
                const id = $('#detailPd-id').val();
                const formElm = $('#formData-tabsTambahBeasiswaPd');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                const loading = offcanvasElm.find('.overlay');
                const set = formElm.serializeArray();
                if (!validationElm(['tabsTambahBeasiswa-jenisBeasiswa', 'tabsTambahBeasiswa-uraian',
                        'tabsTambahBeasiswa-tahunAwal', 'tabsTambahBeasiswa-nominal', 'tabsTambahBeasiswa-satuan'
                    ], ['', null])) return;
                loading.removeClass('d-none');
                const respData = await fetchData({
                    url: '/api/v0/buku-induk/peserta-didik/beasiswa/' + id,
                    data: set,
                    method: 'POST',
                    button: btn
                });
                dtAdminBukuIndukPd.ajax.reload(null, false);
                if (respData) {
                    toast(respData.message);
                    formElm.trigger('reset').find('option').remove();
                    $('#tabs-beasiswa-tab').trigger('click');
                }
                loading.addClass('d-none');
            });

            $('#tabs-beasiswa-tab').on('click', function(e) {
                e.preventDefault();
                const id = $(this).attr('data-id');
                const listElm = $('#listBeasiswaPd');
                listElm.html('<i>Tidak ada data.</i>');
                $(this).tab('show');
                $('#tabs-list-beasiswa-tab').attr('data-id', id).trigger('click');
            });

            $('#tabs-list-beasiswa-tab').on('click', async function(e) {
                e.preventDefault();
                const id = $(this).attr('data-id');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                const listElm = $('#listBeasiswaPd');
                $(this).tab('show');
                offcanvasElm.find('.overlay').removeClass('d-none');
                const respData = await fetchData('/api/v0/buku-induk/peserta-didik/beasiswa/' + id);
                if (respData.length > 0) {
                    listElm.html('');
                    respData.forEach(v => {
                        const itemElm = `<div class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1 text-bold">${v.tahun_awal} - ${parseInt(v.tahun_akhir) || 'sekarang'}</h6>
                                                <button type="button" data-id="${v.id}" data-toggle="tooltip" data-title="Hapus" class="close btnRow-hapusBeasiswa" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <p class="mb-0">${v.jenis_beasiswa}</p>
                                            <p class="text-muted small mb-1">${v.uraian}</p>
                                            <small class="text-muted">Rp. ${v.nominal},-/${v.satuan}</small>
                                        </div>`;
                        listElm.append(itemElm);
                    });
                }
                offcanvasElm.find('.overlay').addClass('d-none');
                runTooltip();

                $('.btnRow-hapusBeasiswa').on('click', function() {
                    const btn = $(this);
                    const id = $(this).data('id');

                    Swal.fire({
                        icon: "info",
                        title: "Hapus Data?",
                        text: "Data beasiswa peserta didik akan dihapus permanen. Apakah anda yakin?",
                        showCloseButton: true,
                        showCancelButton: true,
                        confirmButtonText: "Ya, Hapus",
                        cancelButtonText: "Batal",
                        customClass: {
                            confirmButton: "bg-danger",
                        },
                        showLoaderOnConfirm: true,
                        backdrop: true,
                        allowOutsideClick: () => !Swal.isLoading(),
                        preConfirm: () => {
                            return fetchData({
                                url: '/api/v0/buku-induk/peserta-didik/beasiswa/' + id,
                                method: 'DELETE',
                                button: btn
                            });
                        },
                    }).then((result) => {
                        if (result.isConfirmed && result.value) {
                            toast(result.value.message);
                            dtAdminBukuIndukPd.ajax.reload(null, false);
                            $('#tabs-beasiswa-tab').trigger('click');
                        }
                    });
                });
            });

            $('#tabs-tambah-beasiswa-tab').on('click', e => $('#formData-tabsTambahBeasiswaPd').trigger('reset').find('option').remove());

            $('#tabs-registrasi-tab').on('click', async function(e) {
                e.preventDefault();
                const id = $(this).attr('data-id');
                const formElm = $('#formData-tabsRegistrasi');
                formElm.trigger('reset').find('option').remove();
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                $(this).tab('show');
                if (id == undefined || id == '') {
                    return;
                }
                offcanvasElm.find('.overlay').removeClass('d-none');
                const respData = await fetchData('/api/v0/buku-induk/peserta-didik/registrasi/' + id);

                if (respData) {
                    const opt = new Option(respData.jenis_registrasi_str, respData.jenis_registrasi_id, false, true);
                    $('#tabsRegistrasi-jenisRegistrasi').append(opt);
                    $('#tabsRegistrasi-tanggalRegistrasi')
                        .datetimepicker('date', tanggal(respData.tanggal_registrasi, 'dd/mm/Y'));
                    $('#tabsRegistrasi-nipd').val(respData.nipd);
                    $('#tabsRegistrasi-asalSekolah').val(respData.asal_sekolah);
                }
                offcanvasElm.find('.overlay').addClass('d-none');
            });

            $('#btnRun-saveRegistrasiPd').on('click', async function() {
                const btn = $(this);
                const id = $('#detailPd-id').val();
                const formElm = $('#formData-tabsRegistrasi');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                const loading = offcanvasElm.find('.overlay');
                const set = formElm.serializeArray();
                if (!validationElm(['tabsRegistrasi-jeniRegistrasi', 'tabsRegistrasi-tanggalRegistrasi',
                        'tabsRegistrasi-nipd'
                    ], ['', 'null']))
                    return;
                loading.removeClass('d-none');
                const respData = await fetchData({
                    url: '/api/v0/buku-induk/peserta-didik/registrasi/' + id,
                    data: set,
                    method: 'POST',
                    button: btn
                });
                dtAdminBukuIndukPd.ajax.reload(null, false);
                if (respData) {
                    toast(respData.message);
                    formElm.trigger('reset').find('option').remove();
                    $('#tabs-registrasi-tab').trigger('click');
                }
                loading.addClass('d-none');
            });

            $('#btnRun-deleteRegistrasiPd').on('click', async function() {
                const btn = $(this);
                const id = $('#detailPd-id').val();

                Swal.fire({
                    icon: "info",
                    title: "Hapus Data?",
                    text: "Data registrasi peserta didik akan dihapus permanen. Apakah anda yakin?",
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Ya, Hapus",
                    cancelButtonText: "Batal",
                    customClass: {
                        confirmButton: "bg-danger",
                    },
                    showLoaderOnConfirm: true,
                    backdrop: true,
                    allowOutsideClick: () => !Swal.isLoading(),
                    preConfirm: () => {
                        return fetchData({
                            url: '/api/v0/buku-induk/peserta-didik/registrasi/' + id,
                            method: 'DELETE',
                            button: btn
                        });
                    },
                }).then((result) => {
                    if (result.isConfirmed && result.value) {
                        toast(result.value.message);
                        dtAdminBukuIndukPd.ajax.reload(null, false);
                        $('#tabs-registrasi-tab').trigger('click');
                    }
                });
            });

            $('#tabs-mutasi-tab').on('click', async function(e) {
                e.preventDefault();
                const id = $(this).attr('data-id');
                const formElm = $('#formData-tabsMutasi');
                formElm.trigger('reset').find('option').remove();
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                $(this).tab('show');
                if (id == undefined || id == '') {
                    return;
                }
                offcanvasElm.find('.overlay').removeClass('d-none');
                const respData = await fetchData('/api/v0/buku-induk/peserta-didik/mutasi/' + id);

                if (respData) {
                    const opt = new Option(respData.jenis_mutasi_str, respData.jenis_mutasi_id, false, true);
                    $('#tabsMutasi-jenisMutasi').append(opt);
                    $('#tabsMutasi-tanggalMutasi')
                        .datetimepicker('date', tanggal(respData.tanggal, 'dd/mm/Y'));
                    $('#tabsMutasi-alasanMutasi').val(respData.alasan);
                    $('#tabsMutasi-sekolahTujuan').val(respData.sekolah_tujuan);
                }
                offcanvasElm.find('.overlay').addClass('d-none');
            });

            $('#btnRun-saveMutasiPd').on('click', async function() {
                const btn = $(this);
                const id = $('#detailPd-id').val();
                const formElm = $('#formData-tabsMutasi');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                const loading = offcanvasElm.find('.overlay');
                const set = formElm.serializeArray();
                if (!validationElm(['tabsMutasi-jeniMutasi', 'tabsMutasi-tanggalMutasi'], ['', 'null', null]))
                    return;
                loading.removeClass('d-none');
                const respData = await fetchData({
                    url: '/api/v0/buku-induk/peserta-didik/mutasi/' + id,
                    data: set,
                    method: 'POST',
                    button: btn
                });
                if (respData) {
                    toast(respData.message);
                    formElm.trigger('reset').find('option').remove();
                    $('#tabs-mutasi-tab').trigger('click');
                    dtAdminBukuIndukPd.ajax.reload(null, false);
                }
                loading.addClass('d-none');
            });

            $('#btnRun-deleteMutasiPd').on('click', async function() {
                const btn = $(this);
                const id = $('#detailPd-id').val();

                Swal.fire({
                    icon: "info",
                    title: "Hapus Mutasi?",
                    text: "Data mutasi peserta didik akan dihapus permanen. Apakah anda yakin?",
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Ya, Hapus",
                    cancelButtonText: "Batal",
                    customClass: {
                        confirmButton: "bg-danger",
                    },
                    showLoaderOnConfirm: true,
                    backdrop: true,
                    allowOutsideClick: () => !Swal.isLoading(),
                    preConfirm: () => {
                        return fetchData({
                            url: '/api/v0/buku-induk/peserta-didik/mutasi/' + id,
                            method: 'DELETE',
                            button: btn
                        });
                    },
                }).then((result) => {
                    if (result.isConfirmed && result.value) {
                        toast(result.value.message);
                        dtAdminBukuIndukPd.ajax.reload(null, false);
                        $('#tabs-mutasi-tab').trigger('click');
                    }
                });
            });

            $('#tabs-kelulusan-tab').on('click', async function(e) {
                e.preventDefault();
                const id = $(this).attr('data-id');
                const listElm = $('#listKelulusan');
                listElm.html('<i>Tidak ada data.</i>');
                $(this).tab('show');
                $('#tabs-list-kelulusan-tab').attr('data-id', id).trigger('click');
            });

            $('#tabs-list-kelulusan-tab').on('click', async function(e) {
                e.preventDefault();
                const id = $(this).attr('data-id');
                const formElm = $('#formData-tabsKelulusan');
                formElm.trigger('reset').find('option').remove();
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                const listElm = $('#listKelulusan');
                $(this).tab('show');
                if (id == undefined || id == '') {
                    return;
                }
                offcanvasElm.find('.overlay').removeClass('d-none');
                const respData = await fetchData('/api/v0/buku-induk/peserta-didik/kelulusan/' + id);
                if (respData.length > 0) {
                    listElm.html('');
                    respData.forEach(v => {
                        const itemElm = `<div class="list-group-item">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1 text-bold" data-toggle="collapse" data-target="#coll-${v.id}" aria-expanded="false" aria-controls="coll-${v.id}">${tanggal(v.tanggal, 'Y')} - ${v.jenjang_str}</h6>
                                                <div>
                                                    <button type="button" data-id="${v.id}" data-toggle="tooltip" data-title="Hapus" class="close btnRow-hapusKelulusan" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <a type="button" data-id="${v.id}" data-toggle="tooltip" data-title="Ubah" class="text-decoration-none mr-1 small text-muted btnRow-ubahKelulusan" aria-label="Close">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="collapse mt-1" id="coll-${v.id}">
                                                <ul class="list-group list-group-unbordered">
                                                    <li class="list-group-item py-2">
                                                        <p class="text-bold mb-0 small">Tanggal</p>
                                                        <a class="">${tanggal(v.tanggal,'d mmmm Y')}</a>
                                                    </li>
                                                    <li class="list-group-item py-2">
                                                        <p class="text-bold mb-0 small">Jenjang</p>
                                                        <a class="">${v.jenjang_str}</a>
                                                    </li>
                                                    <li class="list-group-item py-2">
                                                        <p class="text-bold mb-0 small">Nama Sekolah</p>
                                                        <a class="">${v.nama_sekolah}</a>
                                                    </li>
                                                    <li class="list-group-item py-2">
                                                        <p class="text-bold mb-0 small">NPSN</p>
                                                        <a class="">${v.npsn}</a>
                                                    </li>
                                                    <li class="list-group-item py-2">
                                                        <p class="text-bold mb-0 small">Kurikulum</p>
                                                        <a class="">${v.kurikulum_str}</a>
                                                    </li>
                                                    <li class="list-group-item py-2">
                                                        <p class="text-bold mb-0 small">Nomor Ijazah</p>
                                                        <a class="">${v.nomor_ijazah}</a>
                                                    </li>
                                                    <li class="list-group-item py-2">
                                                        <p class="text-bold mb-0 small">Nomor SKHUN</p>
                                                        <a class="">${v.nomor_skhun}</a>
                                                    </li>
                                                    <li class="list-group-item py-2">
                                                        <p class="text-bold mb-0 small">Nomor Peserta Ujian</p>
                                                        <a class="">${v.nomor_ujian}</a>
                                                    </li>
                                                    <li class="list-group-item py-2">
                                                        <p class="text-bold mb-0 small">Penandatangan</p>
                                                        <a class="">${v.penandatangan}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>`;
                        listElm.append(itemElm);
                    });

                    $('.btnRow-ubahKelulusan').on('click', async function() {
                        const btn = $(this);
                        const idKelulusan = btn.attr('data-id');
                        const id = $('#detailPd-id').val();
                        const respData = await fetchData('/api/v0/buku-induk/peserta-didik/kelulusan/' + id);
                        if (respData.length > 0) {
                            respData.forEach((val, i) => {
                                if (val.id == idKelulusan) {
                                    let opt;
                                    $('#tabsKelulusan-tanggalKelulusan').datetimepicker('date', tanggal(val.tanggal, 'dd/mm/Y'));
                                    if (val.jenjang_id) {
                                        opt = new Option(val.jenjang_str, val.jenjang_id, false, true);
                                        $('#tabsKelulusan-jenjangPendidikan').append(opt)
                                    }
                                    $('#tabsKelulusan-namaSekolah').val(val.nama_sekolah);
                                    $('#tabsKelulusan-npsn').val(val.npsn);
                                    if (val.kurikulum_id) {
                                        opt = new Option(val.kurikulum_str, val.kurikulum_id, false, true);
                                        $('#tabsKelulusan-kurikulumKelulusan').append(opt);
                                    }
                                    $('#tabsKelulusan-nomorIjazah').val(val.nomor_ijazah);
                                    $('#tabsKelulusan-nomorSkhun').val(val.nomor_skhun);
                                    $('#tabsKelulusan-nomorUjian').val(val.nomor_ujian);
                                    $('#tabsKelulusan-penandatangan').val(val.penandatangan);
                                }
                            });
                            $('#tabs-tambah-kelulusan-tab').trigger('click');
                        }
                    });

                    $('.btnRow-hapusKelulusan').on('click', async function() {
                        const btn = $(this);
                        const id = btn.data('id');
                        const confirm = await Swal.fire({
                            icon: "info",
                            title: "Hapus Kelulusan?",
                            text: "Data kelulusan peserta didik akan dihapus permanen. Apakah anda yakin?",
                            showCloseButton: true,
                            showCancelButton: true,
                            confirmButtonText: "Ya, Hapus",
                            cancelButtonText: "Batal",
                            customClass: {
                                confirmButton: "bg-danger",
                            },
                        });

                        if (confirm.isConfirmed) {
                            const delResp = await fetchData({
                                url: '/api/v0/buku-induk/peserta-didik/kelulusan/' + id,
                                method: 'DELETE',
                                button: btn
                            });
                            if (delResp) {
                                toast(delResp.message);
                                dtAdminBukuIndukPd.ajax.reload(null, false);
                                $('#tabs-kelulusan-tab').trigger('click');
                            }
                        }
                    });

                    runTooltip();
                }
                offcanvasElm.find('.overlay').addClass('d-none');
            });

            $('#btnRun-saveKelulusanPd').on('click', async function() {
                const btn = $(this);
                const id = $('#detailPd-id').val();
                const formElm = $('#formData-tabsKelulusan');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                const loading = offcanvasElm.find('.overlay');
                const set = formElm.serializeArray();
                if (!validationElm(['tabsKelulusan-kurikulumKelulusan', 'tabsKelulusan-tanggalKelulusan',
                        'tabsKelulusan-nomorIjazah', 'tabsKelulusan-penandatangan'
                    ], ['', 'null', null]))
                    return;
                loading.removeClass('d-none');
                const respData = await fetchData({
                    url: '/api/v0/buku-induk/peserta-didik/kelulusan/' + id,
                    data: set,
                    method: 'POST',
                    button: btn
                });
                if (respData) {
                    toast(respData.message);
                    formElm.trigger('reset').find('option').remove();
                    $('#tabs-kelulusan-tab').trigger('click');
                    dtAdminBukuIndukPd.ajax.reload(null, false);
                }
                loading.addClass('d-none');
            });

            $('#btnRun-deleteKelulusanPd').on('click', async function() {
                const btn = $(this);
                const id = $('#detailPd-id').val();


            });

            $('#btnRun-saveKesejahteraan').on('click', async function() {
                const btn = $(this);
                const id = $('#detailPd-id').val();
                const formElm = $('#formData-tabsTambahKesejahteraanPd');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                const loading = offcanvasElm.find('.overlay');
                const set = formElm.serializeArray();
                if (!validationElm(['tabsTambahKesejahteraan-jenisKesejahteraan', 'tabsTambahKesejahteraan-nomorKartu',
                        'tabsTambahKesejahteraan-tahunAwal', 'tabsTambahKesejahteraan-namaKartu'
                    ], ['', null])) return;
                loading.removeClass('d-none');
                const respData = await fetchData({
                    url: '/api/v0/buku-induk/peserta-didik/kesejahteraan/' + id,
                    data: set,
                    method: 'POST',
                    button: btn
                });
                dtAdminBukuIndukPd.ajax.reload(null, false);
                if (respData) {
                    toast(respData.message);
                    formElm.trigger('reset').find('option').remove();
                    $('#tabs-kesejahteraan-tab').trigger('click');
                }
                loading.addClass('d-none');
            });

            $('#tabs-kesejahteraan-tab').on('click', function(e) {
                e.preventDefault();
                const id = $(this).attr('data-id');
                const listElm = $('#listKesejahteraanPd');
                listElm.html('<i>Tidak ada data.</i>');
                $(this).tab('show');
                $('#tabs-list-kesejahteraan-tab').attr('data-id', id).trigger('click');
            });

            $('#tabs-list-kesejahteraan-tab').on('click', async function(e) {
                e.preventDefault();
                const id = $(this).attr('data-id');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                const listElm = $('#listKesejahteraanPd');
                $(this).tab('show');
                offcanvasElm.find('.overlay').removeClass('d-none');
                const respData = await fetchData('/api/v0/buku-induk/peserta-didik/kesejahteraan/' + id);
                if (respData.length > 0) {
                    listElm.html('');
                    respData.forEach(v => {
                        const itemElm = `<div class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1 text-bold">${v.tahun_awal} - ${parseInt(v.tahun_akhir) || 'sekarang'}</h6>
                                                <button type="button" data-id="${v.id}" data-toggle="tooltip" data-title="Hapus" class="close btnRow-hapusKesejahteraan" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <p class="mb-0 text-black">${v.jenis_kesejahteraan}</p>
                                            <p class="small mb-0 text-black">${v.nama_kartu}</p>
                                            <p class="text-muted small mb-0">${v.nomor_kartu}</p>
                                        </div>`;
                        listElm.append(itemElm);
                    });
                }
                offcanvasElm.find('.overlay').addClass('d-none');
                runTooltip();

                $('.btnRow-hapusKesejahteraan').on('click', function() {
                    const btn = $(this);
                    const id = $(this).data('id');

                    Swal.fire({
                        icon: "info",
                        title: "Hapus Data?",
                        text: "Data kesejahteraan peserta didik akan dihapus permanen. Apakah anda yakin?",
                        showCloseButton: true,
                        showCancelButton: true,
                        confirmButtonText: "Ya, Hapus",
                        cancelButtonText: "Batal",
                        customClass: {
                            confirmButton: "bg-danger",
                        },
                        showLoaderOnConfirm: true,
                        backdrop: true,
                        allowOutsideClick: () => !Swal.isLoading(),
                        preConfirm: async () => {
                            return await fetchData({
                                url: '/api/v0/buku-induk/peserta-didik/kesejahteraan/' + id,
                                method: 'DELETE',
                                button: btn
                            });
                        },
                    }).then((result) => {
                        if (result.isConfirmed && result.value) {
                            toast(result.value.message);
                            dtAdminBukuIndukPd.ajax.reload(null, false);
                            $('#tabs-kesejahteraan-tab').trigger('click');
                        }
                    });
                });
            });

            $('#tabs-tambah-kesejahteraan-tab').on('click', e => $('#formData-tabsTambahKesejahteraanPd').trigger('reset').find('option').remove());

            $('#btnRun-savePenyakit').on('click', async function() {
                const btn = $(this);
                const id = $('#detailPd-id').val();
                const formElm = $('#formData-tabsTambahPenyakitPd');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                const loading = offcanvasElm.find('.overlay');
                const set = formElm.serializeArray();
                if (!validationElm(['tabsTambahPenyakit-namaPenyakit', 'tabsTambahPenyakit-tahunRiwayat'], ['', null])) return;
                loading.removeClass('d-none');
                const respData = await fetchData({
                    url: '/api/v0/buku-induk/peserta-didik/penyakit/' + id,
                    data: set,
                    method: 'POST',
                    button: btn
                });
                dtAdminBukuIndukPd.ajax.reload(null, false);
                if (respData) {
                    toast(respData.message);
                    formElm.trigger('reset').find('option').remove();
                    $('#tabs-penyakit-tab').trigger('click');
                }
                loading.addClass('d-none');
            });

            $('#tabs-penyakit-tab').on('click', function(e) {
                e.preventDefault();
                const id = $(this).attr('data-id');
                const listElm = $('#listPenyakitPd');
                listElm.html('<i>Tidak ada data.</i>');
                $(this).tab('show');
                $('#tabs-list-penyakit-tab').attr('data-id', id).trigger('click');
            });

            $('#tabs-list-penyakit-tab').on('click', async function(e) {
                e.preventDefault();
                const id = $(this).attr('data-id');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                const listElm = $('#listPenyakitPd');
                $(this).tab('show');
                offcanvasElm.find('.overlay').removeClass('d-none');
                const respData = await fetchData('/api/v0/buku-induk/peserta-didik/penyakit/' + id);
                if (respData.length > 0) {
                    listElm.html('');
                    respData.forEach(v => {
                        const itemElm = `<div class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1 text-bold">${v.tahun}</h6>
                                                <button type="button" data-id="${v.id}" data-toggle="tooltip" data-title="Hapus" class="close btnRow-hapusPenyakit" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <p class="mb-0 text-black">${v.nama}</p>
                                        </div>`;
                        listElm.append(itemElm);
                    });
                }
                offcanvasElm.find('.overlay').addClass('d-none');
                runTooltip();

                $('.btnRow-hapusPenyakit').on('click', function() {
                    const btn = $(this);
                    const id = $(this).data('id');

                    Swal.fire({
                        icon: "info",
                        title: "Hapus Data?",
                        text: "Riwayat penyakit peserta didik akan dihapus permanen. Apakah anda yakin?",
                        showCloseButton: true,
                        showCancelButton: true,
                        confirmButtonText: "Ya, Hapus",
                        cancelButtonText: "Batal",
                        customClass: {
                            confirmButton: "bg-danger",
                        },
                        showLoaderOnConfirm: true,
                        backdrop: true,
                        allowOutsideClick: () => !Swal.isLoading(),
                        preConfirm: async () => {
                            return await fetchData({
                                url: '/api/v0/buku-induk/peserta-didik/penyakit/' + id,
                                method: 'DELETE',
                                button: btn
                            });
                        },
                    }).then((result) => {
                        if (result.isConfirmed && result.value) {
                            toast(result.value.message);
                            dtAdminBukuIndukPd.ajax.reload(null, false);
                            $('#tabs-penyakit-tab').trigger('click');
                        }
                    });
                });
            });

            $('#tabs-tambah-penyakit-tab').on('click', e => $('#formData-tabsTambahPenyakitPd').trigger('reset').find('option').remove());

            $('#btnRun-savePeriodik').on('click', async function() {
                const btn = $(this);
                const id = $('#detailPd-id').val();
                const formElm = $('#formData-tabsTambahPeriodikPd');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                const loading = offcanvasElm.find('.overlay');
                const set = formElm.serializeArray();
                if (!validationElm(['tabsTambahPeriodik-namaPeriodik', 'tabsTambahPeriodik-tahunRiwayat'], ['', null])) return;
                loading.removeClass('d-none');
                const respData = await fetchData({
                    url: '/api/v0/buku-induk/peserta-didik/periodik/' + id,
                    data: set,
                    method: 'POST',
                    button: btn
                });
                dtAdminBukuIndukPd.ajax.reload(null, false);
                if (respData) {
                    toast(respData.message);
                    formElm.trigger('reset').find('option').remove();
                    $('#tabs-periodik-tab').trigger('click');
                }
                loading.addClass('d-none');
            });

            $('#tabs-periodik-tab').on('click', function(e) {
                e.preventDefault();
                const id = $(this).attr('data-id');
                const listElm = $('#listPeriodikPd');
                listElm.html('<i>Tidak ada data.</i>');
                $(this).tab('show');
                $('#tabs-list-periodik-tab').attr('data-id', id).trigger('click');
                $('#tabs-grafik-periodik-tab').attr('data-id', id);
            });

            $('#tabs-list-periodik-tab').on('click', async function(e) {
                e.preventDefault();
                const id = $(this).attr('data-id');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                const listElm = $('#listPeriodikPd');
                $(this).tab('show');
                offcanvasElm.find('.overlay').removeClass('d-none');
                const respData = await fetchData('/api/v0/buku-induk/peserta-didik/periodik/' + id);
                if (respData.length > 0) {
                    listElm.html('');
                    respData.forEach(v => {
                        const itemElm = `<div class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1 text-bold">${tanggal(v.tanggal,'d mmmm Y')}</h6>
                                                <button type="button" data-id="${v.id}" data-toggle="tooltip" data-title="Hapus" class="close btnRow-hapusPeriodik" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <p class="mb-0 text-black">Tinggi badan: ${v.tinggi_badan} cm</p>
                                            <p class="mb-0 text-black">Berat badan: ${v.berat_badan} kg</p>
                                            <p class="mb-0 text-black">Lingkar kepala: ${v.lingkar_kepala} cm</p>
                                        </div>`;
                        listElm.append(itemElm);
                    });
                }
                offcanvasElm.find('.overlay').addClass('d-none');
                runTooltip();

                $('.btnRow-hapusPeriodik').on('click', function() {
                    const btn = $(this);
                    const id = $(this).data('id');

                    Swal.fire({
                        icon: "info",
                        title: "Hapus Data?",
                        text: "Riwayat periodik peserta didik akan dihapus permanen. Apakah anda yakin?",
                        showCloseButton: true,
                        showCancelButton: true,
                        confirmButtonText: "Ya, Hapus",
                        cancelButtonText: "Batal",
                        customClass: {
                            confirmButton: "bg-danger",
                        },
                        showLoaderOnConfirm: true,
                        backdrop: true,
                        allowOutsideClick: () => !Swal.isLoading(),
                        preConfirm: async () => {
                            return await fetchData({
                                url: '/api/v0/buku-induk/peserta-didik/periodik/' + id,
                                method: 'DELETE',
                                button: btn
                            });
                        },
                    }).then((result) => {
                        if (result.isConfirmed && result.value) {
                            toast(result.value.message);
                            dtAdminBukuIndukPd.ajax.reload(null, false);
                            $('#tabs-periodik-tab').trigger('click');
                        }
                    });
                });
            });

            let pengukuranChart = null;

            $('#tabs-grafik-periodik-tab').on('click', async function(e) {
                e.preventDefault();
                const id = $(this).attr('data-id');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                $(this).tab('show');
                offcanvasElm.find('.overlay').removeClass('d-none');

                const data = await fetchData('/api/v0/buku-induk/peserta-didik/periodik/' + id);
                if (data.length > 0) {
                    const labels = data.map(item => tanggal(item.tanggal, 'd/mm/yy'));
                    const tinggiBadan = data.map(item => item.tinggi_badan !== null ? parseFloat(item.tinggi_badan) : null);
                    const beratBadan = data.map(item => item.berat_badan !== null ? parseFloat(item.berat_badan) : null);
                    const lingkarKepala = data.map(item => item.lingkar_kepala !== null ? parseFloat(item.lingkar_kepala) : null);

                    const ctx = document.getElementById('pengukuranChart').getContext('2d');

                    // Hancurkan chart lama jika sudah ada
                    if (pengukuranChart !== null) {
                        pengukuranChart.destroy();
                    }

                    // Buat chart baru
                    pengukuranChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                    label: 'Tinggi Badan (cm)',
                                    data: tinggiBadan,
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                    tension: 0.3,
                                    spanGaps: true
                                },
                                {
                                    label: 'Berat Badan (kg)',
                                    data: beratBadan,
                                    borderColor: 'rgba(255, 99, 132, 1)',
                                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                    tension: 0.3,
                                    spanGaps: true
                                },
                                {
                                    label: 'Lingkar Kepala (cm)',
                                    data: lingkarKepala,
                                    borderColor: 'rgba(255, 206, 86, 1)',
                                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                                    tension: 0.3,
                                    spanGaps: true
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            legend: {
                                position: 'bottom',
                            },
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Grafik Periodik'
                                },
                                tooltip: {
                                    mode: 'index',
                                    intersect: false
                                },
                            },
                            interaction: {
                                mode: 'nearest',
                                axis: 'x',
                                intersect: false
                            },
                            scales: {
                                y: {
                                    beginAtZero: false,
                                    title: {
                                        display: true,
                                        text: 'Ukuran'
                                    }
                                },
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Tanggal'
                                    }
                                }
                            }
                        }
                    });
                }
                offcanvasElm.find('.overlay').addClass('d-none');
            });

            $('#tabs-tambah-periodik-tab').on('click', e => $('#formData-tabsTambahPeriodikPd').trigger('reset').find('option').remove());

            $('#btnRun-savePrestasi').on('click', async function() {
                const btn = $(this);
                const id = $('#detailPd-id').val();
                const formElm = $('#formData-tabsTambahPrestasiPd');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                const loading = offcanvasElm.find('.overlay');
                const set = formElm.serializeArray();
                if (!validationElm(['tabsTambahPrestasi-namaPrestasi', 'tabsTambahPrestasi-tahunRiwayat'], ['', null])) return;
                loading.removeClass('d-none');
                const respData = await fetchData({
                    url: '/api/v0/buku-induk/peserta-didik/prestasi/' + id,
                    data: set,
                    method: 'POST',
                    button: btn
                });
                dtAdminBukuIndukPd.ajax.reload(null, false);
                if (respData) {
                    toast(respData.message);
                    formElm.trigger('reset').find('option').remove();
                    $('#tabs-prestasi-tab').trigger('click');
                }
                loading.addClass('d-none');
            });

            $('#tabs-prestasi-tab').on('click', function(e) {
                e.preventDefault();
                const id = $(this).attr('data-id');
                const listElm = $('#listPrestasiPd');
                listElm.html('<i>Tidak ada data.</i>');
                $(this).tab('show');
                $('#tabs-list-prestasi-tab').attr('data-id', id).trigger('click');
            });

            $('#tabs-list-prestasi-tab').on('click', async function(e) {
                e.preventDefault();
                const id = $(this).attr('data-id');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                const listElm = $('#listPrestasiPd');
                $(this).tab('show');
                offcanvasElm.find('.overlay').removeClass('d-none');
                const respData = await fetchData('/api/v0/buku-induk/peserta-didik/prestasi/' + id);
                if (respData.length > 0) {
                    listElm.html('');
                    respData.forEach(v => {
                        const itemElm = `<div class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1 text-bold">${v.tahun}</h6>
                                                <button type="button" data-id="${v.id}" data-toggle="tooltip" data-title="Hapus" class="close btnRow-hapusPrestasi" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <p class="mb-0 text-black">${v.nama}</p>
                                            <p class="mb-0 text-black">${v.penyelenggara}</p>
                                            <p class="mb-0 text-black">${v.hasil}</p>
                                        </div>`;
                        listElm.append(itemElm);
                    });
                }
                offcanvasElm.find('.overlay').addClass('d-none');
                runTooltip();

                $('.btnRow-hapusPrestasi').on('click', function() {
                    const btn = $(this);
                    const id = $(this).data('id');

                    Swal.fire({
                        icon: "info",
                        title: "Hapus Data?",
                        text: "Riwayat prestasi peserta didik akan dihapus permanen. Apakah anda yakin?",
                        showCloseButton: true,
                        showCancelButton: true,
                        confirmButtonText: "Ya, Hapus",
                        cancelButtonText: "Batal",
                        customClass: {
                            confirmButton: "bg-danger",
                        },
                        showLoaderOnConfirm: true,
                        backdrop: true,
                        allowOutsideClick: () => !Swal.isLoading(),
                        preConfirm: async () => {
                            return await fetchData({
                                url: '/api/v0/buku-induk/peserta-didik/prestasi/' + id,
                                method: 'DELETE',
                                button: btn
                            });
                        },
                    }).then((result) => {
                        if (result.isConfirmed && result.value) {
                            toast(result.value.message);
                            dtAdminBukuIndukPd.ajax.reload(null, false);
                            $('#tabs-prestasi-tab').trigger('click');
                        }
                    });
                });
            });

            $('#tabs-difabel-tab').on('click', async function(e) {
                e.preventDefault();
                const id = $(this).attr('data-id');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                const listElm = $('#listDifabelPd');
                listElm.html('<i>Tidak ada data.</i>');
                $(this).tab('show');
                offcanvasElm.find('.overlay').removeClass('d-none');
                const respData = await fetchData('/api/v0/buku-induk/peserta-didik/difabel/' + id);
                if (respData.length > 0 && respData) {
                    listElm.html('');
                    respData.forEach(v => {
                        const itemElm = `<div class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <p class="mb-0">${v.kode} - ${v.nama}</p>
                                                <button type="button" data-id="${v.id}" data-toggle="tooltip" data-title="Hapus" class="close btnRow-hapusDifable" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>`;
                        listElm.append(itemElm);
                    });

                    $('.btnRow-hapusDifable').on('click', function() {
                        const btn = $(this);
                        const id = $(this).data('id');

                        Swal.fire({
                            icon: "info",
                            title: "Hapus Data?",
                            text: "Jenis kebutuhan khusus peserta didik akan dihapus permanen. Apakah anda yakin?",
                            showCloseButton: true,
                            showCancelButton: true,
                            confirmButtonText: "Ya, Hapus",
                            cancelButtonText: "Batal",
                            customClass: {
                                confirmButton: "bg-danger",
                            },
                            showLoaderOnConfirm: true,
                            backdrop: true,
                            allowOutsideClick: () => !Swal.isLoading(),
                            preConfirm: async () => {
                                return await fetchData({
                                    url: '/api/v0/buku-induk/peserta-didik/difabel/' + id,
                                    method: 'DELETE',
                                    button: btn
                                });
                            },
                        }).then((result) => {
                            if (result.isConfirmed && result.value) {
                                toast(result.value.message);
                                dtAdminBukuIndukPd.ajax.reload(null, false);
                                $('#tabs-difabel-tab').trigger('click');
                            }
                        });
                    });
                }
                offcanvasElm.find('.overlay').addClass('d-none');
                runTooltip();
            });

            $('#btnRun-saveDifabel').on('click', async function() {
                const btn = $(this);
                const id = $('#detailPd-id').val();
                const formElm = $('#formData-tabsTambahDifabelPd');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                const loading = offcanvasElm.find('.overlay');
                const set = formElm.serializeArray();
                if (!validationElm(['tabsDifabel-bidangDifabel'], ['', null])) return;
                loading.removeClass('d-none');
                const respData = await fetchData({
                    url: '/api/v0/buku-induk/peserta-didik/difabel/' + id,
                    data: set,
                    method: 'POST',
                    button: btn
                });
                if (respData) {
                    toast(respData.message);
                    formElm.trigger('reset').find('option').remove();
                    $('#tabs-difabel-tab').trigger('click');
                    dtAdminBukuIndukPd.ajax.reload(null, false);
                }
                loading.addClass('d-none');
            });

            $('#tabs-tambah-prestasi-tab').on('click', e => $('#formData-tabsTambahPrestasiPd').trigger('reset').find('option').remove());

            $('#tabs-rombel-tab').on('click', function(e) {
                e.preventDefault();
                const id = $(this).attr('data-id');
                const listElm = $('#listRombel');
                listElm.html('<i>Tidak ada data.</i>');
                $(this).tab('show');
                $('#tabs-list-rombel-tab').attr('data-id', id).trigger('click');
            });

            $('#tabs-list-rombel-tab').on('click', async function(e) {
                e.preventDefault();
                const id = $(this).attr('data-id');
                const formElm = $('#formData-tabsRombel');
                formElm.trigger('reset').find('option').remove();
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                const listElm = $('#listRombel');
                $(this).tab('show');
                if (id == undefined || id == '') {
                    return;
                }
                offcanvasElm.find('.overlay').removeClass('d-none');
                const respData = await fetchData('/api/v0/buku-induk/peserta-didik/rombel/' + id);
                if (respData.length > 0) {
                    listElm.html('');
                    respData.forEach(v => {
                        const itemElm = `<div class="list-group-item">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1 text-bold" data-toggle="collapse" data-target="#coll-${v.id}" aria-expanded="false" aria-controls="coll-${v.id}">${v.semester_kode} - ${v.rombel_nama}</h6>
                                                <div>
                                                    <button type="button" data-id="${v.id}" data-toggle="tooltip" data-title="Hapus" class="close btnRow-hapusRombel" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="collapse mt-1" id="coll-${v.id}">
                                                <ul class="list-group list-group-unbordered">
                                                    <li class="list-group-item py-2">
                                                        <p class="text-bold mb-0 small">Tahun Ajaran</p>
                                                        <a class="">${v.ta_nama}</a>
                                                    </li>
                                                    <li class="list-group-item py-2">
                                                        <p class="text-bold mb-0 small">Semester</p>
                                                        <a class="">${v.semester_kode}</a>
                                                    </li>
                                                    <li class="list-group-item py-2">
                                                        <p class="text-bold mb-0 small">Nama Rombel</p>
                                                        <a class="">${v.rombel_nama}</a>
                                                    </li>
                                                    <li class="list-group-item py-2">
                                                        <p class="text-bold mb-0 small">Jenis Registrasi</p>
                                                        <a class="">${v.registrasi_nama}</a>
                                                    </li>
                                                    <li class="list-group-item py-2">
                                                        <p class="text-bold mb-0 small">Tingkat</p>
                                                        <a class="">${v.tingkat}</a>
                                                    </li>
                                                    <li class="list-group-item py-2">
                                                        <p class="text-bold mb-0 small">Kurikulum</p>
                                                        <a class="">${v.kurikulum_str}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>`;
                        listElm.append(itemElm);
                    });

                    $('.btnRow-hapusRombel').on('click', async function() {
                        const btn = $(this);
                        const id = btn.data('id');
                        const confirm = await Swal.fire({
                            icon: "info",
                            title: "Hapus Rombel?",
                            text: "Data Rombongan Belajar peserta didik akan dihapus permanen. Apakah anda yakin?",
                            showCloseButton: true,
                            showCancelButton: true,
                            confirmButtonText: "Ya, Hapus",
                            cancelButtonText: "Batal",
                            customClass: {
                                confirmButton: "bg-danger",
                            },
                        });

                        if (confirm.isConfirmed) {
                            const delResp = await fetchData({
                                url: '/api/v0/buku-induk/peserta-didik/rombel/' + id,
                                method: 'DELETE',
                                button: btn
                            });
                            if (delResp) {
                                toast(delResp.message);
                                dtAdminBukuIndukPd.ajax.reload(null, false);
                                $('#tabs-rombel-tab').trigger('click');
                            }
                        }
                    });

                    runTooltip();
                }
                offcanvasElm.find('.overlay').addClass('d-none');
            });

            $('#btnRun-saveRombel').on('click', async function(e) {
                const btn = $(this);
                const id = $('#detailPd-id').val();
                const formElm = $('#formData-tabsTambahRombel');
                const offcanvasElm = $('#offcanvasEdit-dataPd');
                const loading = offcanvasElm.find('.overlay');
                const set = formElm.serializeArray();
                if (!validationElm(['tabsTambahRombel-namaRombel', 'tabsTambahRombel-jenisRegistrasi'], ['', null])) return;
                loading.removeClass('d-none');
                const respData = await fetchData({
                    url: '/api/v0/buku-induk/peserta-didik/anggotaRombel/' + id,
                    data: set,
                    method: 'POST',
                    button: btn
                });
                if (respData) {
                    toast(respData.message);
                    formElm.trigger('reset').find('option').remove();
                    $('#tabs-rombel-tab').trigger('click');
                    dtAdminBukuIndukPd.ajax.reload(null, false);
                }
                loading.addClass('d-none');
            });

            $('#btnSync-checkNewPd').on('click', async function() {
                const btn = $(this);
                const confirm = await Swal.fire({
                    icon: 'question',
                    text: 'Cek peserta didik baru di aplikasi dapodik?',
                    showCancelButton: true,
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Ya',
                    width: 500
                });
                if (!confirm.isConfirmed)
                    return;

                const resp = await fetchData({
                    url: '/api/v0/dapodik/sync/peserta-didik/check/new',
                    button: btn
                });
                if (!resp) return;
                if (resp.length > 0) {
                    btn.children('span').removeClass('d-none').text(resp.length);
                    toast(resp.length + ' peserta didik baru ditemukan.', 'info', 0);
                } else {
                    toast('Tidak ditemukan peserta didik baru .', 'error', 0);
                    btn.children('span').addClass('d-none').text('');
                }
            });

            $('#btnRun-ImportDapodik').on('click', async function() {
                const btn = $(this);
                const formElm = $('#formImport-pd');
                const dataType = formElm.serializeArray();
                const pd = $('input[name="radioFormImport-statusPd"]:checked').val();
                const alertElm = $('#importStatus');
                const inputElm = $('#inputFile');
                const file = inputElm.prop('files')[0];
                let i = 0,
                    l = 0,
                    set = [],
                    data = new FormData();

                if (dataType.length == 0 || !pd) {
                    alertElm.html('').html(`
                        <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                            Error: Peserta Didik/Jenis data belum dipilih.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    `);
                    return;
                }

                data.append('fileUpload', file);
                data.append('dataId', selectedRows);

                alertElm.html('').html(`
                        <div class="alert alert-primary alert-dismissible fade show mb-2" role="alert">
                                <div class="spinner-border spinner-border-sm mr-1" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            Mengambil data pada file import...
                        </div>
                    `);

                const result = await fetchData({
                    url: '/api/v0/dapodik/import/peserta-didik/get/' + pd,
                    data: data,
                    method: 'POST',
                    button: btn,
                });
                if (!result || result.length == 0) {
                    alertElm.html('').html(`
                        <div class="alert alert-${!result ? 'danger' : 'warning'} alert-dismissible fade show mb-2" role="alert">
                           ${result.length == 0 ? 'Peserta didik tidak ditemukan.' : 'Error: Cek notifikasi.'}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    `);
                    return;
                }
                alertElm.html('').html(`
                            <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                                ${result.length} Peserta didik ditemukan.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        `);
                const konfirmasi = await Swal.fire({
                    icon: 'question',
                    text: `${result.length} peserta didik ditemukan. Mulai menyimpan data peserta didik?`,
                    showCancelButton: true,
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Ya, Simpan',
                    customClass: {
                        confirmButton: 'bg-success'
                    },
                    width: 500
                });
                if (!konfirmasi.isConfirmed) {
                    alertElm.html('').html(`
                                    <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                                        Proses menyimpan data Peserta Didik dibatalkan.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                `);
                    return;
                }

                alertElm.html('').html(`
                    <div class="alert alert-primary alert-dismissible fade show mb-2" role="alert">
                        <div class="spinner-border spinner-border-sm mr-1" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        0% Menyimpan data peserta didik....
                    </div>
                `);
                await new Promise(resolve => setTimeout(resolve, 1000));

                for (const dataSet of result) {
                    i++;
                    alertElm.html('').html(`
                        <div class="alert alert-primary alert-dismissible fade show mb-2" role="alert">
                            <div class="spinner-border spinner-border-sm mr-1" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            ${formatNumber(parseInt(i)/parseInt(result.length)*100)}% Menyimpan data an. <strong>${dataSet.nama}</strong>
                        </div>

                    `);
                    let k = 0;
                    for (const val of dataType) {
                        const send = dataSet[val.name];

                        if (send == null || send == false ||
                            (typeof send === 'string' && send.trim() === '') ||
                            (Array.isArray(send) && send.length === 0) ||
                            (typeof send === 'object' && !Array.isArray(send) && Object.keys(send).length === 0)) {
                            continue;
                        }
                        let respSimpan;
                        if (Array.isArray(send)) {
                            for (const element of send) {
                                respSimpan = await fetchData({
                                    url: '/api/v0/buku-induk/peserta-didik/' + val.name + '/' + dataSet.peserta_didik_id,
                                    method: 'POST',
                                    data: element,
                                    button: btn,
                                });
                            }
                        } else {
                            respSimpan = await fetchData({
                                url: '/api/v0/buku-induk/peserta-didik/' + val.name + '/' + dataSet.peserta_didik_id,
                                method: 'POST',
                                data: send,
                                button: btn,
                            });
                        }
                        if (!respSimpan) {
                            toast(`Error: Data ${val.name} an. <strong>${dataSet.nama}</strong> gagal disimpan.`, 'error', );
                        } else k++;
                    }
                    if (k > 0) l++;
                }
                alertElm.html('').html(`
                    <div class="alert alert-${l == 0 ? 'warning' : 'success'} alert-dismissible fade show mb-2" role="alert">
                        ${l == 0 ? 'Tidak ada data peserta didik yang tersimpan.' : `${l}/${result.length} data peserta didik telah disimpan.`}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                `);
                dtAdminBukuIndukPd.ajax.reload(null, false);
            });

            $('#btnRun-tarikDapodik').on('click', async function() {
                const btn = $(this);
                const formElm = $('#formSync-pd');
                const dataType = formElm.serializeArray();
                const pd = $('input[name="radioForm-statusPd"]:checked').val();
                const alertElm = $('#syncStatus');
                let i = 0;
                let set = [];
                if (dataType.length == 0 || pd == '' || !pd) {
                    alertElm.html('').html(`
                        <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                            Error: Peserta Didik/Jenis data belum dipilih.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    `);
                    return;
                }
                if (pd == 'new') {
                    alertElm.html('').html(`
                            <div class="alert alert-primary alert-dismissible fade show mb-2" role="alert">
                                <div class="spinner-border spinner-border-sm mr-1" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                Mengambil data peserta didik baru...
                            </div>
                        `);
                    const resp = await fetchData({
                        url: '/api/v0/dapodik/sync/peserta-didik/check/new',
                        button: btn
                    });
                    if (!resp) {
                        alertElm.html('').html(`
                            <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                                Error: Cek notifikasi.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        `);
                        return;
                    };
                    if (resp.length > 0) {
                        alertElm.html('').html(`
                            <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                                ${resp.length} Peserta didik baru ditemukan. Mulai menarik data...
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        `);
                        for (const elem of resp)
                            set.push(elem);
                    } else {
                        alertElm.html('').html(`
                            <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                                Peserta didik baru tidak ditemukan.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        `);
                        return;
                    }
                } else if (pd == 'checked') {
                    if (selectedRows.length > 0) {
                        let j = 0;
                        for (const id of selectedRows) {
                            alertElm.html('').html(`
                                <div class="alert alert-primary alert-dismissible fade show mb-2" role="alert">
                                    <div class="spinner-border spinner-border-sm mr-1" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    ${formatNumber(parseInt(j)/parseInt(selectedRows.length)*100)}% Mengambil data peserta didik terpilih...
                                </div>
                            `);
                            const dataPd = await fetchData({
                                url: '/api/v0/dapodik/sync/peserta-didik/get/' + id,
                                button: btn,
                            });
                            if (!dataPd) {
                                alertElm.html('').html(`
                                    <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                                        Error: Cek notifikasi.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                `);
                                return;
                            }
                            set.push(dataPd);
                            j++;
                        }
                        alertElm.html('').html(`
                                <div class="alert alert-primary alert-dismissible fade show mb-2" role="alert">
                                    <div class="spinner-border spinner-border-sm mr-1" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    ${formatNumber(parseInt(j)/parseInt(selectedRows.length)*100)}% Data peserta didik terpilih telah ditarik dari aplikasi dapodik.
                                </div>
                            `);
                        await new Promise(resolve => setTimeout(resolve, 1000));
                    } else {
                        alertElm.html('').html(`
                                <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                                Tidak ada Peserta didik yang dipilih.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            `);
                        return;
                    }
                } else if (pd == 'all') {
                    alertElm.html('').html(`
                            <div class="alert alert-primary fade show mb-2" role="alert">
                                <div class="spinner-border spinner-border-sm mr-1" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                Mengambil data semua peserta didik...
                            </div>
                        `);
                    const resp = await fetchData({
                        url: '/api/v0/dapodik/sync/peserta-didik/check/all',
                        button: btn
                    });
                    if (!resp) {
                        alertElm.html('').html(`
                            <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                                Koneksi ke aplikasi dapodik Error.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        `);
                        return;
                    }
                    if (resp.length > 0) {
                        alertElm.html('').html(`
                            <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                                ${resp.length} Peserta didik ditemukan.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        `);
                        if (resp.length > 200) {
                            const konfirmasi = await Swal.fire({
                                icon: 'question',
                                text: `Jumlah peserta didik lebih dari 200. Proses tarik data kemungkinan akan memakan waktu yang lama. Apakah akan dilanjutkan?`,
                                showCancelButton: true,
                                cancelButtonText: 'Batal',
                                confirmButtonText: 'Ya, Lanjut',
                                width: 500
                            });
                            if (!konfirmasi.isConfirmed) {
                                alertElm.html('').html(`
                                    <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                                        Proses tarik data Peserta Didik dibatalkan.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                `);
                                return;
                            }
                        }
                        for (const elem of resp)
                            set.push(elem);
                    } else {
                        alertElm.html('').html(`
                            <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                                Peserta didik tidak ditemukan.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        `);
                    }
                } else {
                    alertElm.html('').html(`
                        <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                            Error: Status pilihan peserta didik tidak ditemukan.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    `);
                }
                alertElm.html('').html(`
                    <div class="alert alert-primary alert-dismissible fade show mb-2" role="alert">
                        <div class="spinner-border spinner-border-sm mr-1" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <span id="progressPercent">0%</span> <span id="progressMessage">Menyimpan data....</span>
                    </div>
                `);
                await new Promise(resolve => setTimeout(resolve, 1000));

                let l = 0;
                for (const dataSet of set) {
                    i++;
                    $('#progressPercent').text(`${formatNumber(parseInt(i)/parseInt(set.length)*100)}%`);
                    $('#progressMessage').html(`Menyimpan data an. <strong>${dataSet.nama}</strong>`);
                    let k = 0;
                    for (const val of dataType) {
                        const send = dataSet[val.name];

                        if (send == null || send == false ||
                            (typeof send === 'string' && send.trim() === '') ||
                            (Array.isArray(send) && send.length === 0) ||
                            (typeof send === 'object' && !Array.isArray(send) && Object.keys(send).length === 0)) {
                            continue;
                        }
                        let respSimpan;
                        if (Array.isArray(send)) {
                            for (const element of send) {
                                respSimpan = await fetchData({
                                    url: '/api/v0/buku-induk/peserta-didik/' + val.name + '/' + dataSet.peserta_didik_id,
                                    method: 'POST',
                                    data: element,
                                    button: btn,
                                });
                            }
                        } else {
                            respSimpan = await fetchData({
                                url: '/api/v0/buku-induk/peserta-didik/' + val.name + '/' + dataSet.peserta_didik_id,
                                method: 'POST',
                                data: send,
                                button: btn,
                            });
                        }
                        if (!respSimpan) {
                            toast(`Error: Data ${val.name} an. <strong>${dataSet.nama}</strong> gagal disimpan.`, 'error', 0);
                        } else k++;
                    }
                    if (k > 0) l++;
                }
                alertElm.html('').html(`
                    <div class="alert alert-${l == 0 ? 'warning' : 'success'} alert-dismissible fade show mb-2" role="alert">
                        ${l == 0 ? 'Tidak ada data peserta didik yang tersimpan.' : `${l}/${set.length} data peserta didik telah disimpan.`}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                `);
                dtAdminBukuIndukPd.ajax.reload(null, false);
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
                        tahun_mutasi: $('#inputDt-tahunMutasiPd').val(),
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