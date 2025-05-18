<div class="offcanvas offcanvas-end" id="offcanvasFilter-bukuIndukPd">
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