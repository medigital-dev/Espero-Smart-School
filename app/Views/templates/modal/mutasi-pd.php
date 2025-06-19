<div class="modal fade" id="modalMutasiPd" data-backdrop="static" tabindex="-1" aria-labelledby="modalMutasiPdLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMutasiPdLabel">Mutasi Peserta Didik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row mb-2">
                    <label for="inputForm-tanggalMutasiPd" class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="text" class="form-control tanggal" id="inputForm-tanggalMutasiPd" value="<?= date('d/m/Y'); ?>" data-inputmask-alias="datetime" placeholder="Tanggal mutasi" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                            <div class="input-group-append" data-target="#inputForm-tanggalMutasiPd" data-toggle="datetimepicker">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#inputForm-tanggalMutasiPd');"><i class="fas fa-eraser"></i></button>
                            </div>
                            <input type="hidden" name="tanggal">
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="selectForm-namaMutasiPd" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <select class="custom-select select2-getPd" data-status="active" id="selectForm-namaMutasiPd"></select>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#selectForm-namaMutasiPd');"><i class="fas fa-eraser"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="selectForm-jenisMutasiPd" class="col-sm-3 col-form-label">Mutasi</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <select class="custom-select select2-getReferensi" data-tags="true" data-referensi="jenisMutasi" data-placeholder="Pilih jenis mutasi..." id="selectForm-jenisMutasiPd"></select>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#selectForm-jenisMutasiPd');"><i class="fas fa-eraser"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="textForm-alasanMutasiPd" class="col-sm-3 col-form-label">Alasan</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <textarea class="form-control" rows="2" id="textForm-alasanMutasiPd" placeholder="Alasan mutasi"></textarea>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#textForm-alasanMutasiPd');"><i class="fas fa-eraser"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="inputForm-sekolahTujuanMutasiPd" class="col-sm-3 col-form-label">Sek. Tujuan</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputForm-sekolahTujuanMutasiPd" placeholder="Sekolah tujuan">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#inputForm-sekolahTujuanMutasiPd');"><i class="fas fa-eraser"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnRun-simpanMutasiPd">
                    <i class="fas fa-save mr-1"></i>
                    <span>
                        Simpan
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>