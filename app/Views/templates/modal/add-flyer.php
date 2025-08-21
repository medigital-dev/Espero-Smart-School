<div class="modal fade" id="modalAddFlyer" data-backdrop="static" tabindex="-1" aria-labelledby="modalAddFlyerLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddFlyerLabel">Tambah Prestasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formPrestasi-tambahFlyer">
                    <div class="form-group row">
                        <label for="formPrestasi-kode" class="col-2 col-form-label">Kode</label>
                        <div class="col-10">
                            <input type="text" readonly class="form-control-plaintext text-monospace" id="formPrestasi-kode" name="kode">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="formPrestasi-nama" class="col-2 col-form-label">Nama</label>
                        <div class="col-10">
                            <textarea class="form-control" id="formPrestasi-nama" name="nama" rows="1"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="formPrestasi-content" class="col-2 col-form-label">Konten</label>
                        <div class="col-10">
                            <textarea class="form-control" id="formPrestasi-content" name="content" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
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
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-primary">Generate</button>
            </div>
        </div>
    </div>
</div>