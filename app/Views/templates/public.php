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
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/select2/css/select2.css">
    <link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.css">
    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.css">
    <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css">
    <link rel="stylesheet" href="/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="/assets/css/adminlte.min.css">
    <link rel="stylesheet" href="/assets/css/global.css">
    <!-- MyCss -->
    <style>
        .form-label-group {
            position: relative;
            margin-bottom: 1rem;
        }

        .form-label-group input,
        .form-label-group label {
            height: 3.125rem;
            padding: .75rem;
        }

        .form-label-group label {
            position: absolute;
            top: 0;
            left: 0;
            display: block;
            width: 100%;
            margin-bottom: 0;
            /* Override default `<label>` margin */
            line-height: 1.5;
            color: #495057;
            pointer-events: none;
            cursor: text;
            /* Match the input under the label */
            border: 1px solid transparent;
            border-radius: .25rem;
            transition: all .1s ease-in-out;
        }

        .form-label-group input::-webkit-input-placeholder {
            color: transparent;
        }

        .form-label-group input::-moz-placeholder {
            color: transparent;
        }

        .form-label-group input:-ms-input-placeholder {
            color: transparent;
        }

        .form-label-group input::-ms-input-placeholder {
            color: transparent;
        }

        .form-label-group input::placeholder {
            color: transparent;
        }

        .form-label-group input:not(:-moz-placeholder-shown) {
            padding-top: 1.25rem;
            padding-bottom: .25rem;
        }

        .form-label-group input:not(:-ms-input-placeholder) {
            padding-top: 1.25rem;
            padding-bottom: .25rem;
        }

        .form-label-group input:not(:placeholder-shown) {
            padding-top: 1.25rem;
            padding-bottom: .25rem;
        }

        .form-label-group input:not(:-moz-placeholder-shown)~label {
            padding-top: .25rem;
            padding-bottom: .25rem;
            font-size: 12px;
            color: #777;
        }

        .form-label-group input:not(:-ms-input-placeholder)~label {
            padding-top: .25rem;
            padding-bottom: .25rem;
            font-size: 12px;
            color: #777;
        }

        .form-label-group input:not(:placeholder-shown)~label {
            padding-top: .25rem;
            padding-bottom: .25rem;
            font-size: 12px;
            color: #777;
        }

        .form-label-group input:-webkit-autofill~label {
            padding-top: .25rem;
            padding-bottom: .25rem;
            font-size: 12px;
            color: #777;
        }

        /* Fallback for Edge
-------------------------------------------------- */
        @supports (-ms-ime-align: auto) {
            .form-label-group {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-direction: column-reverse;
                flex-direction: column-reverse;
            }

            .form-label-group label {
                position: static;
            }

            .form-label-group input::-ms-input-placeholder {
                color: #777;
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
                            <a href="<?= base_url(); ?>" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle <?= $sidebar['parent'] == 'database' ? 'active' : ''; ?>">Database</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu shadow">
                                <li><a href="<?= base_url('peserta-didik'); ?>" class="dropdown-item <?= $sidebar['current'] == 'data-pd' ? 'active' : ''; ?>">Peserta Didik </a></li>
                                <li><a href="<?= base_url('guru'); ?>" class="dropdown-item <?= $sidebar['current'] == 'data-guru' ? 'active' : ''; ?>">Guru</a></li>
                                <li><a href="<?= base_url('pegawai'); ?>" class="dropdown-item <?= $sidebar['current'] == 'data-pegawai' ? 'active' : ''; ?>">Pegawai</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown" data-autoclose="false">Login</a>
                            <div class="dropdown-menu" style="min-width: 250px;">
                                <div class="px-3 py-2">
                                    <div class="form-label-group">
                                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
                                        <label for="inputEmail">Email address</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
                                        <label for="inputEmail">Email address</label>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-primary">Login</button>
                                </div>
                            </div>
                        </li>
                    </div>
                </div>
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
    <script src="/plugins/moment/moment-with-locales.js"></script>
    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/plugins/select2/js/select2.full.js"></script>
    <script src="/plugins/select2-searchInputPlaceholder/select2-searchInputPlaceholder.js"></script>
    <script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.js"></script>
    <script src="/plugins/inputmask/jquery.inputmask.js"></script>
    <script src="/plugins/toastr/toastr.min.js"></script>
    <script src="/plugins/fetchData/fetchData.js"></script>
    <script src="/assets/js/adminlte.min.js"></script>
    <script src="/assets/js/functions.js"></script>
    <script src="/assets/js/global.js"></script>
    <!-- function script -->
    <script>

    </script>
    <!-- end function script -->
    <!-- Global Script -->
    <script>

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
                    data: 'no',
                    className: 'text-lg-center',
                }, {
                    data: "kelas",
                    className: 'text-lg-center',
                    render: (data) => {
                        return `<span class="badge bg-success">${data}</span>`;
                    }
                }, {
                    data: "nama",
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
                    data: "jenis_kelamin",
                    orderable: false,
                    className: 'text-lg-center'
                },
                {
                    orderable: false,
                    data: "tempat_lahir",
                },
                {
                    data: "tanggal_lahir",
                    className: 'text-lg-center'
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
                allHalamanElm.text('dari ' + totalPage);
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

            $('#btnFilterDt-publicPesertaDidik').click('click', () => $('#offcanvas-filterPd').offcanvas('toggle'));
            $('#selectDt-publicPesertaDidik').on('select2:select', function() {
                console.log($(this).val());
                dtPublicPd.column(7).search($(this).val()).draw('page');
            });
        });
    </script>
    <!-- End Main Script -->
</body>

</html>