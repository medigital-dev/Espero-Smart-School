<?= $this->extend('templates/admin'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="btn-toolbar mb-2">
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-primary" title="Reload Tabel" id="btnReloadTable"><i class="fas fa-redo-alt fa-fw"></i></button>
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-primary" title="Tambah Profil" data-target="#modalFormKoneksiDapodik" data-toggle="modal"><i class="fas fa-plus-circle fa-fw"></i></button>
                        <button type="button" class="btn btn-primary" title="Edit Profil" id="btnEditKoneksiDapodik"><i class="fas fa-edit fa-fw"></i></button>
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-danger" title="Hapus Profil" id="btnHapusKoneksiDapodik"><i class="fas fa-trash-alt fa-fw"></i></button>
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-success" title="Aktifkan Profil" id="btnAktifkanKoneksiDapodik"><i class="fas fa-check-circle fa-fw"></i></button>
                        <button type="button" class="btn btn-success" title="Test Koneksi" id="btnTestKoneksiDapodik"><i class="fas fa-exchange-alt fa-fw"></i></button>
                    </div>
                    <div class="my-1 mr-1 ml-lg-auto ml-sm-auto">
                        <input class="form-control form-control-sm" type="text" id="cariTabelKoneksiDapodik" placeholder="Cari..." aria-label="Search">
                    </div>
                </div>
                <table class="table table-bordered table-hover w-100" id="tabelKoneksiDapodik">
                    <thead>
                        <tr>
                            <th class="table-primary align-middle text-center" style="width: 10px;">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="checkAllRow">
                                    <label for="checkAllRow" class="custom-control-label"></label>
                                </div>
                            </th>
                            <th class="table-primary align-middle text-center">Nama Profil</th>
                            <th class="table-primary align-middle text-center">URL</th>
                            <th class="table-primary align-middle text-center">NPSN</th>
                            <th class="table-primary align-middle text-center">Token</th>
                            <th class="table-primary align-middle text-center">Status</th>
                            <th class="table-primary align-middle text-center">Status<br>Koneksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalFormKoneksiDapodik" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Koneksi Dapodik</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formKoneksiDapodik">
                    <input type="hidden" id="idKoneksi">
                    <div class="form-group row">
                        <label for="namaProfil" class="col-sm-3 col-form-label">Nama Profil</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="namaProfil">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="urlProfil" class="col-sm-3 col-form-label">Alamat URL/IP</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="urlProfil">
                            <div class="form-text small text-muted">Tanpa http maupun https.</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="portUrl" class="col-sm-3 col-form-label">Port</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="portUrl">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="npsnProfil" class="col-sm-3 col-form-label">NPSN</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="npsnProfil">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tokenProfil" class="col-sm-3 col-form-label">Token</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tokenProfil">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="btnSimpanFormKoneksiDapodik">Simpan</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalRiwayatTestKoneksiDapodik" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Riwayat Testing Koneksi Dapodik</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>