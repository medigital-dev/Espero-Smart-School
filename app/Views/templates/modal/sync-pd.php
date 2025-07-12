<div class="modal fade" id="modalDapodikSync-pd" data-backdrop="static" tabindex="-1" aria-labelledby="modalDapodikSyncLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDapodikSyncLabel">Tarik Peserta Didik dari Dapodik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formSync-pd">
                    <div class="form-group row mb-2">
                        <label class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <div class="icheck-primary form-check-inline">
                                <input class="form-check-input" type="radio" id="radioDt-allPd" name="radioDt-statusPd" value="all" checked>
                                <label class="form-check-label" for="radioDt-allPd">
                                    Semua
                                </label>
                            </div>
                            <div class="icheck-primary form-check-inline">
                                <input class="form-check-input" type="radio" id="checkbox-newPd" name="radioDt-statusPd" value="new">
                                <label class="form-check-label" for="checkbox-newPd">
                                    PD Baru
                                </label>
                            </div>
                            <div class="icheck-primary form-check-inline">
                                <input class="form-check-input" type="radio" id="checkbox-checkedPd" name="radioDt-statusPd" value="checked">
                                <label class="form-check-label" for="checkbox-checkedPd">
                                    PD Terpilih
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-2 clearfix">
                        <label for="" class="col-sm-3 col-form-label">Jenis Data</label>
                        <div class="col-sm-9 d-flex flex-column">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="checkboxPrimary3" checked>
                                <label for="checkboxPrimary3">
                                    Individu
                                </label>
                            </div>
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="checkboxPrimary3">
                                <label for="checkboxPrimary3">
                                    Registrasi
                                </label>
                            </div>
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="checkboxPrimary3">
                                <label for="checkboxPrimary3">
                                    Kontak
                                </label>
                            </div>
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="checkboxPrimary3">
                                <label for="checkboxPrimary3">
                                    Ayah
                                </label>
                            </div>
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="checkboxPrimary3">
                                <label for="checkboxPrimary3">
                                    Ibu
                                </label>
                            </div>
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="checkboxPrimary3">
                                <label for="checkboxPrimary3">
                                    Wali
                                </label>
                            </div>
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="checkboxPrimary3">
                                <label for="checkboxPrimary3">
                                    Periodik
                                </label>
                            </div>
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="checkboxPrimary3">
                                <label for="checkboxPrimary3">
                                    Orangtua/Wali
                                </label>
                            </div>
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="checkboxPrimary3">
                                <label for="checkboxPrimary3">
                                    Rombongan Belajar
                                </label>
                            </div>
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="checkboxPrimary3">
                                <label for="checkboxPrimary3">
                                    Anggota Rombel
                                </label>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnRun-tarikDapodik"><i class="fas fa-file-import mr-1"></i><span>Tarik Data</span></button>
            </div>
        </div>
    </div>
</div>