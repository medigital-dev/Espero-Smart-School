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
                <div id="syncStatus"></div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label">Pilih PD</label>
                    <div class="col-sm-9">
                        <div class="icheck-primary form-check-inline">
                            <input class="form-check-input" type="radio" id="radioForm-newPd" name="radioForm-statusPd" value="new">
                            <label class="form-check-label" for="radioForm-newPd">
                                PD Baru
                            </label>
                        </div>
                        <div class="icheck-primary form-check-inline">
                            <input class="form-check-input" type="radio" id="radioForm-checkedPd" name="radioForm-statusPd" value="checked">
                            <label class="form-check-label" for="radioForm-checkedPd">
                                PD Terpilih
                            </label>
                        </div>
                        <div class="icheck-primary form-check-inline">
                            <input class="form-check-input" type="radio" id="radioForm-allPd" name="radioForm-statusPd" value="all">
                            <label class="form-check-label" for="radioForm-allPd">
                                Semua
                            </label>
                        </div>
                    </div>
                </div>
                <form id="formSync-pd">
                    <div class="form-group row mb-2 clearfix">
                        <label for="" class="col-sm-3 col-form-label">Jenis Data</label>
                        <div class="col-sm-9">
                            <div class="row row-cols-1 row-cols-sm-2">
                                <div class="col mb-2">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="formSync-checkIndividu" name="identitas">
                                        <label for="formSync-checkIndividu">
                                            Individu
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="formSync-checkRegistrasi" name="registrasi">
                                        <label for="formSync-checkRegistrasi">
                                            Registrasi
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="formSync-checkDifabel" name="difabel">
                                        <label for="formSync-checkDifabel">
                                            Kebutuhan Khusus
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="formSync-checkAyah" name="ayah">
                                        <label for="formSync-checkAyah">
                                            Ayah
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="formSync-checkIbu" name="ibu">
                                        <label for="formSync-checkIbu">
                                            Ibu
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="formSync-checkWali" name="wali">
                                        <label for="formSync-checkWali">
                                            Wali
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="formSync-checkKontak" name="kontak">
                                        <label for="formSync-checkKontak">
                                            Kontak
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="formSync-checkOrtuPd" name="ortuwalipd">
                                        <label for="formSync-checkOrtuPd">
                                            Orangtua/Wali
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="formSync-checkPeriodik" name="periodik">
                                        <label for="formSync-checkPeriodik">
                                            Periodik
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="formSync-checkRombel" name="rombel">
                                        <label for="formSync-checkRombel">
                                            Rombongan Belajar
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="formSync-checkAnggotaRombel" name="anggotaRombel">
                                        <label for="formSync-checkAnggotaRombel">
                                            Anggota Rombel
                                        </label>
                                    </div>
                                </div>
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