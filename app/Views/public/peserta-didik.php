<?= $this->extend('templates/public'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col" id="tabelColumn">
        <div class="card">
            <div class="card-body">
                <div class="btn-toolbar mb-2">
                    <div class="input-group input-group-sm my-1 mr-1">
                        <div class="input-group-prepend">
                            <span for="pageLenghtDt-publicPesertaDidik" class="input-group-text">Page</span>
                        </div>
                        <select id="pageLenghtDt-publicPesertaDidik" class="custom-select">
                            <option value="5">5</option>
                            <option value="15">15</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-primary" data-toggle="tooltip" data-title="Muat ulang tabel" id="btnReloadDt-publicPesertaDidik"><i class="fas fa-redo-alt fa-fw"></i></button>
                    </div>
                    <div class="my-1 mr-1 ml-lg-auto">
                        <input class="form-control form-control-sm" type="text" id="searchDt-publicPesertaDidik" placeholder="Cari Nama/NIS/NISN..." aria-label="Search">
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-1" role="group">
                        <button type="button" class="btn btn-primary" data-toggle="tooltip" data-title="Filter data Peserta Didik" id="btnFilterDt-publicPesertaDidik"><i class="fas fa-filter fa-fw"></i></button>
                    </div>
                </div>
                <table class="table table-bordered table-hover w-100 mb-2" id="dtPublic-pesertaDidik">
                    <thead>
                        <tr>
                            <th class="table-primary align-middle text-center">Nama</th>
                            <th class="table-primary align-middle text-center">NIS</th>
                            <th class="table-primary align-middle text-center">NISN</th>
                            <th class="table-primary align-middle text-center">Jenis<br>Kelamin</th>
                            <th class="table-primary align-middle text-center">Tempat<br>Lahir</th>
                            <th class="table-primary align-middle text-center">Tanggal<br>Lahir</th>
                            <th class="table-primary align-middle text-center">Alamat</th>
                            <th class="table-primary align-middle text-center">Kelas</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <div class="row">
                    <div class="col-sm-4">
                        <p class="text-center text-sm-left m-0" id="dtPageInfo-publicPesertaDidik"></p>
                    </div>
                    <div class="col-sm-auto ml-auto">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="button" id="btnPreviousDt-publicPesertaDidik"><i class="fas fa-chevron-left"></i></button>
                            </div>
                            <div class="input-group-prepend">
                                <span class="input-group-text">Halaman:</span>
                            </div>
                            <select class="custom-select" id="selectPage-publicPesertaDidik"></select>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="btnNextDt-publicPesertaDidik"><i class="fas fa-chevron-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas offcanvas-end">
    <div class="offcanvas-header">
        <h5>Filter Data Peserta Didik</h5>
        <button class="close" data-toggle="offcanvas" data-target=".offcanvas">&times;</button>
    </div>
    <div class="offcanvas-body">
        <div class="form-group row mb-2">
            <label for="selectDt-publicPesertaDidik" class="col-sm-3 col-form-label">Kelas</label>
            <div class="col-sm-9">
                <select class="custom-select select2-rombelPd" id="selectDt-publicPesertaDidik" multiple></select>
            </div>
        </div>
        <div class="form-group row mb-2">
            <label for="inputEmail3" class="col-sm-3 col-form-label">JK</label>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-6">
                        <div class="btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-sm btn-block btn-outline-primary">
                                <input type="checkbox"> L
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-sm btn-block btn-outline-primary">
                                <input type="checkbox"> P
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>