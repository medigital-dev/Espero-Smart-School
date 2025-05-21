<div class="modal fade" id="modalKelulusanPd" data-backdrop="static" tabindex="-1" aria-labelledby="modalKelulusanPdLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalKelulusanPdLabel">Kelulusan Peserta Didik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tabs-individu-tab" data-toggle="pill" href="#tabs-individu" role="tab" aria-controls="tabs-individu" aria-selected="true">Individu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tabs-import-tab" data-toggle="pill" href="#tabs-import" role="tab" aria-controls="tabs-import" aria-selected="false">Import</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade active show" id="tabs-individu" role="tabpanel" aria-labelledby="tabs-individu-tab">
                                <form id="form-kelulusanPd">
                                    <div class="form-group row mb-2">
                                        <label for="selectForm-namaPdLulus" class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <select class="custom-select select2-getPd" id="selectForm-namaPdLulus"></select>
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#selectForm-namaPdLulus');"><i class="fas fa-eraser"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label for="inputForm-tanggalLulusPd" class="col-sm-3 col-form-label">Tanggal</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="inputForm-tanggalLulusPd" data-inputmask-alias="datetime" placeholder="Tanggal kelulusan" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                                <div class="input-group-append" data-target="#inputForm-tanggalLulusPd" data-toggle="datetimepicker">
                                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                                </div>
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#inputForm-tanggalLulusPd');"><i class="fas fa-eraser"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label for="inputForm-kurikulumLulusPd" class="col-sm-3 col-form-label">Kurikulum</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="inputForm-kurikulumLulusPd" placeholder="Kurikulum yang digunakan">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#inputForm-kurikulumLulusPd');"><i class="fas fa-eraser"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label for="inputForm-noIjazahLulusPd" class="col-sm-3 col-form-label">No Ijazah</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="inputForm-noIjazahLulusPd" placeholder="Nomor seri ijazah">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#inputForm-noIjazahLulusPd');"><i class="fas fa-eraser"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label for="inputForm-penandatanganLulusPd" class="col-sm-3 col-form-label">TTD an</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="inputForm-penandatanganLulusPd" placeholder="Penandatangan Ijazah">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#inputForm-penandatanganLulusPd');"><i class="fas fa-eraser"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label for="inputForm-sekolahTujuanLulusPd" class="col-sm-3 col-form-label">Sek. Tujuan</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="inputForm-sekolahTujuanLulusPd" placeholder="Sekolah tujuan">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-title="Reset input" onclick="resetInput('#inputForm-sekolahTujuanLulusPd');"><i class="fas fa-eraser"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary" id="btnRun-simpanKelulusanPd">
                                        <i class="fas fa-save mr-1"></i>
                                        <span>
                                            Simpan
                                        </span>
                                    </button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="tabs-import" role="tabpanel" aria-labelledby="tabs-import-tab">
                                <div class="form-group row mb-2">
                                    <label for="inputFile-kelulusanPd" class="col-sm-3 col-form-label">File Import</label>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputFile-kelulusanPd" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                                            <label class="custom-file-label" for="inputFile-kelulusanPd">Pilih file</label>
                                        </div>
                                    </div>
                                </div>
                                <p>Unduh: <a href="<?= base_url('assets/docs/kelulusan-pd.xlsx'); ?>">Format Import Kelulusan.xlsx</a></p>
                                <button type="button" class="btn btn-primary" id="btnRun-importKelulusanPd">
                                    <i class="fas fa-save mr-1"></i>
                                    <span>
                                        Import
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>