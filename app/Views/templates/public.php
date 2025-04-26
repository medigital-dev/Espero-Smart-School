<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/plugins/select2/css/select2.css">
    <link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/css/adminlte.min.css">
    <!-- MyCss -->
    <style>
        .offcanvas {
            position: fixed;
            background-color: #fff;
            transition: transform 0.3s ease-in-out;
            z-index: 1050;
            overflow-y: auto;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, .15);
        }

        .offcanvas-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid #dee2e6;
        }

        .offcanvas-header h5 {
            margin: 0;
        }

        .offcanvas-body {
            padding: 1rem;
        }

        /* Default sizes (mobile-first) */
        .offcanvas-start,
        .offcanvas-end {
            top: 0;
            height: 100%;
            width: 70vw;
        }

        .offcanvas-top,
        .offcanvas-bottom {
            width: 100%;
            height: 40vh;
        }

        .offcanvas-start {
            left: 0;
            transform: translateX(-100%);
        }

        .offcanvas-end {
            right: 0;
            transform: translateX(100%);
        }

        .offcanvas-top {
            top: 0;
            transform: translateY(-100%);
        }

        .offcanvas-bottom {
            bottom: 0;
            transform: translateY(100%);
        }

        .offcanvas .close {
            background: none;
            border: none;
        }

        .offcanvas.show {
            transform: translate(0, 0);
        }

        /* Responsive breakpoints */
        @media (min-width: 576px) {

            .offcanvas-start,
            .offcanvas-end {
                width: 300px;
            }

            .offcanvas-top,
            .offcanvas-bottom {
                height: 250px;
            }
        }
    </style>
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white sticky-top">
            <div class="container">
                <a href="../../index3.html" class="navbar-brand">
                    <img src="<?= base_url('assets/img/brands/logo2.png'); ?>" alt="ESS Logo" class="brand-image">
                    <span class="brand-text font-weight-light"><strong>Espero</strong>SmartSchool</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="index3.html" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Contact</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="#" class="dropdown-item">Some action </a></li>
                                <li><a href="#" class="dropdown-item">Some other action</a></li>

                                <li class="dropdown-divider"></li>

                                <!-- Level two dropdown-->
                                <li class="dropdown-submenu dropdown-hover">
                                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                        <li>
                                            <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                                        </li>

                                        <!-- Level three dropdown-->
                                        <li class="dropdown-submenu">
                                            <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                                            <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                                                <li><a href="#" class="dropdown-item">3rd level</a></li>
                                                <li><a href="#" class="dropdown-item">3rd level</a></li>
                                            </ul>
                                        </li>
                                        <!-- End Level three -->

                                        <li><a href="#" class="dropdown-item">level 2</a></li>
                                        <li><a href="#" class="dropdown-item">level 2</a></li>
                                    </ul>
                                </li>
                                <!-- End Level two -->
                            </ul>
                        </li>
                    </ul>

                    <!-- SEARCH FORM -->
                    <form class="form-inline ml-0 ml-md-3">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fas fa-comments"></i>
                            <span class="badge badge-danger navbar-badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            Brad Diesel
                                            <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">Call me whenever you can...</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            John Pierce
                                            <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">I got your message bro</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            Nora Silvester
                                            <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">The subject goes here</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                        </div>
                    </li>
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-warning navbar-badge">15</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-header">15 Notifications</span>
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
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                            <i class="fas fa-th-large"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $page; ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Homepage</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('peserta-didik'); ?>">Peserta Didik</a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <?= $this->renderSection('content'); ?>
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
                        ESS_v1.0.0-beta1
                    </a>
                </div>
                <!-- Default to the left -->
                <strong>&copy; 2025 | <a href="https://muhsaidlg.my.id" target="_blank">meDigital-dev</a>.</strong>
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/plugins/select2/js/select2.full.js"></script>
    <script src="/plugins/select2-inputPlaceholder/select2-searchInputPlaceholder.js"></script>
    <script src="/assets/js/adminlte.min.js"></script>
    <!-- Global Script -->
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
            $('[data-toggle="offcanvas"]').on('click', function() {
                const target = $(this).data('target');
                $(target).toggleClass('show');
            });
        });
        $('.select2').select2({
            placeholder: "Pilih...",
            theme: "bootstrap4",
        });

        $('.select2-rombelPd').select2({
            placeholder: 'Pilih rombel...',
            searchInputPlaceholder: 'Cari Nama/NIK/NIS/NISN/Rombel',
            theme: 'bootstrap4',
            ajax: {
                url: '/api/v0/rombel/get',
                method: 'GET',
                dataType: 'json',
                data: function(params) {
                    return {
                        key: params.term,
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            console.log(item);

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
                        results: []
                    };
                }
            },
            templateResult: (option) => {
                if (!option.id) {
                    return option.text;
                }
                console.log(option);

                var $option = $(
                    "<div>" +
                    "<h6 class='m-0'>" + option.text + "</h6>" +
                    "<p class='small m-0'>Tingkat: " + option.tingkat + "</p>" +
                    "</div>"
                );
                return $option;
            },
            templateSelection: (option) => {
                if (!option.id) {
                    return option.text;
                }

                var $selection = $("<div>" + option.text + "</div>");
                return $selection;
            },
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
                url: "/api/getPd",
            },
            language: {
                url: "/plugins/datatables/id.json",
            },
            columns: [{
                    data: "nama",
                    render: (data) => {
                        return `<a type="button" href="#">${data}</a>`;
                    }
                },
                {
                    data: "nis",
                    className: "text-center",
                },
                {
                    data: "nisn",
                    orderable: false,
                    className: "text-center",
                },
                {
                    data: "jk",
                    orderable: false,
                    className: 'text-center'
                },
                {
                    orderable: false,
                    data: "tempat_lahir",
                },
                {
                    data: "tanggal_lahir",
                    orderable: false,
                    className: 'text-center'
                },
                {
                    data: "dusun",
                    orderable: false,
                    render: (data, type, rows, meta) => {
                        return `${data}, ${rows.desa}, ${rows.kecamatan}`
                    }
                },
                {
                    data: "kelas",
                    className: 'text-center',
                    orderable: false,
                    render: (data) => {
                        return `<span class="badge bg-success">${data}</span>`;
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

                const total = parseInt(pageInfo.recordsTotal);
                const filter = parseInt(pageInfo.recordsDisplay);
                const totalPage = parseInt(pageInfo.pages);
                const currentPage = parseInt(pageInfo.page) + 1;
                const startPage = filter == 0 ? 0 : parseInt(pageInfo.start) + 1;
                const endPage = parseInt(pageInfo.end);

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
            });

            $('#selectPage-publicPesertaDidik').on('change', e => dtPublicPd.page(parseInt(e.target.value)).draw('page'));
            $('#btnPreviousDt-publicPesertaDidik').on('click', () => dtPublicPd.page('previous').draw('page'));
            $('#btnNextDt-publicPesertaDidik').on('click', () => dtPublicPd.page('next').draw('page'));
            $('#pageLenghtDt-publicPesertaDidik').on('change', e => dtPublicPd.page.len(e.target.value).draw('page'));
            $('#searchDt-publicPesertaDidik').on('input', e => dtPublicPd.search(e.target.value).draw('page'));
            $('#btnReloadDt-publicPesertaDidik').on('click', function() {
                const btn = $(this);
                btn.prop('disabled', true).children("i").addClass("fa-spin");
                dtPublicPd.ajax
                    .reload(null, false)
                    .on("draw", () => btn.prop('disabled', false).children("i").removeClass("fa-spin"));
            });
        });

        $('#btnFilterDt-publicPesertaDidik').click('click', () => $('.offcanvas').toggleClass('show'));
    </script>
    <!-- End Main Script -->
</body>

</html>