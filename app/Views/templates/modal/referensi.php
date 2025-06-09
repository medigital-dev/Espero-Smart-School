<div class="modal fade" id="modalReferensi" data-backdrop="static" tabindex="-1" aria-labelledby="modalReferensiLabel" aria-hidden="true" style="z-index: 1061;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalReferensiLabel">Tambah Referensi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formData-tambahReferensi">
                    <div class="form-group">
                        <label for="formReferensi-nama">Nama</label>
                        <input type="text" class="form-control" id="formReferensi-nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="formReferensi-kode">Kode</label>
                        <input type="text" class="form-control" id="formReferensi-kode" name="kode">
                    </div>
                    <div class="form-group">
                        <label for="formReferensi-bgColor">Warna Latar</label>
                        <select name="bg_color" id="formReferensi-bgColor" data-referensi="backgroundColor" class="custom-select select2-getReferensi"></select>
                    </div>
                    <div class="form-group">
                        <label for="formReferensi-textColor">Warna Text</label>
                        <input type="text" class="form-control" id="formReferensi-textColor" name="text_color">
                    </div>
                </form>
                <div class="mb-2">
                    <label for="">Preview</label>
                    <div class="border border-primary p-2 text-center" id="refPreview"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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