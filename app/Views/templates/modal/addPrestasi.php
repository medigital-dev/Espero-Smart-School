<div class="modal fade" id="modalAddPrestasi" data-backdrop="static" tabindex="-1" aria-labelledby="modalAddPrestasiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddPrestasiLabel">Tambah Prestasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="formPrestasi-namaPd">Nama Murid <small class="text-danger">*) Wajib</small></label>
                    <select name="peserta_didik_id" id="formPrestasi-namaPd" multiple class="custom-select select2-getPd"></select>
                    <small class="form-text text-muted">Pilih satu atau beberapa murid sekaligus.</small>
                    <div class="invalid-feedback">Harus diisi.</div>
                </div>
                <form id="formPrestasi-tambahPrestasi">
                    <div class="form-row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="formPrestasi-sebagai">Sebagai <small class="text-danger">*) Wajib</small></label>
                                <select name="hasil_id" id="formPrestasi-hasil" class="custom-select select2-getReferensi" data-referensi="hasilPrestasi"></select>
                                <div class="invalid-feedback">Harus diisi.</div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="formPrestasi-cabang">Cabang Lomba</label>
                                <input type="text" class="form-control" id="formPrestasi-cabang" name="cabang" data-limit-max="10">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="formPrestasi-namaKejuaraan">Nama Kejuaraan/Kegiatan <small class="text-danger">*) Wajib</small></label>
                        <textarea type="text" class="form-control" id="formPrestasi-namaKejuaraan" name="nama" rows="3" data-limit data-limit-max="20"></textarea>
                        <div class="invalid-feedback">Harus diisi.</div>
                    </div>
                    <div class="form-group">
                        <label for="formPrestasi-namaKejuaraan">Penyelenggara <small class="text-danger">*) Wajib</small></label>
                        <textarea type="text" class="form-control" id="formPrestasi-penyelenggara" name="penyelenggara" rows="2" data-limit data-limit-max="20"></textarea>
                        <div class="invalid-feedback">Harus diisi.</div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="formPrestasi-namaPd">Tingkat Prestasi <small class="text-danger">*) Wajib</small></label>
                                <select name="tingkat_id" id="formPrestasi-tingkat" class="custom-select select2-getReferensi" data-referensi="tingkatPrestasi"></select>
                                <div class="invalid-feedback">Harus diisi.</div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="formPrestasi-namaPd">Bidang Prestasi <small class="text-danger">*) Wajib</small></label>
                                <select name="bidang_id" id="formPrestasi-bidang" class="custom-select select2-getReferensi" data-referensi="bidangPrestasi"></select>
                                <div class="invalid-feedback">Harus diisi.</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formPrestasi-fotoJuara">Foto Kejuaraan <small class="text-danger">*) Wajib</small></label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="formPrestasi-fotoJuara" accept="image/*">
                                    <label class="custom-file-label" for="formPrestasi-fotoJuara">Choose file</label>
                                </div>
                            </div>
                            <div class="mb-3 d-none" id="fotoPreview">
                                <div class="mb-1">
                                    <img id="previewImage" class="img-fluid">
                                </div>
                                <div class="invalid-feedback">Harus diisi.</div>
                                <small class="form-text text-muted m-0 mb-2">
                                    Pastikan wajah berada ditengah-tengah bingkai.
                                </small>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formPrestasi-fotoPiagam">Foto Piagam <small class="text-danger">*) Jika ada</small></label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="formPrestasi-fotoPiagam" accept="image/*">
                                    <label class="custom-file-label" for="formPrestasi-fotoPiagam">Choose file</label>
                                </div>
                            </div>
                            <div class="mb-3 d-none" id="piagamPreview">
                                <div class="mb-1">
                                    <a data-fancybox>
                                        <img id="imgPiagam" class="img-fluid">
                                    </a>
                                </div><small class="form-text text-muted m-0 mb-2">
                                    Klik pada foto untuk memperbesar.
                                </small>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <div class="">
                    <button type="button" class="btn btn-primary" id="btnRun-simpanPrestasi">
                        <i class="fas fa-save mr-1"></i>
                        <span>
                            Simpan
                        </span>
                    </button>
                    <button type="button" class="btn btn-outline-primary">Simpan & Buat Flyer</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow">
    <div class="card-body">
        <div class="form-group">
            <label for="formPrestasi-namaPd">Nama Murid <small class="text-danger">*) Wajib</small></label>
            <select name="peserta_didik_id" id="formPrestasi-namaPd" class="custom-select select2-getPd"></select>
            <div class="invalid-feedback">Harus diisi.</div>
        </div>
        <form id="formPrestasi-tambahPrestasi">
            <input type="hidden" id="idPrestasi" name="prestasi_id">
            <div class="form-row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="formPrestasi-sebagai">Sebagai <small class="text-danger">*) Wajib</small></label>
                        <select name="hasil_id" id="formPrestasi-hasil" class="custom-select select2-getReferensi" data-referensi="hasilPrestasi"></select>
                        <div class="invalid-feedback">Harus diisi.</div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="formPrestasi-cabang">Cabang Lomba</label>
                        <input type="text" class="form-control" id="formPrestasi-cabang" name="cabang">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="formPrestasi-namaKejuaraan">Nama Kejuaraan/Kegiatan <small class="text-danger">*) Wajib</small></label>
                <textarea type="text" class="form-control" id="formPrestasi-namaKejuaraan" name="nama" rows="3"></textarea>
                <div class="invalid-feedback">Harus diisi.</div>
            </div>
            <div class="form-group">
                <label for="formPrestasi-namaKejuaraan">Penyelenggara <small class="text-danger">*) Wajib</small></label>
                <textarea type="text" class="form-control" id="formPrestasi-penyelenggara" name="penyelenggara" rows="2"></textarea>
                <div class="invalid-feedback">Harus diisi.</div>
            </div>
            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="formPrestasi-namaPd">Tingkat Prestasi <small class="text-danger">*) Wajib</small></label>
                        <select name="tingkat_id" id="formPrestasi-tingkat" class="custom-select select2-getReferensi" data-referensi="tingkatPrestasi"></select>
                        <div class="invalid-feedback">Harus diisi.</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="formPrestasi-namaPd">Bidang Prestasi <small class="text-danger">*) Wajib</small></label>
                        <select name="bidang_id" id="formPrestasi-bidang" class="custom-select select2-getReferensi" data-referensi="bidangPrestasi"></select>
                        <div class="invalid-feedback">Harus diisi.</div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="mb-3">
                    <label for="formPrestasi-fotoPiagam">Foto Piagam <small class="text-danger">*) Jika ada</small></label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="formPrestasi-fotoPiagam" accept="image/*">
                        <label class="custom-file-label" for="formPrestasi-fotoPiagam">Choose file</label>
                    </div>
                </div>
                <div class="mb-3 d-none" id="piagamPreview">
                    <div class="mb-1">
                        <a data-fancybox>
                            <img id="imgPiagam" class="img-fluid">
                        </a>
                    </div><small class="form-text text-muted m-0 mb-2">
                        Klik pada foto untuk memperbesar.
                    </small>
                </div>
            </div>
        </form>
        <div class="d-flex justify-content-end">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-primary float-right" id="btnRun-saveFlyer">
                    <i class="fas fa-save"></i>
                    <span>
                        Simpan & Buat Flyer
                    </span>
                </button>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" data-display="static" aria-expanded="false">
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                        <a class="dropdown-item" href="#">Simpan & Buat Baru</a>
                        <a class="dropdown-item" href="#">Simpan & Salin Form</a>
                        <a class="dropdown-item" href="#">Hanya Simpan/Update</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>