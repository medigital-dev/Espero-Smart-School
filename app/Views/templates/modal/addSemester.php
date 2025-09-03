<div class="modal fade" id="modalTambahSemester" data-backdrop="static" tabindex="-1" aria-labelledby="modalTambahSemesterLabel" aria-hidden="true" style="z-index: 1061;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahSemesterLabel">Tambah Semester</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="idTarget-semester">
                <form id="formSemester-add">
                    <div class="form-group row">
                        <label for="formSemester-add_nama" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" id="formSemester-add_nama" name="nama" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="formSemester-add_kode" class="col-sm-3 col-form-label">Kode</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="formSemester-add_kode" name="kode">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="formSemester-add_status" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <input type="checkbox" id="formSemester-add_status" data-bootstrap-switch data-off-color="danger" data-on-color="success" data-on-text="Aktif" data-off-text="Off">
                        </div>
                        <input type="hidden" name="status">
                    </div>
                </form>
            </div>
            <div class=" modal-footer">
                <button type="button" class="btn btn-secondary" id="btnCancel-simpanSemester">Batal</button>
                <button type="button" class="btn btn-primary" id="btnRun-simpanSemester">
                    <i class="fas fa-save mr-1"></i>
                    <span>
                        Simpan
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>