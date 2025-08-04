<div class="offcanvas offcanvas-end" id="offcanvasFilter-bukuIndukPd">
    <div class="offcanvas-header sticky-top bg-light">
        <h5 class="text-bold">Filter Data Peserta Didik</h5>
        <button class="close" data-toggle="offcanvas" data-target=".offcanvas">&times;</button>
    </div>
    <div class="offcanvas-body">
        <form id="formDt-filterPd">
            <div class="form-group row mb-2">
                <label class="col-sm-3 col-form-label">Tampilkan</label>
                <div class="col-sm-9">
                    <div class="icheck-primary form-check-inline">
                        <input class="form-check-input" type="radio" id="filterOffcanvas-bukuIndukPd_statusPdAll" name="status_pd" value="all" checked>
                        <label class="form-check-label" for="filterOffcanvas-bukuIndukPd_statusPdAll">
                            Semua
                        </label>
                    </div>
                    <div class="icheck-primary form-check-inline">
                        <input class="form-check-input" type="radio" id="filterOffcanvas-bukuIndukPd_statusPdAktif" name="status_pd" value="aktif">
                        <label class="form-check-label" for="filterOffcanvas-bukuIndukPd_statusPdAktif">
                            Aktif
                        </label>
                    </div>
                    <div class="icheck-primary form-check-inline">
                        <input class="form-check-input" type="radio" id="filterOffcanvas-bukuIndukPd_statusPdNa" name="status_pd" value="na">
                        <label class="form-check-label" for="filterOffcanvas-bukuIndukPd_statusPdNa">
                            Non Aktif
                        </label>
                    </div>
                    <div class="icheck-primary form-check-inline">
                        <input class="form-check-input" type="radio" id="filterOffcanvas-bukuIndukPd_statusPdMutasi" name="status_pd" value="mutasi">
                        <label class="form-check-label" for="filterOffcanvas-bukuIndukPd_statusPdMutasi">
                            Mutasi
                        </label>
                    </div>
                    <div class="icheck-primary form-check-inline">
                        <input class="form-check-input" type="radio" id="filterOffcanvas-bukuIndukPd_statusPdChecked" name="status_pd" value="checked">
                        <label class="form-check-label" for="filterOffcanvas-bukuIndukPd_statusPdChecked">
                            Dicentang
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="filterOffcanvas-bukuIndukPd_rombelPd" class="col-sm-3 col-form-label">Kelas</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <select class="custom-select select2-getRombel" id="filterOffcanvas-bukuIndukPd_rombelPd" name="kelas"></select>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#filterOffcanvas-bukuIndukPd_rombelPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="filterOffcanvas-bukuIndukPd_tingkatRombelPd" class="col-sm-3 col-form-label">Tingkat</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <select class="custom-select select2" id="filterOffcanvas-bukuIndukPd_tingkatRombelPd" name="tingkat">
                            <option></option>
                            <option value="7">Tingkat 7</option>
                            <option value="8">Tingkat 8</option>
                            <option value="9">Tingkat 9</option>
                        </select>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#filterOffcanvas-bukuIndukPd_tingkatRombelPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="filterOffcanvas-bukuIndukPd_namaPd" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <input type="text" class="form-control" id="filterOffcanvas-bukuIndukPd_namaPd" name="nama" placeholder="Nama peserta didik">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#filterOffcanvas-bukuIndukPd_namaPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="filterOffcanvas-bukuIndukPd_nipd" class="col-sm-3 col-form-label">NIS</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <input type="text" class="form-control" id="filterOffcanvas-bukuIndukPd_nipd" name="nipd" placeholder="NIS">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#filterOffcanvas-bukuIndukPd_nipd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="filterOffcanvas-bukuIndukPd_nisnPd" class="col-sm-3 col-form-label">NISN</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <input type="text" class="form-control" id="filterOffcanvas-bukuIndukPd_nisnPd" name="nisn" placeholder="NISN">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#filterOffcanvas-bukuIndukPd_nisnPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="filterOffcanvas-bukuIndukPd_nikPd" class="col-sm-3 col-form-label">NIK</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <input type="text" class="form-control" id="filterOffcanvas-bukuIndukPd_nikPd" name="nik" placeholder="NIK">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#filterOffcanvas-bukuIndukPd_nikPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="filterOffcanvas-bukuIndukPd_-agamaPd" class="col-sm-3 col-form-label">Agama</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <select class="custom-select select2-getReferensi" data-referensi="agama" data-placeholder="Pilih jenis agama..." id="filterOffcanvas-bukuIndukPd_-agamaPd" name="agama"></select>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#filterOffcanvas-bukuIndukPd_-agamaPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="filterOffcanvas-bukuIndukPd_namaAyahPd" class="col-sm-3 col-form-label">Ayah</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <input type="text" class="form-control" id="filterOffcanvas-bukuIndukPd_namaAyahPd" name="ayah" placeholder="Nama ayah">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#filterOffcanvas-bukuIndukPd_namaAyahPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="filterOffcanvas-bukuIndukPd_namaIbuPd" class="col-sm-3 col-form-label">Ibu</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <input type="text" class="form-control" id="filterOffcanvas-bukuIndukPd_namaIbuPd" name="ibu_kandung" placeholder="Nama ibu kandung">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#filterOffcanvas-bukuIndukPd_namaIbuPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label class="col-sm-3 col-form-label">JK</label>
                <div class="col-sm-9">
                    <div class="btn-group btn-group-toggle w-100 mb-2" data-toggle="buttons">
                        <label class="btn btn-outline-secondary active">
                            <input type="radio" name="jk" id="filterOffcanvas-bukuIndukPd_jenisKelaminAll" value="all" checked> Semua
                        </label>
                        <label class="btn btn-outline-secondary">
                            <input type="radio" name="jk" id="filterOffcanvas-bukuIndukPd_jenisKelaminL" value="L"> L
                        </label>
                        <label class="btn btn-outline-secondary">
                            <input type="radio" name="jk" id="filterOffcanvas-bukuIndukPd_jenisKelaminP" value="P"> P
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="filterOffcanvas-bukuIndukPd_tempatlahirPd" class="col-sm-3 col-form-label">Tm Lhr</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <input type="text" class="form-control" id="filterOffcanvas-bukuIndukPd_tempatLahirPd" name="tempat_lahir" placeholder="Tempat lahir">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#filterOffcanvas-bukuIndukPd_tempatLahirPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-0">
                <label for="filterOffcanvas-bukuIndukPd_tanggalLahirPd" class="col-sm-3 col-form-label">Tgl Lhr</label>
                <div class="col-sm-9">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control tanggal" id="filterOffcanvas-bukuIndukPd_tanggalLahirLengkapPd" data-inputmask-alias="datetime" placeholder="Tanggal lengkap" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                        <div class="input-group-append" data-target="#filterOffcanvas-bukuIndukPd_tanggalLahirLengkapPd" data-toggle="datetimepicker">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#filterOffcanvas-bukuIndukPd_tanggalLahirLengkapPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                        <input type="hidden" name="tanggal_lahir_lengkap">
                    </div>
                    <div class="input-group mb-2">
                        <input type="number" class="form-control" id="filterOffcanvas-bukuIndukPd_tanggalLahirPd" name="tanggal_lahir" placeholder="Tanggal Lahir">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#filterOffcanvas-bukuIndukPd_tanggalLahirPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <select type="text" class="custom-select custom-select-sm select2" id="filterOffcanvas-bukuIndukPd_bulanLahirPd" name="bulan_lahir" data-placeholder="Pilih Bulan">
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
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#filterOffcanvas-bukuIndukPd_bulanLahirPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <input type="number" class="form-control" id="filterOffcanvas-bukuIndukPd_tahunLahirPd" name="tahun_lahir" placeholder="Tahun">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#filterOffcanvas-bukuIndukPd_tahunLahirPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-0">
                <label for="filterOffcanvas-bukuIndukPd_usiaPdAwal" class="col-sm-3 col-form-label">Usia</label>
                <div class="col-sm-9">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Min</span>
                        </div>
                        <input type="number" class="form-control" id="filterOffcanvas-bukuIndukPd_usiaPdAwal" name="usia_awal" placeholder="Usia minimal">
                        <div class="input-group-append">
                            <span class="input-group-text">tahun</span>
                        </div>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#filterOffcanvas-bukuIndukPd_usiaPdAwal','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Max</span>
                        </div>
                        <input type="number" class="form-control" id="filterOffcanvas-bukuIndukPd_usiaPdAkhir" name="usia_akhir" placeholder="Usia maksimal">
                        <div class="input-group-append">
                            <span class="input-group-text">tahun</span>
                        </div>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#filterOffcanvas-bukuIndukPd_usiaPdAkhir','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mb-0 row">
                <label for="filterOffcanvas-bukuIndukPd_dusunPd" class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-9">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="filterOffcanvas-bukuIndukPd_dusunPd" name="dusun" placeholder="Nama dusun">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#filterOffcanvas-bukuIndukPd_dusunPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="filterOffcanvas-bukuIndukPd_desaPd" name="desa" placeholder="Nama desa">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#filterOffcanvas-bukuIndukPd_desaPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="filterOffcanvas-bukuIndukPd_kecamatanPd" name="kecamatan" placeholder="Nama kecamatan">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#filterOffcanvas-bukuIndukPd_kecamatanPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-0">
                <label for="filterOffcanvas-bukuIndukPd_-jenisMutasiPd" class="col-sm-3 col-form-label">Keluar</label>
                <div class="col-sm-9">
                    <div class="input-group mb-2">
                        <select class="custom-select select2-getReferensi" data-referensi="jenisMutasi" data-placeholder="Pilih jenis mutasi..." name="jenis_mutasi" id="filterOffcanvas-bukuIndukPd_-jenisMutasiPd"></select>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#filterOffcanvas-bukuIndukPd_-jenisMutasiPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <input type="number" class="form-control" id="filterOffcanvas-bukuIndukPd_tahunMutasiPd" placeholder="Tahun Mutasi" name="tahun_mutasi">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#filterOffcanvas-bukuIndukPd_tahunMutasiPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-0">
                <label for="filterOffcanvas-bukuIndukPd_-jenisRegistrasiPd" class="col-sm-3 col-form-label">Registrasi</label>
                <div class="col-sm-9">
                    <div class="input-group mb-2">
                        <select class="custom-select select2-getReferensi" data-referensi="jenisRegistrasi" data-placeholder="Pilih jenis registrasi..." id="filterOffcanvas-bukuIndukPd_-jenisRegistrasiPd" name="jenis_registrasi"></select>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#filterOffcanvas-bukuIndukPd_-jenisRegistrasiPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <input type="number" class="form-control" id="filterOffcanvas-bukuIndukPd_tahunRegistrasiPd" placeholder="Tahun registrasi" name="tahun_registrasi">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#filterOffcanvas-bukuIndukPd_tahunRegistrasiPd','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-0">
                <label for="filterOffcanvas-bukuIndukPd_-agamaPd" class="col-sm-3 col-form-label">Difabel</label>
                <div class="col-sm-9">
                    <div class="btn-group btn-group-toggle w-100 mb-2" data-toggle="buttons">
                        <label class="btn btn-outline-secondary active">
                            <input type="radio" name="status_difabel" id="filterOffcanvas-bukuIndukPd_statusDifableAll" value="all" checked> Semua
                        </label>
                        <label class="btn btn-outline-secondary">
                            <input type="radio" name="status_difabel" id="filterOffcanvas-bukuIndukPd_statusDifableTrue" value="true"> Ya
                        </label>
                        <label class="btn btn-outline-secondary">
                            <input type="radio" name="status_difabel" id="filterOffcanvas-bukuIndukPd_statusDifableFalse" value="false"> Tidak
                        </label>
                    </div>
                    <div class="input-group mb-2 w-100">
                        <select class="custom-select select2-getReferensi" multiple data-referensi="jenisKebutuhanKhusus" data-placeholder="Pilih jenis difabel..." id="filterOffcanvas-bukuIndukPd_jenisDifabel" name="jenis_difabel"></select>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#filterOffcanvas-bukuIndukPd_jenisDifabel','#dtPublic-pesertaDidik');"><i class="fas fa-eraser"></i></button>
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