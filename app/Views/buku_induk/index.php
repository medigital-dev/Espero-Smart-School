<?= $this->extend('templates/admin'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12" id="tabelColumn">
        <div class="card">
            <div class="card-body">
                <div class="btn-toolbar mb-2">
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-primary" title="Reload Tabel" id="btnReloadTable"><i class="fas fa-redo-alt fa-fw"></i></button>
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-primary" title="Sinkron dengan Dapodik" id="btnSinkronPdDapodik"><i class="fas fa-sync-alt fa-fw"></i></button>
                        <button type="button" class="btn btn-primary" title="Import Dapodik" data-target="#modalImportDapodik" data-toggle="modal"><i class="fas fa-file-import fa-fw"></i></button>

                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-primary" title="Mutasi"><i class="fas fa-people-arrows fa-fw"></i></button>
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-primary" title="Cetak Buku Induk"><i class="fas fa-print fa-fw"></i></button>
                    </div>
                    <div class="my-1 mr-1 ml-auto">
                        <input class="form-control form-control-sm" type="text" id="cariPd" placeholder="Cari..." aria-label="Search">
                    </div>
                    <div class="input-group input-group-sm my-1 mr-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Status</span>
                        </div>
                        <select id="selectFilter" class="custom-select" id="selectStatusPd">
                            <option value="aktif">Aktif</option>
                            <option value="mutasi">Mutasi</option>
                            <option value="all">Semua</option>
                        </select>
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-1" role="group">
                        <button type="button" class="btn btn-primary" title="Filter" id="filterData"><i class="fas fa-filter fa-fw"></i></button>
                    </div>
                </div>
                <table class="table table-bordered table-hover w-100" id="tableBukuIndukPesertaDidik">
                    <thead>
                        <tr>
                            <th class="table-primary align-middle text-center" style="width: 10px;">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="checkAllRow">
                                    <label for="checkAllRow" class="custom-control-label"></label>
                                </div>
                            </th>
                            <th class="table-primary align-middle text-center">Nama</th>
                            <th class="table-primary align-middle text-center">NIS</th>
                            <th class="table-primary align-middle text-center">NISN</th>
                            <th class="table-primary align-middle text-center">Jenis<br>Kelamin</th>
                            <th class="table-primary align-middle text-center">Tempat<br>Lahir</th>
                            <th class="table-primary align-middle text-center">Tanggal<br>Lahir</th>
                            <th class="table-primary align-middle text-center">Tanggal<br>Registrasi</th>
                            <th class="table-primary align-middle text-center">Jenis<br>Registrasi</th>
                            <th class="table-primary align-middle text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-4 d-none" id="filterColumn">
        <div class="card card-body">
            <h5>filter data</h5>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="overlay">
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
        </div>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>