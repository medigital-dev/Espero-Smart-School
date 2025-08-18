<?= $this->extend('templates/public'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col" id="dt-publicPrestasi">
        <div class="card">
            <div class="card-body">
                <div class="btn-toolbar mb-2">
                    <div class="input-group input-group-sm my-1 mr-1">
                        <div class="input-group-prepend">
                            <span for="pageLenghtDt-publicPrestasi" class="input-group-text">Page</span>
                        </div>
                        <select id="pageLenghtDt-publicPrestasi" class="custom-select">
                            <option value="5">5</option>
                            <option value="15">15</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-primary" data-toggle="tooltip" data-title="Muat ulang tabel" id="btnReloadDt-publicPrestasi"><i class="fas fa-redo-alt fa-fw"></i></button>
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-primary btn-tooltip" data-toggle="modal" data-title="Tambah Prestasi" data-target="#modalAddPrestasi" id="btnAdd-publicPrestasi"><i class="fas fa-plus fa-fw"></i></button>
                    </div>
                    <div class="my-1 mr-1 ml-lg-auto">
                        <input class="form-control form-control-sm" type="text" id="searchDt-publicPrestasi" data-toggle="tooltip" data-title="Pencarian Nama" placeholder="Cari..." aria-label="Search">
                    </div>
                </div>
                <table class="table table-bordered table-hover w-100 mb-2" id="dtPublic-prestasi">
                    <thead>
                        <tr>
                            <th class="table-primary align-middle text-center">No</th>
                            <th class="table-primary align-middle text-center">Tahun</th>
                            <th class="table-primary align-middle text-center">Nama</th>
                            <th class="table-primary align-middle text-center">Tingkat</th>
                            <th class="table-primary align-middle text-center">Hasil</th>
                            <th class="table-primary align-middle text-center">Event</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <div class="row">
                    <div class="col-sm-4 mb-2">
                        <p class="text-center text-sm-left m-0" id="dtPageInfo-publicPrestasi"></p>
                    </div>
                    <div class="col-sm-auto ml-auto mb-2">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="button" id="btnPreviousDt-publicPrestasi"><i class="fas fa-chevron-left"></i></button>
                            </div>
                            <div class="input-group-prepend">
                                <span class="input-group-text">Halaman</span>
                            </div>
                            <select class="custom-select" id="selectPage-publicPrestasi"></select>
                            <div class="input-group-append">
                                <span class="input-group-text" id="dtPageInfo-allHalaman"></span>
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="btnNextDt-publicPrestasi"><i class="fas fa-chevron-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= modal('addPrestasi') ?>
<?= $this->endSection(); ?>