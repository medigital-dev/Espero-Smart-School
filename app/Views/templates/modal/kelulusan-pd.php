<div class="modal fade" id="modalKelulusanPd" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalKelulusanPdLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalKelulusanPdLabel">Kelulusan Peserta Didik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row mb-2">
                    <label for="inputFile-kelulusanPd" class="col-sm-3 col-form-label">File Import</label>
                    <div class="col-sm-9">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputFile-kelulusanPd" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                            <label class="custom-file-label" for="inputFile-kelulusanPd">Pilih file</label>
                        </div>
                    </div>
                </div>
                <p>Unduh: <a href="">Format Import Kelulusan.xlsx</a></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnRun-importKelulusanPd">
                    <i class="fas fa-save mr-1"></i>
                    <span>
                        Import
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>