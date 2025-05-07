<?= $this->extend('templates/admin'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12" id="tabelColumn">
        <div class="card">
            <div class="card-body">
                <div class="btn-toolbar mb-2">
                    <div class="input-group input-group-sm my-1 mr-2">
                        <select id="pageLenghtDt-bukuInduk" class="custom-select" data-toggle="tooltip" data-title="Jumlah data yang ditampilkan">
                            <option value="5">5</option>
                            <option value="15">15</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <div class="input-group-append">
                            <span for="pageLenghtDt-bukuInduk" class="input-group-text">entri</span>
                        </div>
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-primary" data-toggle="tooltip" data-title="Reload Tabel" id="btnReloadTable"><i class="fas fa-redo-alt fa-fw"></i></button>
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-primary" data-toggle="tooltip" data-title="Sinkron dengan Dapodik" id="btnSinkronPdDapodik"><i class="fas fa-sync-alt fa-fw"></i></button>
                        <button type="button" class="btn btn-primary btn-tooltip" data-title="Import Dapodik" data-target="#modalImportDapodik" data-toggle="modal"><i class="fas fa-file-import fa-fw"></i></button>
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-primary dropdown-toggle btn-tooltip" data-toggle="dropdown" data-title="Unduhan" id="btnDropdown-unduhPd" data-autoclose="false"><i class="fas fa-download fa-fw"></i></button>
                        <div class="dropdown-menu">
                            <button type="button" class="dropdown-item" data-toggle="tooltip" data-title="Unduh tabel beserta filter" id="btnUnduhExcel-bukuIndukPd"><i class="fas fa-file-excel fa-fw mr-1"></i><span>Unduh Excel</span></button>
                        </div>
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-primary" data-toggle="tooltip" data-title="Mutasi"><i class="fas fa-people-arrows fa-fw"></i></button>
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-primary" data-toggle="tooltip" data-title="Cetak Buku Induk"><i class="fas fa-print fa-fw"></i></button>
                    </div>
                    <div class="my-1 mr-1 ml-sm-auto">
                        <input class="form-control form-control-sm" type="text" id="searchDt-bukuInduk" data-toggle="tooltip" data-title="Pencarian Nama/NIS/NISN/Kelas" placeholder="Cari..." aria-label="Search">
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-1" role="group">
                        <button type="button" class="btn btn-primary btn-tooltip" data-toggle="offcanvas" data-title="Filter Data" data-target=".offcanvas" id="btnFilter-bukuIndukPd"><i class="fas fa-filter fa-fw"></i></button>
                    </div>
                    <div class="input-group input-group-sm my-1" role="group">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary btnPreviousDt-bukuInduk" data-toggle="tooltip" data-title="Halaman sebelumnya" type="button"><i class="fas fa-chevron-left"></i></button>
                        </div>
                        <div class="input-group-prepend">
                            <span class="input-group-text text-currentPage"></span>
                        </div>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary btnNextDt-bukuInduk" data-toggle="tooltip" data-title="Halaman selanjutnya" type="button"><i class="fas fa-chevron-right"></i></button>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-hover w-100 mb-2" id="dtAdmin-bukuIndukPd">
                    <thead>
                        <tr>
                            <th class="table-primary align-middle text-center" style="width: 10px;">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="checkAllRow">
                                    <label for="checkAllRow" class="custom-control-label"></label>
                                </div>
                            </th>
                            <th class="table-primary align-middle text-center">Status</th>
                            <th class="table-primary align-middle text-center">Nama</th>
                            <th class="table-primary align-middle text-center">NIS</th>
                            <th class="table-primary align-middle text-center">NISN</th>
                            <th class="table-primary align-middle text-center">NIK</th>
                            <th class="table-primary align-middle text-center">Jenis Kelamin</th>
                            <th class="table-primary align-middle text-center">Tempat Lahir</th>
                            <th class="table-primary align-middle text-center">Tanggal Lahir</th>
                            <th class="table-primary align-middle text-center">Agama</th>
                            <th class="table-primary align-middle text-center">Alamat</th>
                            <th class="table-primary align-middle text-center">Nomor HP</th>
                            <th class="table-primary align-middle text-center">Nama Ayah</th>
                            <th class="table-primary align-middle text-center">Nama Ibu</th>
                            <th class="table-primary align-middle text-center">Jenis Registrasi</th>
                            <th class="table-primary align-middle text-center">Tahun Registrasi</th>
                            <th class="table-primary align-middle text-center">Jenis Mutasi</th>
                            <th class="table-primary align-middle text-center">Tanggal Mutasi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <div class="row mt-2">
                    <div class="col-sm-4 mb-2">
                        <p class="text-center text-sm-left m-0" id="dtPageInfo-bukuInduk"></p>
                    </div>
                    <div class="col-sm-auto ml-auto mb-2">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary btnPreviousDt-bukuInduk" type="button"><i class="fas fa-chevron-left"></i></button>
                            </div>
                            <div class="input-group-prepend">
                                <span class="input-group-text">Halaman:</span>
                            </div>
                            <select class="custom-select" id="selectPage-bukuInduk"></select>
                            <div class="input-group-append">
                                <span class="input-group-text" id="dtPageInfo-totalHalaman"></span>
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary btnNextDt-bukuInduk" type="button"><i class="fas fa-chevron-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalImportDapodik" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalImportDapodikLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalImportDapodikLabel">Import File Dapodik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputFile" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                        <label class="custom-file-label" for="inputFile">Pilih file</label>
                    </div>
                    <small id="fileHelp" class="form-text text-muted">Pilih file excel hasil unduh daftar peserta didik di Aplikasi Dapodik</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnRun-ImportDapodik">Import</button>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end" id="offcanvas-filterPd">
    <div class="offcanvas-header sticky-top bg-light">
        <h5 class="text-bold">Filter Data Peserta Didik</h5>
        <button class="close" data-toggle="offcanvas" data-target=".offcanvas">&times;</button>
    </div>
    <div class="offcanvas-body">
        <form id="formDt-filterPd">
            <div class="form-group row mb-2">
                <label class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-9">
                    <div class="icheck-primary form-check-inline">
                        <input class="form-check-input" type="radio" id="radioDt-statusPdAll" name="radioDt-statusPd" value="all" checked>
                        <label class="form-check-label" for="radioDt-statusPdAll">
                            Semua
                        </label>
                    </div>
                    <div class="icheck-primary form-check-inline">
                        <input class="form-check-input" type="radio" id="chckboxDt-statusPdAktif" name="radioDt-statusPd" value="aktif">
                        <label class="form-check-label" for="chckboxDt-statusPdAktif">
                            Aktif
                        </label>
                    </div>
                    <div class="icheck-primary form-check-inline">
                        <input class="form-check-input" type="radio" id="chckboxDt-statusPdMutasi" name="radioDt-statusPd" value="mutasi">
                        <label class="form-check-label" for="chckboxDt-statusPdMutasi">
                            Mutasi
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="selectDt-rombelPd" class="col-sm-3 col-form-label">Kelas</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <select class="custom-select select2-getRombel" id="selectDt-rombelPd"></select>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#selectDt-rombelPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="selectDt-tingkatRombelPd" class="col-sm-3 col-form-label">Tingkat</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <select class="custom-select select2" id="selectDt-tingkatRombelPd">
                            <option></option>
                            <option value="7">Tingkat 7</option>
                            <option value="8">Tingkat 8</option>
                            <option value="9">Tingkat 9</option>
                        </select>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#selectDt-tingkatRombelPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="inputDt-namaPd" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputDt-namaPd" placeholder="Nama peserta didik">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#inputDt-namaPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="inputDt-nisPd" class="col-sm-3 col-form-label">NIS</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputDt-nisPd" placeholder="NIS">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#inputDt-nisPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="inputDt-nisnPd" class="col-sm-3 col-form-label">NISN</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputDt-nisnPd" placeholder="NISN">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#inputDt-nisnPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="inputDt-nikPd" class="col-sm-3 col-form-label">NIK</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputDt-nikPd" placeholder="NIK">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#inputDt-nikPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="selectDt-agamaPd" class="col-sm-3 col-form-label">Agama</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <select class="custom-select select2-getReferensi" data-referensi="agama" data-placeholder="Pilih jenis agama..." id="selectDt-agamaPd"></select>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#selectDt-agamaPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="inputDt-namaAyahPd" class="col-sm-3 col-form-label">Ayah</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputDt-namaAyahPd" placeholder="Nama ayah">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#inputDt-namaAyahPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="inputDt-namaIbuPd" class="col-sm-3 col-form-label">Ibu</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputDt-namaIbuPd" placeholder="Nama ibu kandung">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#inputDt-namaIbuPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label class="col-sm-3 col-form-label">JK</label>
                <div class="col-sm-9">
                    <div class="icheck-primary form-check-inline">
                        <input class="form-check-input" type="radio" id="radioDt-jkPdL" name="radioDt-jkPd" value="L">
                        <label class="form-check-label" for="radioDt-jkPdL">
                            L
                        </label>
                    </div>
                    <div class="icheck-primary form-check-inline">
                        <input class="form-check-input" type="radio" id="chckboxDt-jkPdP" name="radioDt-jkPd" value="P">
                        <label class="form-check-label" for="chckboxDt-jkPdP">
                            P
                        </label>
                    </div>
                    <div class="icheck-primary form-check-inline">
                        <input class="form-check-input" type="radio" id="chckboxDt-jkPdAll" name="radioDt-jkPd" value="all" checked>
                        <label class="form-check-label" for="chckboxDt-jkPdAll">
                            Semua
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="inputDt-tempatlahirPd" class="col-sm-3 col-form-label">Tm Lhr</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputDt-tempatLahirPd" placeholder="Tempat lahir">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#inputDt-tempatLahirPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-0">
                <label for="inputDt-tanggalLahirPd" class="col-sm-3 col-form-label">Tgl Lhr</label>
                <div class="col-sm-9">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="inputDt-tanggalLahirLengkapPd" data-inputmask-alias="datetime" placeholder="Tanggal lengkap" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                        <div class="input-group-append" data-target="#inputDt-tanggalLahirLengkapPd" data-toggle="datetimepicker">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#inputDt-tanggalLahirLengkapPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <input type="number" class="form-control" id="inputDt-tanggalLahirPd" placeholder="Tanggal Lahir">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#inputDt-tanggalLahirPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <select type="text" class="custom-select custom-select-sm select2" id="inputDt-bulanLahirPd" data-placeholder="Pilih Bulan">
                            <option></option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#inputDt-bulanLahirPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <input type="number" class="form-control" id="inputDt-tahunLahirPd" placeholder="Tahun">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#inputDt-tahunLahirPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-0">
                <label for="inputDt-usiaPdAwal" class="col-sm-3 col-form-label">Usia</label>
                <div class="col-sm-9">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Min</span>
                        </div>
                        <input type="number" class="form-control" id="inputDt-usiaPdAwal" placeholder="Usia minimal">
                        <div class="input-group-append">
                            <span class="input-group-text">tahun</span>
                        </div>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#inputDt-usiaPdAwal','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Max</span>
                        </div>
                        <input type="number" class="form-control" id="inputDt-usiaPdAkhir" placeholder="Usia maksimal">
                        <div class="input-group-append">
                            <span class="input-group-text">tahun</span>
                        </div>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#inputDt-usiaPdAkhir','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mb-0 row">
                <label for="inputDt-dusunPd" class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-9">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="inputDt-dusunPd" placeholder="Nama dusun">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#inputDt-dusunPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="inputDt-desaPd" placeholder="Nama desa">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#inputDt-desaPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="inputDt-kecamatanPd" placeholder="Nama kecamatan">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#inputDt-kecamatanPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="selectDt-jenisMutasiPd" class="col-sm-3 col-form-label">Mutasi</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <select class="custom-select select2-getReferensi" data-referensi="jenisMutasi" data-placeholder="Pilih jenis mutasi..." id="selectDt-jenisMutasiPd"></select>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#selectDt-jenisMutasiPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-0">
                <label for="selectDt-jenisRegistrasiPd" class="col-sm-3 col-form-label">Registrasi</label>
                <div class="col-sm-9">
                    <div class="input-group mb-2">
                        <select class="custom-select select2-getReferensi" data-referensi="jenisRegistrasi" data-placeholder="Pilih jenis registrasi..." id="selectDt-jenisRegistrasiPd"></select>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#selectDt-jenisRegistrasiPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <input type="number" class="form-control" id="inputDt-tahunRegistrasiPd" placeholder="Tahun registrasi">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#inputDt-tahunRegistrasiPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <hr>
        <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="offcanvas" data-target=".offcanvas">Tutup</button>
            <button type="button" class="btn btn-sm btn-danger" id="btnReset-filterPd">Reset Semua Filter</button>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>