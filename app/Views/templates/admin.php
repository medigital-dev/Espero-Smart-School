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
    <link rel="stylesheet" href="/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="/plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="/assets/css/adminlte.min.css">
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
                <i class="fab fa-centos mr-1 fa-fw"></i>
                <span class="brand-text font-weight-light">SISPADU</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
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
                        <li class="nav-item">
                            <a href="<?= base_url('data/buku-induk'); ?>" class="nav-link <?= $sidebar == 'buku-induk' ? 'active' : ''; ?>">
                                <i class="fas fa-book-open nav-icon"></i>
                                <p>Buku Induk</p>
                            </a>
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
                            <h1><?= $name; ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('peserta-didik'); ?>">Peserta Didik</a></li>
                                <li class="breadcrumb-item active">Buku Induk</li>
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
    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/plugins/toastr/toastr.min.js"></script>
    <script src="/plugins/sweetalert2/sweetalert2.js"></script>
    <script src="/assets/js/adminlte.min.js"></script>
    <!-- functions -->
    <script>
        function toast(message, type = 'info', delay = 5000) {
            let closeButton = false;
            if (delay == 0) closeButton = true;
            toastr.options = {
                timeOut: delay,
                closeButton: closeButton,
                progressBar: true,
            };

            switch (type) {
                case 'info':
                    toastr.info(message);
                    break;

                case 'success':
                    toastr.success(message);
                    break;

                case 'warning':
                    toastr.warning(message);
                    break;

                case 'error':
                    toastr.error(message);
                    break;

                default:
                    toastr.info(message);
                    break;
            }
        }

        function errorHandle(err) {
            if (err.responseJSON && err.responseJSON.message) {
                toast(err.responseJSON.message, "error", 0);
            } else if (err.code === 400) {
                toast(err.messages, "error", 0);
            } else if (err.code === 500 || err.status === 400) {
                toast(
                    err.responseJSON ? err.responseJSON.messages.error : "Error server",
                    "error", 0
                );
            } else {
                toast("An error occurred", "error", 0);
            }
        }

        function validationElm(elm = [], invalidIf = [], errorMessage = null) {
            let check = [];
            if (errorMessage == null) errorMessage = 'Invalid Field.';
            elm.forEach(function(item) {
                if (invalidIf.includes($(item).val())) {
                    check.push($(item).val());
                    $(item).addClass('is-invalid');
                } else $(item).removeClass('is-invalid');
            })
            if (check.length !== 0) {
                toast(errorMessage, 'error');
                return false;
            }
            $('.is-invalid').removeClass('is-invalid');
            return true;
        }
    </script>
    <!-- end functions -->
    <!-- toastr config -->
    <script>
    </script>
    <!-- end toastr config -->
    <!-- Global Script -->
    <script>
        $(document).ready(function() {
            $('#btnReloadTable').on('click', function() {
                $(this).children('i').addClass('fa-spin');
                $('.table').DataTable().ajax.reload(null, false).on('draw', () => $(this).children('i').removeClass('fa-spin'));
            });
            $('#checkAllRow').on('click', function() {
                const isChecked = $(this).is(':checked');
                $('.dtCheckbox').prop('checked', isChecked);
            });
        })
    </script>
    <!-- End Global Script -->
    <script>
        $(document).ready(function() {
            const tableBukuIndukPesertaDidik = $('#tableBukuIndukPesertaDidik').DataTable({
                dom: '<t><"d-flex justify-content-between"ip>',
                processing: true,
                pagingType: "simple",
                responsive: true,
                fixedHeader: true,
                ordering: false,
                ajax: {
                    method: "POST",
                    url: "/api/v0/buku-induk/getTable",
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
                        data: "nis",
                        className: "text-center",
                    },
                    {
                        data: "nisn",
                        className: "text-center",
                    },
                    {
                        data: "jk",
                        className: 'text-center'
                    },
                    {
                        data: "tempatLahir",
                    },
                    {
                        data: "tanggalLahir",
                        className: 'text-center'
                    },
                    {
                        data: "tanggalRegistrasi",
                        className: 'text-center'
                    },
                    {
                        data: "jenisRegistrasi",
                        className: 'text-center'
                    },
                    {
                        data: "status",
                        className: 'text-center'
                    },
                ],
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

            $('#btnSinkronPdDapodik').on('click', function() {
                const btn = $(this);
                btn.prop('disabled', true).children('i').addClass('fa-spin');
                $.post('/api/v0/peserta-didik/baru/get', r => {
                        toast(r.message);
                        tabelPesertaDidikBaru.ajax.reload(null, false);
                    })
                    .fail(err => errorHandle(err))
                    .always(() => btn.prop('disabled', false).children('i').removeClass('fa-spin'));
            });
        });
    </script>
</body>

</html>