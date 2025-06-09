<div class="modal fade" id="modalReferensi" data-backdrop="static" tabindex="-1" aria-labelledby="modalReferensiLabel" aria-hidden="true" style="z-index: 1061;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalReferensiLabel">Referensi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="targetTambahReferensi">
                <input type="hidden" id="tempId-selectNewTags">
                <input type="hidden" id="typeReferensi">
                <div class="mb-3">
                    <label>Preview</label>
                    <div class="border border-primary p-2 text-center m-0 h3" id="refPreview"></div>
                </div>
                <form id="formData-tambahReferensi">
                    <div class="form-group row">
                        <label for="formReferensi-nama" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" id="formReferensi-nama" name="nama" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="formReferensi-kode" class="col-sm-3 col-form-label">Kode</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="formReferensi-kode" name="kode">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="formReferensi-bgColor" class="col-sm-3 col-form-label">Style</label>
                        <div class="col-sm-9">
                            <select name="bg_color" id="formReferensi-bgColor" class="custom-select select2-getBgColor"></select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="btnCancel-simpanReferensi">Batal</button>
                <button type="button" class="btn btn-primary" id="btnRun-simpanReferensi">
                    <i class="fas fa-save mr-1"></i>
                    <span>
                        Simpan
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>