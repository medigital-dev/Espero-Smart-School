<div class="offcanvas offcanvas-end" id="offcanvasEdit-dataPd">
    <div class="offcanvas-header sticky-top bg-light">
        <h5 class="text-bold">Data Peserta Didik</h5>
        <button class="close" data-toggle="offcanvas" data-target=".offcanvas">&times;</button>
    </div>
    <div class="offcanvas-body pt-0">
        <div class="row mb-2">
            <div class="col">
                <div class="text-center">
                    <a href="<?= base_url('assets/img/users/_default.png'); ?>" class="mb-2" data-fancybox>
                        <img src="<?= base_url('assets/img/users/_default.png'); ?>" class="img-fluid img-circle" width="125" height="125" alt="Default user photo">
                    </a>
                    <h5 class="text-bold mb-2">Muhammad Said Latif Ghofari</h5>
                </div>
            </div>
        </div>
        <hr>
        <div class="d-flex align-items-start">
            <div class="nav flex-column nav-tabs h-100 mr-3 pt-1 sticky-top" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active btn-tooltip" data-title="Identitas Peserta Didik" id="vert-tabs-profil-tab" data-toggle="pill" href="#vert-tabs-profil" role="tab" aria-controls="vert-tabs-profil" aria-selected="true"><i class="fas fa-user-alt"></i></a>
            </div>
            <div class="tab-content w-100" id="vert-tabs-tabContent">
                <div class="tab-pane fade active show" id="vert-tabs-profil" role="tabpanel" aria-labelledby="vert-tabs-profil-tab">
                    <div class="py-2 sticky-top align-items-center border-bottom bg-white d-flex justify-content-between mb-2">
                        <h6 class="text-bold m-0">Identitas Peserta Didik</h6>
                        <button class="btn btn-sm btn-link btnEditSave" data-toggle="tooltip" data-title="Ubah" onclick="btnEditSaveForm('#formData-bukuIndukPd',$(this))"><i class="fas fa-pen-square"></i></button>
                    </div>
                    <form id="formData-bukuIndukPd">
                        <input type="hidden" name="peserta_didik_id" disabled id="updatePd-id">
                        <div class="form-group mb-2">
                            <label class="small mb-1" for="updatePd-nama">Nama</label>
                            <input type="text" class="form-control" disabled id="updatePd-nama" name="nama">
                        </div>
                        <div class="form-group mb-2">
                            <label for="updatePd-jenisKelamin" class="small mb-1">Jenis Kelamin</label>
                            <select class="custom-select select2 mb-2" id="updatePd-jenisKelamin" name="jenis_kelamin" disabled>
                                <option></option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label class="small mb-1" for="updatePd-tempatLahir">Tempat Lahir</label>
                            <input type="text" class="form-control" disabled id="updatePd-tempatLahir" name="tempat_lahir">
                        </div>
                        <div class="form-group mb-2">
                            <label class="small mb-1" for="updatePd-tanggalLahir">Tanggal Lahir</label>
                            <div class="input-group">
                                <input type="text" class="form-control" disabled id="updatePd-tanggalLahir" name="tanggal_lahir" data-inputmask-alias="datetime" placeholder="Tanggal Lahir" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                <div class="input-group-append" data-target="#updatePd-tanggalLahir" data-toggle="datetimepicker">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label class="small mb-1" for="updatePd-nisn" aria-describedby="nisnHelp">NISN</label>
                            <input type="text" class="form-control" disabled id="updatePd-nisn" name="nisn">
                            <small id="nisnHelp" class="form-text text-muted">Nomor Induk Siswa Nasional</small>
                        </div>
                        <div class="form-group mb-2">
                            <label class="small mb-1" for="updatePd-nomorAkte">Nomor Akte Kelahiran</label>
                            <input type="text" class="form-control" disabled id="updatePd-nomorAkte" name="nomorAkte" aria-describedby="nomorAkteHelp">
                            <small id="nomorAkteHelp" class="form-text text-muted">Nomor registrasi akte kelahiran</small>
                        </div>
                        <div class="form-group mb-2">
                            <label class="small mb-1" for="updatePd-nik">NIK</label>
                            <input type="text" class="form-control" disabled id="updatePd-nik" name="nik" aria-describedby="nikHelp">
                            <small id="nikHelp" class="form-text text-muted">Nomor Induk Kependudukan</small>
                        </div>
                        <div class="form-group mb-2">
                            <label class="small mb-1" for="updatePd-nomorKk">Nomor KK</label>
                            <input type="text" class="form-control" disabled id="updatePd-nomorKk" name="nik" aria-describedby="noKKHelp">
                            <small id="noKKHelp" class="form-text text-muted">Nomor Kartu Kependudukan</small>
                        </div>
                        <div class="form-group mb-2">
                            <label for="updatePd-agama" class="small mb-1">Agama</label>
                            <select class="custom-select select2 mb-2 select2-getReferensi" data-referensi="agama" id="updatePd-agama" name="agama_id" disabled></select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="updatePd-photoProfil" class="small mb-1">Pass Foto</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="updatePd-photoProfil" name="foto_id" disabled>
                                <label class="custom-file-label" for="updatePd-photoProfil">Pilih berkas</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                    Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
                </div>
                <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
                    Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                </div>
                <div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
                    Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                </div>
            </div>
        </div>
    </div>
</div>