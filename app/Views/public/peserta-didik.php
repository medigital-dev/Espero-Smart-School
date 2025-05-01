<?= $this->extend('templates/public'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col" id="tabelColumn">
        <div class="card">
            <div class="card-body">
                <div class="btn-toolbar mb-2">
                    <div class="input-group input-group-sm my-1 mr-1">
                        <div class="input-group-prepend">
                            <span for="pageLenghtDt-publicPesertaDidik" class="input-group-text">Page</span>
                        </div>
                        <select id="pageLenghtDt-publicPesertaDidik" class="custom-select">
                            <option value="5">5</option>
                            <option value="15">15</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-primary" data-toggle="tooltip" data-title="Muat ulang tabel" id="btnReloadDt-publicPesertaDidik"><i class="fas fa-redo-alt fa-fw"></i></button>
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-primary dropdown-toggle btn-tooltip" data-toggle="dropdown" data-title="Unduh Tabel berserta Filter" id="btnDropdown-unduhPd"><i class="fas fa-download fa-fw"></i></button>
                        <div class="dropdown-menu">
                            <button type="button" class="dropdown-item" id="btnUnduhExcel-publicPesertaDidik"><i class="fas fa-file-excel fa-fw mr-1"></i> Unduh Excel</button>
                        </div>
                    </div>
                    <div class="my-1 mr-1 ml-lg-auto">
                        <input class="form-control form-control-sm" type="text" id="searchDt-publicPesertaDidik" data-toggle="tooltip" data-title="Pencarian Nama/NIS/NISN/Kelas" placeholder="Cari..." aria-label="Search">
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-1" role="group">
                        <button type="button" class="btn btn-primary" data-toggle="tooltip" data-title="Filter data Peserta Didik" id="btnFilterDt-publicPesertaDidik"><i class="fas fa-filter fa-fw"></i></button>
                    </div>
                </div>
                <table class="table table-bordered table-hover w-100 mb-2" id="dtPublic-pesertaDidik">
                    <thead>
                        <tr>
                            <th class="table-primary align-middle text-center">No</th>
                            <th class="table-primary align-middle text-center">Kelas</th>
                            <th class="table-primary align-middle text-center">Nama</th>
                            <th class="table-primary align-middle text-center">NIS</th>
                            <th class="table-primary align-middle text-center">NISN</th>
                            <th class="table-primary align-middle text-center">Jenis Kelamin</th>
                            <th class="table-primary align-middle text-center">Tempat Lahir</th>
                            <th class="table-primary align-middle text-center">Tanggal Lahir</th>
                            <th class="table-primary align-middle text-center">Ibu Kandung</th>
                            <th class="table-primary align-middle text-center">Alamat</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <div class="row">
                    <div class="col-sm-4 mb-2">
                        <p class="text-center text-sm-left m-0" id="dtPageInfo-publicPesertaDidik"></p>
                    </div>
                    <div class="col-sm-auto ml-auto mb-2">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="button" id="btnPreviousDt-publicPesertaDidik"><i class="fas fa-chevron-left"></i></button>
                            </div>
                            <div class="input-group-prepend">
                                <span class="input-group-text">Halaman</span>
                            </div>
                            <select class="custom-select" id="selectPage-publicPesertaDidik"></select>
                            <div class="input-group-append">
                                <span class="input-group-text" id="dtPageInfo-allHalaman"></span>
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="btnNextDt-publicPesertaDidik"><i class="fas fa-chevron-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
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
                <label for="selectDt-rombelPd" class="col-sm-3 col-form-label">Kelas</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <select class="custom-select select2-rombelPd" id="selectDt-rombelPd"></select>
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
                <label for="inputDt-namaIbuPd" class="col-sm-3 col-form-label">Ibu Kdg</label>
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
                <label for="inputEmail3" class="col-sm-3 col-form-label">JK</label>
                <div class="col-sm-9">
                    <div class="icheck-primary">
                        <input class="form-check-input" type="radio" id="radioDt-jkPdL" name="radioDt-jkPd" value="L">
                        <label class="form-check-label" for="radioDt-jkPdL">
                            Laki-laki
                        </label>
                    </div>
                    <div class="icheck-primary">
                        <input class="form-check-input" type="radio" id="chckboxDt-jkPdP" name="radioDt-jkPd" value="P">
                        <label class="form-check-label" for="chckboxDt-jkPdP">
                            Perempuan
                        </label>
                    </div>
                    <div class="icheck-primary">
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
        </form>
        <hr>
        <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="offcanvas" data-target=".offcanvas">Tutup</button>
            <button type="button" class="btn btn-sm btn-danger" id="btnReset-filterPd">Reset Semua Filter</button>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>