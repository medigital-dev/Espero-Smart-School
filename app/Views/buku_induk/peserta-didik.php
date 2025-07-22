<?= $this->extend('templates/admin'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12" id="tabelColumn">
        <div class="card">
            <div class="card-body">
                <div class="btn-toolbar mb-2">
                    <div class="input-group input-group-sm my-1 mr-2">
                        <select id="pageLenghtDt-bukuInduk" class="custom-select" data-toggle="tooltip" data-title="Jumlah data yang ditampilkan">
                            <option value="5">5</option>
                            <option value="15">15</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <div class="input-group-append">
                            <span for="pageLenghtDt-bukuInduk" class="input-group-text">entri</span>
                        </div>
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-primary" data-toggle="tooltip" data-title="Reload Tabel" id="btnReloadTable"><i class="fas fa-redo-alt fa-fw"></i></button>
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-primary" data-toggle="tooltip" data-title="Pilih Semua/Balikkan pilihan" id="btnSelectRow"><i class="fas fa-check-circle fa-fw"></i><span></span></button>
                        <button type="button" class="btn btn-primary" data-toggle="tooltip" data-title="Bersihkan pilihan" id="btnClearSelected"><i class="fas fa-dot-circle fa-fw"></i></button>
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-primary" data-toggle="tooltip" data-title="Cek Peserta Didik Baru di Dapodik" id="btnSync-checkNewPd">
                            <i class="fas fa-sync-alt fa-fw"></i>
                            <span class="badge bg-danger d-none"></span>
                        </button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon btn-tooltip" data-title="Menu update data dengan Aplikasi Dapodik" data-toggle="dropdown" data-display="static">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                            <button type="button" class="dropdown-item btn-tooltip" data-toggle="modal" data-target="#modalImportDapodik" data-title="Import dari unduhan Aplikasi Dapodik"><i class="fas fa-file-import fa-fw mr-1"></i><span>Import File Dapodik</span></button>
                            <button type="button" class="dropdown-item btn-tooltip" data-toggle="modal" data-target="#modalDapodikSync-pd" data-title="Tarik data dari Aplikasi Dapodik"><i class="fas fa-angle-double-down fa-fw mr-1"></i><span>Tarik Dapodik</span></button>
                        </div>
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-primary btn-tooltip" data-title="Import Dapodik" data-target="#modalImportDapodik" data-toggle="modal"><i class="fas fa-file-import fa-fw"></i></button>
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-primary dropdown-toggle btn-tooltip" data-toggle="dropdown" data-title="Unduhan" id="btnDropdown-unduhPd" data-autoclose="false" data-display="static"><i class="fas fa-download fa-fw"></i></button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                            <button type="button" class="dropdown-item" data-toggle="tooltip" data-title="Unduh tabel beserta filter" id="btnUnduhExcel-bukuIndukPd"><i class="fas fa-file-excel fa-fw mr-1"></i><span>Unduh Excel</span></button>
                        </div>
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-primary dropdown-toggle btn-tooltip" data-toggle="dropdown" data-title="Mutasi" data-display="static"><i class="fas fa-people-arrows fa-fw"></i></button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                            <button type="button" class="dropdown-item btn-tooltip" data-toggle="modal" data-target="#modalMutasiPd" data-title="Keluarkan peserta didik"><i class="fas fa-sign-out-alt fa-fw mr-1"></i><span>PD Keluar</span></button>
                            <button type="button" class="dropdown-item btn-tooltip" data-toggle="modal" data-target="#modalKelulusanPd" data-title="Kelulusan peserta didik"><i class="fas fa-user-graduate fa-fw mr-1"></i><span>Kelulusan</span></button>
                            <div class="dropdown-divider"></div>
                            <button type="button" class="dropdown-item" data-toggle="tooltip" data-title="Batalkan mutasi peserta didik" id="btnBatal-mutasiPd"><i class="fas fa-times-circle fa-fw mr-1"></i><span>Batalkan Mutasi</span></button>
                        </div>
                    </div>
                    <div class="my-1 mr-1 ml-sm-auto">
                        <input class="form-control form-control-sm" type="text" id="searchDt-bukuInduk" data-toggle="tooltip" data-title="Pencarian Nama/NIS/NISN/Kelas" placeholder="Cari..." aria-label="Search">
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-1" role="group">
                        <button type="button" class="btn btn-primary btn-tooltip" data-toggle="offcanvas" data-title="Filter Data" data-target="#offcanvasFilter-bukuIndukPd" id="btnFilter-bukuIndukPd"><i class="fas fa-filter fa-fw"></i></button>
                    </div>
                    <div class="input-group input-group-sm my-1" role="group">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary btnPreviousDt-bukuInduk" data-toggle="tooltip" data-title="Halaman sebelumnya" type="button"><i class="fas fa-chevron-left"></i></button>
                        </div>
                        <input type="number" class="form-control text-currentPage text-center" min="1" id="inputDtPage-bukuInduk" style="width: 60px;">
                        <div class="input-group-append">
                            <span class="input-group-text text-totalPage"></span>
                        </div>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary btnNextDt-bukuInduk" data-toggle="tooltip" data-title="Halaman selanjutnya" type="button"><i class="fas fa-chevron-right"></i></button>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-hover w-100 mb-2" id="dtAdmin-bukuIndukPd">
                    <thead>
                        <tr>
                            <th class="table-primary align-middle text-center" style="width: 10px;">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="checkAllRow">
                                    <label for="checkAllRow" class="custom-control-label"></label>
                                </div>
                            </th>
                            <th class="table-primary align-middle text-center">Status</th>
                            <th class="table-primary align-middle text-center">Nama</th>
                            <th class="table-primary align-middle text-center">NIS</th>
                            <th class="table-primary align-middle text-center">NISN</th>
                            <th class="table-primary align-middle text-center">NIK</th>
                            <th class="table-primary align-middle text-center">Jenis Kelamin</th>
                            <th class="table-primary align-middle text-center">Tempat Lahir</th>
                            <th class="table-primary align-middle text-center">Tanggal Lahir</th>
                            <th class="table-primary align-middle text-center">Agama</th>
                            <th class="table-primary align-middle text-center">Alamat</th>
                            <th class="table-primary align-middle text-center">Nomor HP</th>
                            <th class="table-primary align-middle text-center">Nama Ayah</th>
                            <th class="table-primary align-middle text-center">Nama Ibu</th>
                            <th class="table-primary align-middle text-center">Jenis Registrasi</th>
                            <th class="table-primary align-middle text-center">Tahun Registrasi</th>
                            <th class="table-primary align-middle text-center">Jenis Mutasi</th>
                            <th class="table-primary align-middle text-center">Tanggal Mutasi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <div class="row mt-2">
                    <div class="col-sm-4 mb-2">
                        <span class="text-center text-sm-left" id="dtCountChecked-bukuInduk"></span>
                        <span class="text-center text-sm-left" id="dtPageInfo-bukuInduk"></span>
                    </div>
                    <div class="col-sm-auto ml-auto mb-2">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary btnPreviousDt-bukuInduk" type="button"><i class="fas fa-chevron-left"></i></button>
                            </div>
                            <div class="input-group-prepend">
                                <span class="input-group-text">Halaman:</span>
                            </div>
                            <select class="custom-select" id="selectPage-bukuInduk"></select>
                            <div class="input-group-append">
                                <span class="input-group-text text-totalPage"></span>
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary btnNextDt-bukuInduk" type="button"><i class="fas fa-chevron-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= modal(['mutasi-pd', 'import-dapodik-pd', 'kelulusan-pd', 'batal-mutasi-pd', 'referensi', 'sync-pd']); ?>
<?= offcanvas(['filter-pd', 'edit-pd']); ?>

<?= $this->endSection(); ?>