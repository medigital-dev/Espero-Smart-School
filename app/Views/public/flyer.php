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
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/css/adminlte.min.css'); ?>">
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

                <button type="button" class="btn btn-sm btn-primary">Login</button>
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
                                    <form id="formPrestasi-tambahPrestasi">
                                        <div class="form-row">
                                            <div class="col-lg-10">
                                                <div class="form-group">
                                                    <label for="formPrestasi-namaPd">Nama Murid</label>
                                                    <select name="peserta_didik_id" id="formPrestasi-namaPd" class="custom-select select2-getPd"></select>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="formPrestasi-tahun">Tahun</label>
                                                    <input type="text" class="form-control onlyInt" id="formPrestasi-tahun" value="<?= date('Y'); ?>" name="tahun">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="formPrestasi-juaraKe">Juara ke-</label>
                                                    <input type="text" class="form-control onlyInt" id="formPrestasi-juaraKe" name="kode">
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label for="formPrestasi-cabang">Cabang Lomba</label>
                                                    <input type="text" class="form-control onlyInt" id="formPrestasi-cabang" name="cabang">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="formPrestasi-namaPd">Tingkat Prestasi</label>
                                                    <select name="peserta_didik_id" id="formPrestasi-tingkat" class="custom-select select2-getPd"></select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="formPrestasi-namaPd">Bidang Prestasi</label>
                                                    <select name="peserta_didik_id" id="formPrestasi-bidang" class="custom-select select2-getPd"></select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="formPrestasi-namaKejuaraan">Nama Kejuaraan/ Event</label>
                                            <textarea type="text" class="form-control" id="formPrestasi-namaKejuaraan" name="nama" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="formPrestasi-namaKejuaraan">Penyelenggara</label>
                                            <textarea type="text" class="form-control" id="formPrestasi-namaKejuaraan" name="nama" rows="2"></textarea>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-lg-6 mb-3">
                                                <label for="formPrestasi-fotoJuara">Foto Kejuaraan</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="formPrestasi-fotoJuara">
                                                    <label class="custom-file-label" for="formPrestasi-fotoJuara">Choose file</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="formPrestasi-fotoPiagam">Foto Piagam</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="formPrestasi-fotoPiagam">
                                                    <label class="custom-file-label" for="formPrestasi-fotoPiagam">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <button type="button" class="btn btn-primary">Simpan</button>
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
                <strong><a href="https://muhsaidlg.my.id" target="_blank">&copy; 2025</a> | Tim IT & Digitalisasi Sekolah.</strong>
            </div>
        </footer>
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
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/js/adminlte.min.js'); ?>"></script>
    <!-- myScript -->
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
        });
    </script>
</body>

</html>