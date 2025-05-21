<div class="modal fade" id="modalImportDapodik" data-backdrop="static" tabindex="-1" aria-labelledby="modalImportDapodikLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalImportDapodikLabel">Import File Dapodik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputFile" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                        <label class="custom-file-label" for="inputFile">Pilih file</label>
                    </div>
                    <small id="fileHelp" class="form-text text-muted">Pilih file excel hasil unduh daftar peserta didik di Aplikasi Dapodik</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnRun-ImportDapodik"><i class="fas fa-file-import mr-1"></i><span>Import</span></button>
            </div>
        </div>
    </div>
</div>