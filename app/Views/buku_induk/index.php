<?= $this->extend('templates/admin'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="btn-toolbar mb-2">
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-primary" title="Reload Tabel"><i class="fas fa-sync fa-fw"></i></button>
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-primary" title="Sinkron dengan Dapodik"><i class="fas fa-exchange-alt fa-fw"></i></button>
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-primary disabled" title="Registrasi">
                            <i class="fas fa-user-check fa-fw mr-1"></i>
                        </button>
                        <button type="button" class="btn btn-primary" title="Perbaharui Registrasi"><i class="fas fa-user-edit fa-fw"></i></button>
                        <button type="button" class="btn btn-danger" title="Batalkan Registrasi"><i class="fas fa-user-slash fa-fw"></i></button>
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-primary" title="Mutasi"><i class="fas fa-people-arrows fa-fw"></i></button>
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-primary" title="Cetak Buku Induk"><i class="fas fa-print fa-fw"></i></button>
                    </div>
                    <div class="my-1 mr-1 ml-auto">
                        <input class="form-control form-control-sm" type="text" id="cariKategoriTransaksi" placeholder="Cari..." aria-label="Search">
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-1" role="group">
                        <button type="button" class="btn btn-primary" title="Filter" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-filter fa-fw"></i></button>
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-1" role="group">
                        <button type="button" class="btn btn-primary" title="Pengaturan" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-cog fa-fw"></i></button>
                    </div>
                </div>
                <table class="table table-bordered table-hover w-100">
                    <thead>
                        <tr>
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