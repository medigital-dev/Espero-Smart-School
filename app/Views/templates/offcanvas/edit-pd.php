<div class="offcanvas offcanvas-end" id="offcanvasEdit-dataPd">
    <div class="offcanvas-header sticky-top bg-light">
        <div class="d-flex align-items-center">
            <div class="mr-2 photo-profile">
                <a href="<?= base_url('assets/img/users/_default.png'); ?>" data-fancybox>
                    <img src="<?= base_url('assets/img/users/_default.png'); ?>" class=" img-thumbnail img-circle" alt="Default user photo">
                </a>
            </div>
            <h5 class="text-bold">Data Peserta Didik</h5>
        </div>
        <button class="close" data-toggle="offcanvas" data-target=".offcanvas">&times;</button>
    </div>
    <div class="offcanvas-body pt-0">
        <div class="overlay-wrapper">
            <div class="overlay d-none"><i class="fas fa-spinner fa-spin"></i></div>
            <input type="hidden" name="peserta_didik_id" id="detailPd-id">
            <div class="d-flex align-items-start pt-3">
                <div class="nav flex-column nav-tabs h-100 mr-3 pt-0 sticky-top" id="tabs-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active btn-tooltip idPd" data-placement="right" title="Profil" id="tabs-profil-tab" data-toggle="tab" href="#tabs-profile" role="tab" aria-controls="tabs-profil" aria-selected="true"><i class="fas fa-id-card-alt fa-fw"></i></a>
                    <a class="nav-link btn-tooltip idPd" data-placement="right" title="Identitas" id="tabs-identitas-tab" data-toggle="tab" href="#tabs-identitas" role="tab" aria-controls="tabs-identitas" aria-selected="true"><i class="fas fa-user-alt fa-fw"></i></a>
                    <a class="nav-link btn-tooltip idPd" data-placement="right" title="Alamat" id="tabs-alamat-tab" data-toggle="tab" href="#tabs-alamat" role="tab" aria-controls="tabs-alamat" aria-selected="true"><i class="fas fa-map-marked-alt fa-fw"></i></a>
                </div>
                <div class="tab-content w-100" id="tabs-tabContent">
                    <div class="tab-pane fade" id="tabs-identitas" role="tabpanel" aria-labelledby="tabs-identitas-tab">
                        <div class="py-2 sticky-top align-items-center border-bottom bg-white d-flex justify-content-between mb-2">
                            <h6 class="text-bold m-0">Identitas</h6>
                            <button class="btn btn-sms btn-link" data-toggle="tooltip" data-title="Simpan" id="btnSave-identitasPd"><i class="fas fa-save"></i></button>
                        </div>
                        <form id="formData-tabsIdentitas">
                            <div class="form-group mb-2">
                                <label class="small mb-1" for="tabsIdentitas-nama">Nama</label>
                                <textarea name="nama" id="tabsIdentitas-nama" class="form-control" rows="2"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsIdentitas-jenisKelamin" class="small mb-1">Jenis Kelamin</label>
                                <select class="custom-select select2 mb-2 select2-getReferensi" data-referensi="jenisKelamin" id="tabsIdentitas-jenisKelamin" name="jenis_kelamin"></select>
                            </div>
                            <div class="form-group mb-2">
                                <label class="small mb-1" for="tabsIdentitas-tempatLahir">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tabsIdentitas-tempatLahir" name="tempat_lahir">
                            </div>
                            <div class="form-group mb-2">
                                <label class="small mb-1" for="tabsIdentitas-tanggalLahir">Tanggal Lahir</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="tabsIdentitas-tanggalLahir" data-inputmask-alias="datetime" placeholder="Tanggal Lahir" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                    <div class="input-group-append" data-target="#tabsIdentitas-tanggalLahir" data-toggle="datetimepicker">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                </div>
                                <input type="hidden" id="tabsIdentitas-tanggalLahirDb" name="tanggal_lahir">
                            </div>
                            <div class="form-group mb-2">
                                <label class="small mb-1" for="tabsIdentitas-nisn" aria-describedby="nisnHelp">NISN</label>
                                <input type="text" class="form-control" id="tabsIdentitas-nisn" name="nisn">
                                <small id="nisnHelp" class="form-text text-muted">Nomor Induk Siswa Nasional</small>
                            </div>
                            <div class="form-group mb-2">
                                <label class="small mb-1" for="tabsIdentitas-nomorAkte">Nomor Akte Kelahiran</label>
                                <input type="text" class="form-control" id="tabsIdentitas-nomorAkte" name="nomor_akte" aria-describedby="nomorAkteHelp">
                                <small id="nomorAkteHelp" class="form-text text-muted">Nomor registrasi akte kelahiran</small>
                            </div>
                            <div class="form-group mb-2">
                                <label class="small mb-1" for="tabsIdentitas-nik">NIK</label>
                                <input type="text" class="form-control" id="tabsIdentitas-nik" name="nik" aria-describedby="nikHelp">
                                <small id="nikHelp" class="form-text text-muted">Nomor Induk Kependudukan</small>
                            </div>
                            <div class="form-group mb-2">
                                <label class="small mb-1" for="tabsIdentitas-nomorKk">Nomor KK</label>
                                <input type="text" class="form-control" id="tabsIdentitas-nomorKk" name="nomor_kk" aria-describedby="noKKHelp">
                                <small id="noKKHelp" class="form-text text-muted">Nomor Kartu Kependudukan</small>
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsIdentitas-agama" class="small mb-1">Agama</label>
                                <select class="custom-select select2 mb-2 select2-getReferensi" data-referensi="agama" id="tabsIdentitas-agama" name="agama_id"></select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsIdentitas-photoProfil" class="small mb-1">Pass Foto</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="tabsIdentitas-photoProfil" name="foto_id" accept="image/jpg, image/jpeg, image/png">
                                    <label class="custom-file-label" for="tabsIdentitas-photoProfil">Pilih berkas</label>
                                </div>
                            </div>
                            <div id="previewPassfoto" class="d-none text-center mb-2">
                                <img src="#" alt="preview" class="rounded rounded-lg" width="80%">
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade active show" id="tabs-profile" role="tabpanel" aria-labelledby="tabs-profile-tab">
                        <div class="text-center mb-3" id="tabsProfile-foto">
                            <a href="<?= base_url('assets/img/users/_default.png'); ?>" data-fancybox>
                                <img src="<?= base_url('assets/img/users/_default.png'); ?>" class="rounded rounded-lg" height="125" alt="Default user photo">
                            </a>
                        </div>
                        <h3 class="profile-username text-center" id="tabsProfile-nama"></h3>
                        <div class="text-center w-100 d-flex justify-content-center mb-3">
                            <span data-toggle="tooltip" data-title="Status" class="badge bg-success mx-1" id="tabsProfile-status"></span>
                            <span data-toggle="tooltip" data-title="NIS" class="badge bg-primary mx-1" id="tabsProfile-nipd"></span>
                            <span data-toggle="tooltip" data-title="NISN" class="badge bg-danger mx-1" id="tabsProfile-nisn"></span>
                        </div>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <strong>Jenis Kelamin</strong> <a class="float-right" id="tabsProfile-jk"></a>
                            </li>
                            <li class="list-group-item">
                                <strong>Tmp Lahir</strong> <a class="float-right" id="tabsProfile-tempatLahir"></a>
                            </li>
                            <li class="list-group-item">
                                <strong>Tgl Lahir</strong> <a class="float-right" id="tabsProfile-tanggalLahir"></a>
                            </li>
                            <li class="list-group-item">
                                <strong>NIK</strong> <a class="float-right" id="tabsProfile-nik"></a>
                            </li>
                            <li class="list-group-item">
                                <strong>Ibu</strong> <a class="float-right" id="tabsProfile-ibu"></a>
                            </li>
                            <li class="list-group-item">
                                <strong>HP</strong> <a class="float-right" id="tabsProfile-hp"></a>
                            </li>
                            <li class="list-group-item">
                                <strong>Alamat</strong> <a class="float-right" id="tabsProfile-alamat"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="tabs-alamat" role="tabpanel" aria-labelledby="tabs-alamat-tab">
                        <div class="py-2 sticky-top align-items-center border-bottom bg-white d-flex justify-content-between mb-2">
                            <h6 class="text-bold m-0">Alamat</h6>
                            <button class="btn btn-sms btn-link" data-toggle="tooltip" data-title="Simpan" id="btnSave-alamatPd"><i class="fas fa-save"></i></button>
                        </div>
                        <form id="formData-tabsAlamat">
                            <div class="form-group mb-2">
                                <label class="small mb-1" for="tabsAlamat-nama">Alamat Jalan</label>
                                <textarea name="alamat_jalan" id="tabsAlamat-alamatJalan" class="form-control" rows="2"></textarea>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-2">
                                        <label for="tabsAlamat-rt" class="small mb-1">RT</label>
                                        <input type="number" name="rt" id="tabsAlamat-rt" class="form-control">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group mb-2">
                                        <label for="tabsAlamat-rw" class="small mb-1">RW</label>
                                        <input type="number" name="rw" id="tabsAlamat-rw" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsAlamat-dusun" class="small mb-1">Dusun</label>
                                <input type="text" name="dusun" id="tabsAlamat-dusun" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsAlamat-desa" class="small mb-1">Desa</label>
                                <input type="text" name="desa" id="tabsAlamat-desa" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsAlamat-kecamatan" class="small mb-1">Kecamatan</label>
                                <input type="text" name="kecamatan" id="tabsAlamat-kecamatan" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsAlamat-kabupaten" class="small mb-1">Kabupaten</label>
                                <input type="text" name="kabupaten" id="tabsAlamat-kabupaten" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsAlamat-provinsi" class="small mb-1">Provinsi</label>
                                <input type="text" name="provinsi" id="tabsAlamat-provinsi" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsAlamat-kodePos" class="small mb-1">Kode Pos</label>
                                <input type="text" name="kode_pos" id="tabsAlamat-kodePos" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsAlamat-lintang" class="small mb-1">Lintang</label>
                                <input type="text" name="lintang" id="tabsAlamat-lintang" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsAlamat-bujur" class="small mb-1">Bujur</label>
                                <input type="text" name="bujur" id="tabsAlamat-bujur" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsAlamat-jarakRumah" class="small mb-1">Jarak Rumah</label>
                                <div class="input-group">
                                    <input type="number" name="jarak_rumah" id="tabsAlamat-jarakRumah" class="form-control" aria-describedby="jarakRumahHelp">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Km</span>
                                    </div>
                                </div>
                                <small id="jarakRumahHelp" class="form-text text-muted">Jarak rumah ke sekolah dalam kilometer.</small>
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsAlamat-waktuTempuh" class="small mb-1">Waktu Tempuh</label>
                                <div class="input-group">
                                    <input type="number" name="waktu_tempuh" id="tabsAlamat-waktuTempuh" class="form-control" aria-describedby="waktuTempuhHelp">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Menit</span>
                                    </div>
                                </div>
                                <small id="waktuTempuhHelp" class="form-text text-muted">Waktu tempuh ke sekolah dalam menit.</small>
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsAlamat-jenisTinggal" class="small mb-1">Jenis Tinggal</label>
                                <select class="custom-select select2 mb-2 select2-getReferensi" data-referensi="jenisTinggal" id="tabsAlamat-jenisTinggal" name="jenis_tinggal_id"></select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsAlamat-alatTransportasi" class="small mb-1">Alat Transportasi</label>
                                <select class="custom-select select2 mb-2 select2-getReferensi" data-referensi="alatTransportasi" id="tabsAlamat-alatTransportasi" name="alat_transportasi_id"></select>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="tabs-settings" role="tabpanel" aria-labelledby="tabs-settings-tab">
                        Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>