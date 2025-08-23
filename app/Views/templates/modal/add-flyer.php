<div class="modal fade" id="modalAddFlyer" data-backdrop="static" tabindex="-1" aria-labelledby="modalAddFlyerLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddFlyerLabel">Buat Flyer</h5>
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
                        <label for="formPrestasi-namaFlyer" class="col-2 col-form-label">Nama</label>
                        <div class="col-10">
                            <textarea class="form-control" id="formPrestasi-namaFlyer" name="nama" rows="1"></textarea>
                            <small class="form-text text-muted">Sesuaikan karakter agar posisi pas pada kotak yang disediakan</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="formPrestasi-content" class="col-2 col-form-label">Konten</label>
                        <div class="col-10">
                            <textarea class="form-control" id="formPrestasi-content" name="content" rows="2"></textarea>
                            <small class="form-text text-muted">Sesuaikan karakter agar posisi pas pada kotak yang disediakan</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="formPrestasi-fotoJuara" class="col-2 col-form-label">Foto</label>
                        <div class="col-10">
                            <div class="mb-3">
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
                    </div>
                </form>
                <div class="form-group">
                    <label for="previewFlyer">Preview</label>
                    <div id="previewFlyer">
                        <p class="text-center small">Klik tombol generate terlebih dahulu.</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <div>
                    <button type="button" class="btn btn-outline-primary" id="btnRun-generateFlyer">Generate</button>
                    <button type="button" class="btn btn-primary" disabled id="btnRun-downloadFlyer">Unduh</button>
                </div>
            </div>
        </div>
    </div>
</div>