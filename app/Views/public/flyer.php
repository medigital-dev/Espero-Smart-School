<?= $this->extend('templates/public'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card card-primary shadow">
            <div class="card-header">
                <h3 class="card-title">Form Flyer</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3 mb-3 mb-lg-0">
                        <div class="nav flex-row flex-sm-column nav-pills h-100 border-right pr-2" id="tabs-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="tabs-prestasi-tab" data-toggle="pill" href="#tabs-prestasi" role="tab" aria-controls="tabs-prestasi" aria-selected="true">
                                <i class="fas fa-trophy fa-fw"></i>
                                <span class="d-none d-sm-inline">
                                    Prestasi
                                </span>
                            </a>
                            <a class="nav-link" id="tabs-duka-tab" data-toggle="pill" href="#tabs-duka" role="tab" aria-controls="tabs-duka" aria-selected="false">
                                <i class="fas fa-hand-holding-heart fa-fw"></i>
                                <span class="d-none d-sm-inline">
                                    Duka
                                </span>
                            </a>
                            <a class="nav-link" id="tabs-info-tab" data-toggle="pill" href="#tabs-info" role="tab" aria-controls="tabs-info" aria-selected="false">
                                <i class="fas fa-info-circle fa-fw"></i>
                                <span class="d-none d-sm-inline">
                                    Info
                                </span>
                            </a>
                            <!-- <a class="nav-link mt-sm-auto ml-auto ml-sm-0" id="tabs-cek-tab" data-toggle="pill" href="#tabs-cek" role="tab" aria-controls="tabs-cek" aria-selected="false">
                                <i class="fas fa-search fa-fw"></i>
                                <span class="d-none d-sm-inline">
                                    Cari
                                </span>
                            </a> -->
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="tab-content" id="tabs-tabContent">
                            <div class="tab-pane fade" id="tabs-cek" role="tabpanel" aria-labelledby="tabs-cek-tab">
                                <form id="formFlyer-cari">
                                    <div class="form-group row">
                                        <label for="formFlyer-prestasi_untuk" class="col-sm-3 col-form-label">Tipe</label>
                                        <div class="col-sm-9">
                                            <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                                <label class="btn btn-outline-primary active">
                                                    <input type="radio" name="tipe" value="prestasi" checked> Prestasi
                                                </label>
                                                <label class="btn btn-outline-primary">
                                                    <input type="radio" name="tipe" value="duka"> Duka Cita
                                                </label>
                                                <label class="btn btn-outline-primary">
                                                    <input type="radio" name="tipe" value="info"> Informasi
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="formFlyer-cari_kode" class="col-sm-3 col-form-label">Kode</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="formFlyer-cari_kode" name="kode" autofocus>
                                            <div class="invalid-feedback">Harus di input!</div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-primary" id="btnRun-cekFlyer">Cek</button>
                                </form>
                            </div>
                            <div class="tab-pane active show fade" id="tabs-prestasi" role="tabpanel" aria-labelledby="tabs-prestasi-tab">
                                <h6 class="text-bold m-0">Flyer Prestasi</h6>
                                <hr class="my-2">
                                <form id="formFlyer-prestasi">
                                    <input type="hidden" name="kode" id="formFlyer-prestasi_kode">
                                    <div class="form-group row">
                                        <label for="formFlyer-prestasi_untuk" class="col-sm-3 col-form-label">Untuk</label>
                                        <div class="col-sm-9">
                                            <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                                <label class="btn btn-outline-primary">
                                                    <input type="radio" name="target" value="pd"> Murid
                                                </label>
                                                <label class="btn btn-outline-primary disabled">
                                                    <input type="radio" name="target" value="gtk"> Guru/TU
                                                </label>
                                                <label class="btn btn-outline-primary">
                                                    <input type="radio" name="target" value="custom"> Custom
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="formFlyer-prestasi_nama" class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9" id="formFlyer-prestasi_nama">
                                            <input type="text" class="form-control" disabled>
                                            <div class="invalid-feedback">Harus di input!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="formFlyer-prestasi_content" class="col-sm-3 col-form-label">Uraian</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="formFlyer-prestasi_content" name="isi" rows="3"></textarea>
                                            <div class="invalid-feedback">Harus di input!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-1">
                                        <label for="formFlyer-prestasi_foto" class="col-sm-3 col-form-label">Foto</label>
                                        <div class="col-sm-9">
                                            <div class="mb-2">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="formFlyer-prestasi_foto" accept="image/*">
                                                    <label class="custom-file-label" for="formFlyer-prestasi_foto">Choose file</label>
                                                    <div class="invalid-feedback">File foto harus di pilih!</div>
                                                </div>
                                            </div>
                                            <div class="mb-2">
                                                <div class="mb-1 d-none w-100" id="formFlyer-prestasi_fotoPreview" style="max-height: 360px;">
                                                    <img id="formFlyer-prestasi_previewImage" class="img-fluid">
                                                    <small class="form-text text-muted text-center m-0 mb-2">
                                                        Pastikan wajah berada ditengah-tengah bingkai.
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="form-group row mb-0">
                                    <label for="formFlyer-prestasi_preview" class="col-sm-3 col-form-label">Preview</label>
                                    <div class="col-sm-9" id="formFlyer-prestasi_preview">
                                        <p class="text-center pt-2 m-0 small">Klik tombol generate terlebih dahulu.</p>
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="float-right">
                                    <button type="button" class="btn btn-outline-primary" id="btnGenerate-prestasi"><i class="fas fa-save mr-1"></i>Generate</button>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs-duka" role="tabpanel" aria-labelledby="tabs-duka-tab">
                                <h6 class="text-bold m-0">Flyer Duka Cita</h6>
                                <hr class="my-2">
                                <form id="formFlyer-duka">
                                    <input type="hidden" name="kode" id="formFlyer-duka_kode">
                                    <div class="form-group row">
                                        <label for="formFlyer-duka_atasNama" class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nama" id="formFlyer-duka_atasNama">
                                            <div class="invalid-feedback">Harus di input!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="formFlyer-duka_content" class="col-sm-3 col-form-label">Keterangan</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="formFlyer-duka_content" name="keterangan" rows="2"></textarea>
                                            <div class="invalid-feedback">Harus di input!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-1">
                                        <label for="formFlyer-duka_foto" class="col-sm-3 col-form-label">Foto</label>
                                        <div class="col-sm-9">
                                            <div class="mb-2">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="formFlyer-duka_foto" accept="image/*">
                                                    <label class="custom-file-label" for="formFlyer-duka_foto">Choose file</label>
                                                    <div class="invalid-feedback">File foto harus di pilih!</div>
                                                </div>
                                            </div>
                                            <div class="mb-2">
                                                <div class="mb-1 d-none w-100" id="formFlyer-duka_fotoPreview" style="max-height: 360px;">
                                                    <img id="formFlyer-duka_previewImage" class="img-fluid">
                                                    <small class="form-text text-muted text-center m-0 mb-2">
                                                        Pastikan wajah berada ditengah-tengah bingkai.
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="form-group row mb-0">
                                    <label for="formFlyer-duka_preview" class="col-sm-3 col-form-label">Preview</label>
                                    <div class="col-sm-9" id="formFlyer-duka_preview">
                                        <p class="text-center pt-2 m-0 small">Klik tombol generate terlebih dahulu.</p>
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="float-right">
                                    <button type="button" class="btn btn-outline-primary" id="btnGenerate-duka"><i class="fas fa-save mr-1"></i>Generate</button>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs-info" role="tabpanel" aria-labelledby="tabs-info-tab">
                                <h6 class="text-bold m-0">Flyer Informasi</h6>
                                <hr class="my-2">
                                <form id="formFlyer-info">
                                    <input type="hidden" name="kode" id="formFlyer-info_kode">
                                    <div class="form-group row">
                                        <label for="formFlyer-info_judul" class="col-sm-3 col-form-label">Judul</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="judul" id="formFlyer-info_judul">
                                            <div class="invalid-feedback">Harus di input!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="formFlyer-info_content" class="col-sm-3 col-form-label">Konten</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="formFlyer-info_content" name="konten" rows="4"></textarea>
                                            <div class="invalid-feedback">Harus di input!</div>
                                        </div>
                                    </div>
                                </form>
                                <div class="form-group row mb-0">
                                    <label for="formFlyer-info_preview" class="col-sm-3 col-form-label">Preview</label>
                                    <div class="col-sm-9" id="formFlyer-info_preview">
                                        <p class="text-center pt-2 m-0 small">Klik tombol generate terlebih dahulu.</p>
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="float-right">
                                    <button type="button" class="btn btn-outline-primary" id="btnGenerate-info"><i class="fas fa-save mr-1"></i>Generate</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>