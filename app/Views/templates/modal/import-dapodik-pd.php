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
                <div id="importStatus"></div>
                <div class="form-group row">
                    <label for="inputFile" class="col-sm-3 col-form-label">Pilih File</label>
                    <div class="col-sm-9">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputFile" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                            <label class="custom-file-label" for="inputFile">Pilih file</label>
                        </div>
                        <small id="fileHelp" class="form-text text-muted">Pilih file excel hasil unduh daftar peserta didik di Aplikasi Dapodik</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="formImport-pd_semester" class="col-sm-3 col-form-label">Semester</label>
                    <div class="col-sm-9">
                        <select name="semester_kode" id="formImport-pd_semester" data-tags="true" class="custom-select select2-getSemester"></select>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label">Pilih PD <button class="btn btn-sm btn-link text-muted" type="button" data-toggle="popover" data-title="Keterangan" data-content="<strong>PD Database</strong> - Hanya memilih peserta didik yang ada di database<br><strong>PD Baru</strong> - Hanya memilih peserta didik yang belum ada di database<br><strong>PD Terpilih</strong> - Hanya memilih peserta didik yang dicentang pada tabel<br><strong>Semua</strong> - Memilih semua peserta didik yang ada pada file"><i class="fas fa-question-circle"></i></button></label>
                    <div class="col-sm-9">
                        <div class="icheck-primary form-check-inline">
                            <input class="form-check-input" type="radio" id="radioFormImport-dbPd" name="radioFormImport-statusPd" value="database">
                            <label class="form-check-label" for="radioFormImport-dbPd">
                                PD Database
                            </label>
                        </div>
                        <div class="icheck-primary form-check-inline">
                            <input class="form-check-input" type="radio" id="radioFormImport-newPd" name="radioFormImport-statusPd" value="new">
                            <label class="form-check-label" for="radioFormImport-newPd">
                                PD Baru
                            </label>
                        </div>
                        <div class="icheck-primary form-check-inline">
                            <input class="form-check-input" type="radio" id="radioFormImport-checkedPd" name="radioFormImport-statusPd" value="checked">
                            <label class="form-check-label" for="radioFormImport-checkedPd">
                                PD Terpilih
                            </label>
                        </div>
                        <div class="icheck-primary form-check-inline">
                            <input class="form-check-input" type="radio" id="radioFormImport-allPd" name="radioFormImport-statusPd" value="all">
                            <label class="form-check-label" for="radioFormImport-allPd">
                                Semua
                            </label>
                        </div>
                    </div>
                </div>
                <form id="formImport-pd">
                    <div class="form-group row mb-2 clearfix">
                        <label for="" class="col-sm-3 col-form-label">Jenis Data</label>
                        <div class="col-sm-9 p-2">
                            <div class="row row-cols-1 row-cols-sm-2">
                                <div class="col mb-2">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="formImport-checkIndividu" name="identitas">
                                        <label for="formImport-checkIndividu">
                                            Individu
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="formImport-checkRegistrasi" name="registrasi">
                                        <label for="formImport-checkRegistrasi">
                                            Registrasi
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="formImport-checkDifabel" name="difabel">
                                        <label for="formImport-checkDifabel">
                                            Kebutuhan Khusus
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="formImport-checkAyah" name="ayah">
                                        <label for="formImport-checkAyah">
                                            Ayah
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="formImport-checkIbu" name="ibu">
                                        <label for="formImport-checkIbu">
                                            Ibu
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="formImport-checkWali" name="wali">
                                        <label for="formImport-checkWali">
                                            Wali
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="formImport-checkKontak" name="kontak">
                                        <label for="formImport-checkKontak">
                                            Kontak
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="formImport-checkPeriodik" name="periodik">
                                        <label for="formImport-checkPeriodik">
                                            Periodik
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="formImport-checkAlamat" name="alamat">
                                        <label for="formImport-checkAlamat">
                                            Alamat
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="formImport-checkKesejahteraan" name="kesejahteraan">
                                        <label for="formImport-checkKesejahteraan">
                                            Kesejahteraan
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="formImport-checkLayakPip" name="layak_pip">
                                        <label for="formImport-checkLayakPip">
                                            Usulan PIP
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="formImport-checkPip" name="rekening">
                                        <label for="formImport-checkPip">
                                            Rekening PIP
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="formImport-checkKelulusan" name="kelulusan">
                                        <label for="formImport-checkKelulusan">
                                            Kelulusan
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="formImport-checkRombel" name="rombel">
                                        <label for="formImport-checkRombel">
                                            Rombel
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="formImport-checkAnggotaRombel" name="anggotaRombel">
                                        <label for="formImport-checkAnggotaRombel">
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
                <button type="button" class="btn btn-primary" id="btnRun-ImportDapodik"><i class="fas fa-file-import mr-1"></i><span>Import</span></button>
            </div>
        </div>
    </div>
</div>