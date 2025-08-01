<div class="offcanvas offcanvas-end" id="offcanvasEdit-dataPd">
    <div class="offcanvas-header sticky-top bg-light">
        <div class="d-flex align-items-center">
            <div class="mr-2 photo-profile">
                <a href="<?= base_url('assets/img/users/_default.png'); ?>" data-fancybox>
                    <img src="<?= base_url('assets/img/users/_default.png'); ?>" class=" img-thumbnail img-circle" alt="Default user photo">
                </a>
            </div>
            <h5 class="text-bold">Data Peserta Didik</h5>
        </div>
        <button class="close" data-toggle="offcanvas" data-target=".offcanvas">&times;</button>
    </div>
    <div class="offcanvas-body pt-0">
        <div class="overlay-wrapper">
            <div class="overlay d-none"><i class="fas fa-spinner fa-spin"></i></div>
            <input type="hidden" name="peserta_didik_id" id="detailPd-id">
            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-tabs sticky-top mr-3" id="tabs-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active btn-tooltip idPd" data-placement="right" title="Profil" id="tabs-profil-tab" data-toggle="tab" href="#tabs-profile" role="tab" aria-controls="tabs-profil" aria-selected="true"><i class="fas fa-id-card-alt fa-fw"></i></a>
                    <a class="nav-link btn-tooltip idPd" data-placement="right" title="Identitas" id="tabs-identitas-tab" data-toggle="tab" href="#tabs-identitas" role="tab" aria-controls="tabs-identitas" aria-selected="false"><i class="fas fa-user-alt fa-fw"></i></a>
                    <a class="nav-link btn-tooltip idPd" data-placement="right" title="Alamat" id="tabs-alamat-tab" data-toggle="tab" href="#tabs-alamat" role="tab" aria-controls="tabs-alamat" aria-selected="false"><i class="fas fa-map-marked-alt fa-fw"></i></a>
                    <a class="nav-link btn-tooltip idPd" data-placement="right" title="Orangtua/Wali" id="tabs-ortuwali-tab" data-toggle="tab" href="#tabs-ortuwali" role="tab" aria-controls="tabs-ortuwali" aria-selected="false"><i class="fas fa-restroom fa-fw"></i></a>
                    <a class="nav-link btn-tooltip idPd" data-placement="right" title="Kontak" id="tabs-kontak-tab" data-toggle="tab" href="#tabs-kontak" role="tab" aria-controls="tabs-kontak" aria-selected="false"><i class="fas fa-address-book fa-fw"></i></a>
                    <a class="nav-link btn-tooltip idPd" data-placement="right" title="Beasiswa" id="tabs-beasiswa-tab" data-toggle="tab" href="#tabs-beasiswa" role="tab" aria-controls="tabs-beasiswa" aria-selected="false"><i class="fas fa-credit-card fa-fw"></i></a>
                    <a class="nav-link btn-tooltip idPd" data-placement="right" title="Registrasi" id="tabs-registrasi-tab" data-toggle="tab" href="#tabs-registrasi" role="tab" aria-controls="tabs-registrasi" aria-selected="false"><i class="fas fa-user-check fa-fw"></i></a>
                    <a class="nav-link btn-tooltip idPd" data-placement="right" title="Peserta Didik Keluar" id="tabs-mutasi-tab" data-toggle="tab" href="#tabs-mutasi" role="tab" aria-controls="tabs-mutasi" aria-selected="false"><i class="fas fa-user-slash fa-fw"></i></a>
                    <a class="nav-link btn-tooltip idPd" data-placement="right" title="Kelulusan" id="tabs-kelulusan-tab" data-toggle="tab" href="#tabs-kelulusan" role="tab" aria-controls="tabs-kelulusan" aria-selected="false"><i class="fas fa-user-graduate fa-fw"></i></a>
                    <a class="nav-link btn-tooltip idPd" data-placement="right" title="Kesejahteraan" id="tabs-kesejahteraan-tab" data-toggle="tab" href="#tabs-kesejahteraan" role="tab" aria-controls="tabs-kesejahteraan" aria-selected="false"><i class="fas fa-hands-helping fa-fw"></i></a>
                    <a class="nav-link btn-tooltip idPd" data-placement="right" title="Riwayat Penyakit" id="tabs-penyakit-tab" data-toggle="tab" href="#tabs-penyakit" role="tab" aria-controls="tabs-penyakit" aria-selected="false"><i class="fas fa-book-medical fa-fw"></i></a>
                    <a class="nav-link btn-tooltip idPd" data-placement="right" title="Data Periodik" id="tabs-periodik-tab" data-toggle="tab" href="#tabs-periodik" role="tab" aria-controls="tabs-periodik" aria-selected="false"><i class="fas fa-chart-line fa-fw"></i></a>
                    <a class="nav-link btn-tooltip idPd" data-placement="right" title="Prestasi" id="tabs-prestasi-tab" data-toggle="tab" href="#tabs-prestasi" role="tab" aria-controls="tabs-prestasi" aria-selected="false"><i class="fas fa-trophy fa-fw"></i></a>
                    <a class="nav-link btn-tooltip idPd" data-placement="right" title="Kebutuhan Khusus" id="tabs-difabel-tab" data-toggle="tab" href="#tabs-difabel" role="tab" aria-controls="tabs-difabel" aria-selected="false"><i class="fas fa-wheelchair fa-fw"></i></a>
                    <a class="nav-link btn-tooltip idPd" data-placement="right" title="Rombongan Belajar" id="tabs-rombel-tab" data-toggle="tab" href="#tabs-rombel" role="tab" aria-controls="tabs-rombel" aria-selected="false"><i class="fas fa-users fa-fw"></i></a>
                </div>
                <div class="tab-content w-100" id="tabs-tabContent">
                    <div class="tab-pane fade" id="tabs-rombel" role="tabpanel" aria-labelledby="tabs-rombel-tab">
                        <div class="pt-1 sticky-top align-items-center bg-white mb-2">
                            <div class="d-flex justify-content-between align-items-center mb-2 mt-2">
                                <h6 class="text-bold">Rombongan Belajar</h6>
                            </div>
                            <ul class="nav nav-tabs" id="rombel-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tabs-list-rombel-tab" data-toggle="tab" href="#tabs-list-rombel" role="tab" aria-controls="tabs-list-rombel" aria-selected="true">List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-tambah-rombel-tab" data-toggle="tab" href="#tabs-tambah-rombel" role="tab" aria-controls="tabs-tambah-rombel" aria-selected="false">Tambah</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content mb-4" id="tabs-tabRombel">
                            <div class="tab-pane fade" id="tabs-tambah-rombel" role="tabpanel" aria-labelledby="tabs-tambah-rombel-tab">
                                <form id="formData-tabsTambahRombel">
                                    <div class="form-group mb-2">
                                        <label for="tabsTambahRombel-namaRombel" class="small mb-1">Nama Rombel</label>
                                        <select class="custom-select mb-2 select2-getRombel" id="tabsTambahRombel-namaRombel" name="rombel_id"></select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="small mb-1" for="tabsTambahRombel-jenisRegistrasi">Jenis Registrasi</label>
                                        <select class="custom-select select2 mb-2 select2-getReferensi" data-referensi="jenisRegistrasi" data-tags="true" id="tabsTambahRombel-jenisRegistrasi" name="jenis_registrasi_rombel"></select>
                                    </div>
                                </form>
                                <hr>
                                <button type="button" class="btn btn-primary btn-sm mb-2" id="btnRun-saveRombel"><i class="fas fa-save mr-1"></i>Simpan</button>
                            </div>
                            <div class="tab-pane fade active show" id="tabs-list-rombel" role="tabpanel" aria-labelledby="tabs-list-rombel-tab">
                                <div class="list-group" id="listRombel"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-difabel" role="tabpanel" aria-labelledby="tabs-difabel-tab">
                        <div class="py-2 sticky-top align-items-center border-bottom bg-white d-flex justify-content-between mb-2">
                            <h6 class="text-bold">Kebutuhan Khusus</h6>
                        </div>
                        <form id="formData-tabsTambahDifabelPd">
                            <div class="form-group mb-2">
                                <label for="tabsDifabel-bidangDifabel" class="small mb-1">Tambah Kebutuhan Khusus</label>
                                <div class="input-group">
                                    <select class="custom-select mb-2 select2-getReferensi" data-referensi="jenisKebutuhanKhusus" data-tags="true" id="tabsDifabel-bidangDifabel" name="ref_id"></select>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" data-toggle="tooltip" data-title="Simpan" id="btnRun-saveDifabel">
                                            <div class="fas fa-save"></div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="list-group" id="listDifabelPd"></div>
                    </div>
                    <div class="tab-pane fade" id="tabs-prestasi" role="tabpanel" aria-labelledby="tabs-prestasi-tab">
                        <div class="pt-1 sticky-top align-items-center bg-white mb-2">
                            <div class="d-flex justify-content-between align-items-center mb-2 mt-2">
                                <h6 class="text-bold">Prestasi</h6>
                            </div>
                            <ul class="nav nav-tabs" id="prestasi-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tabs-list-prestasi-tab" data-toggle="tab" href="#tabs-list-prestasi" role="tab" aria-controls="tabs-list-prestasi" aria-selected="true">List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-tambah-prestasi-tab" data-toggle="tab" href="#tabs-tambah-prestasi" role="tab" aria-controls="tabs-tambah-prestasi" aria-selected="false">Tambah</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content mb-4" id="tabs-tabPrestasi">
                            <div class="tab-pane fade" id="tabs-tambah-prestasi" role="tabpanel" aria-labelledby="tabs-tambah-prestasi-tab">
                                <form id="formData-tabsTambahPrestasiPd">
                                    <div class="form-group mb-2">
                                        <label for="tabsTambahPrestasi-bidangPrestasi" class="small mb-1">Bidang Prestasi</label>
                                        <select class="custom-select mb-2 select2-getReferensi" data-referensi="bidangPrestasi" data-tags="true" id="tabsTambahPrestasi-bidangPrestasi" name="bidang_id"></select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="tabsTambahPrestasi-tingkatPrestasi" class="small mb-1">Tingkat Prestasi</label>
                                        <select class="custom-select mb-2 select2-getReferensi" data-referensi="tingkatPrestasi" data-tags="true" id="tabsTambahPrestasi-tingkatPrestasi" name="bidang_id"></select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="small mb-1" for="tabsTambahPrestasi-nama">Nama Kejuaraan/Perlombaan</label>
                                        <textarea id="tabsTambahPrestasi-nama" name="nama" class="form-control" rows="2" aria-describedby="namaHelp"></textarea>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="small mb-1" for="tabsTambahPrestasi-penyelenggara">Penyelenggara</label>
                                        <textarea id="tabsTambahPrestasi-penyelenggara" name="penyelenggara" class="form-control" rows="2" aria-describedby="penyelenggaraHelp"></textarea>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="small mb-1" for="tabsTambahPrestasi-tahun">Tahun</label>
                                        <input type="text" id="tabsTambahPrestasi-tahun" name="tahun" class="form-control onlyInt" aria-describedby="tahunHelp">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="small mb-1" for="tabsTambahPrestasi-hasil">Hasil</label>
                                        <input type="text" id="tabsTambahPrestasi-hasil" name="hasil" class="form-control" aria-describedby="hasilHelp">
                                    </div>
                                </form>
                                <hr>
                                <button type="button" class="btn btn-primary btn-sm mb-2" id="btnRun-savePrestasi"><i class="fas fa-save mr-1"></i>Simpan</button>
                            </div>
                            <div class="tab-pane fade active show" id="tabs-list-prestasi" role="tabpanel" aria-labelledby="tabs-list-prestasi-tab">
                                <div class="list-group" id="listPrestasiPd"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-periodik" role="tabpanel" aria-labelledby="tabs-periodik-tab">
                        <div class="pt-1 sticky-top align-items-center bg-white mb-2">
                            <div class="d-flex justify-content-between align-items-center mb-2 mt-2">
                                <h6 class="text-bold">Data Periodik</h6>
                            </div>
                            <ul class="nav nav-tabs" id="periodik-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tabs-list-periodik-tab" data-toggle="tab" href="#tabs-list-periodik" role="tab" aria-controls="tabs-list-periodik" aria-selected="true">List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-grafik-periodik-tab" data-toggle="tab" href="#tabs-grafik-periodik" role="tab" aria-controls="tabs-grafik-periodik" aria-selected="true">Grafik</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-tambah-periodik-tab" data-toggle="tab" href="#tabs-tambah-periodik" role="tab" aria-controls="tabs-tambah-periodik" aria-selected="false">Tambah</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content mb-4" id="tabs-tabPeriodik">
                            <div class="tab-pane fade" id="tabs-grafik-periodik" role="tabpanel" aria-labelledby="tabs-grafik-periodik-tab">
                                <canvas id="pengukuranChart" class="w-100" height="300"></canvas>
                            </div>
                            <div class="tab-pane fade" id="tabs-tambah-periodik" role="tabpanel" aria-labelledby="tabs-tambah-periodik-tab">
                                <form id="formData-tabsTambahPeriodikPd">
                                    <div class="form-group mb-2">
                                        <label class="small mb-1" for="tabsTambahPeriodik-tinggiBadan">Tinggi Badan</label>
                                        <div class="input-group">
                                            <input type="text" id="tabsTambahPeriodik-tinggiBadan" class="form-control onlyInt" aria-describedby="tinggiBadanHelp">
                                            <div class="input-group-append">
                                                <span class="input-group-text">cm</span>
                                            </div>
                                            <input type="hidden" name="tinggi_badan">
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="small mb-1" for="tabsTambahPeriodik-beratBadan">Berat Badan</label>
                                        <div class="input-group">
                                            <input type="text" id="tabsTambahPeriodik-beratBadan" class="form-control onlyInt" aria-describedby="beratBadanHelp">
                                            <div class="input-group-append">
                                                <span class="input-group-text">kg</span>
                                            </div>
                                            <input type="hidden" name="berat_badan">
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="small mb-1" for="tabsTambahPeriodik-lingkatKepala">Lingkar Kepala</label>
                                        <div class="input-group">
                                            <input type="text" id="tabsTambahPeriodik-lingkatKepala" class="form-control onlyInt" aria-describedby="lingkatKepalaHelp">
                                            <div class="input-group-append">
                                                <span class="input-group-text">cm</span>
                                            </div>
                                            <input type="hidden" name="lingkar_kepala">
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <button type="button" class="btn btn-primary btn-sm mb-2" id="btnRun-savePeriodik"><i class="fas fa-save mr-1"></i>Simpan</button>
                            </div>
                            <div class="tab-pane fade active show" id="tabs-list-periodik" role="tabpanel" aria-labelledby="tabs-list-periodik-tab">
                                <div class="list-group" id="listPeriodikPd"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-penyakit" role="tabpanel" aria-labelledby="tabs-penyakit-tab">
                        <div class="pt-1 sticky-top align-items-center bg-white mb-2">
                            <div class="d-flex justify-content-between align-items-center mb-2 mt-2">
                                <h6 class="text-bold">Riwayat Penyakit</h6>
                            </div>
                            <ul class="nav nav-tabs" id="penyakit-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tabs-list-penyakit-tab" data-toggle="tab" href="#tabs-list-penyakit" role="tab" aria-controls="tabs-list-penyakit" aria-selected="true">List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-tambah-penyakit-tab" data-toggle="tab" href="#tabs-tambah-penyakit" role="tab" aria-controls="tabs-tambah-penyakit" aria-selected="false">Tambah</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content mb-4" id="tabs-tabPenyakit">
                            <div class="tab-pane fade" id="tabs-tambah-penyakit" role="tabpanel" aria-labelledby="tabs-tambah-penyakit-tab">
                                <form id="formData-tabsTambahPenyakitPd">
                                    <div class="form-group mb-2">
                                        <label class="small mb-1" for="tabsKontak-nomorKartu">Nama Penyakit</label>
                                        <textarea name="nama_penyakit" id="tabsTambahPenyakit-nomorKartu" class="form-control" rows="2" aria-describedby="penyakitHelp"></textarea>
                                        <small id="penyakitHelp" class="form-text text-muted">Nama penyakit kronis yang pernah diderita.</small>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="small mb-1" for="tabsTambahPenyakit-tahunRiwayat">Tahun Riwayat</label>
                                        <input type="text" id="tabsTambahPenyakit-tahunRiwayat" class="form-control onlyInt" aria-describedby="tahunRiwayatHelp">
                                        <input type="hidden" name="tahun_riwayat">
                                    </div>
                                </form>
                                <hr>
                                <button type="button" class="btn btn-primary btn-sm mb-2" id="btnRun-savePenyakit"><i class="fas fa-save mr-1"></i>Simpan</button>
                            </div>
                            <div class="tab-pane fade active show" id="tabs-list-penyakit" role="tabpanel" aria-labelledby="tabs-list-penyakit-tab">
                                <div class="list-group" id="listPenyakitPd"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-kesejahteraan" role="tabpanel" aria-labelledby="tabs-kesejahteraan-tab">
                        <div class="pt-1 sticky-top align-items-center bg-white mb-2">
                            <div class="d-flex justify-content-between align-items-center mb-2 mt-2">
                                <h6 class="text-bold">Kesejahteraan</h6>
                            </div>
                            <ul class="nav nav-tabs" id="kesejahteraan-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tabs-list-kesejahteraan-tab" data-toggle="tab" href="#tabs-list-kesejahteraan" role="tab" aria-controls="tabs-list-kesejahteraan" aria-selected="true">List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-tambah-kesejahteraan-tab" data-toggle="tab" href="#tabs-tambah-kesejahteraan" role="tab" aria-controls="tabs-tambah-kesejahteraan" aria-selected="false">Tambah</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content mb-4" id="tabs-tabKesejahteraan">
                            <div class="tab-pane fade" id="tabs-tambah-kesejahteraan" role="tabpanel" aria-labelledby="tabs-tambah-kesejahteraan-tab">
                                <form id="formData-tabsTambahKesejahteraanPd">
                                    <div class="form-group mb-2">
                                        <label for="tabsTambahKesejahteraan-jenisKesejahteraan" class="small mb-1">Jenis Kesejahteraan</label>
                                        <select class="custom-select mb-2 select2-getReferensi" data-referensi="jenisKesejahteraan" data-tags="true" id="tabsTambahKesejahteraan-jenisKesejahteraan" name="jenis_id"></select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="small mb-1" for="tabsKontak-nomorKartu">Nomor Kartu</label>
                                        <textarea name="nomor_kartu" id="tabsTambahKesejahteraan-nomorKartu" class="form-control" rows="2"></textarea>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="small mb-1" for="tabsKontak-namaKartu">Nama di Kartu</label>
                                        <textarea name="nama_kartu" id="tabsTambahKesejahteraan-namaKartu" class="form-control" rows="2"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group mb-2">
                                                <label class="small mb-1" for="tabsTambahKesejahteraan-tahunAwal">Tahun Awal</label>
                                                <input type="text" id="tabsTambahKesejahteraan-tahunAwal" class="form-control onlyInt" aria-describedby="tahunHelp">
                                                <input type="hidden" name="tahun_awal">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group mb-2">
                                                <label class="small mb-1" for="tabsTambahKesejahteraan-tahunAkhir">Tahun Akhir</label>
                                                <input type="text" id="tabsTambahKesejahteraan-tahunAkhir" class="form-control onlyInt" aria-describedby="tahunHelp" data-toggle="tooltip" data-title="Kosongi tahun akhir jika masih menerima.">
                                                <input type="hidden" name="tahun_akhir">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <button type="button" class="btn btn-primary btn-sm mb-2" id="btnRun-saveKesejahteraan"><i class="fas fa-save mr-1"></i>Simpan</button>
                            </div>
                            <div class="tab-pane fade active show" id="tabs-list-kesejahteraan" role="tabpanel" aria-labelledby="tabs-list-kesejahteraan-tab">
                                <div class="list-group" id="listKesejahteraanPd"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-kelulusan" role="tabpanel" aria-labelledby="tabs-kelulusan-tab">
                        <div class="pt-1 sticky-top align-items-center bg-white mb-2">
                            <div class="d-flex justify-content-between align-items-center mb-2 mt-2">
                                <h6 class="text-bold m-0">Kelulusan</h6>
                            </div>
                            <ul class="nav nav-tabs" id="kelulusan-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tabs-list-kelulusan-tab" data-toggle="tab" href="#tabs-list-kelulusan" role="tab" aria-controls="tabs-list-kelulusan" aria-selected="true">List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-tambah-kelulusan-tab" data-toggle="tab" href="#tabs-tambah-kelulusan" role="tab" aria-controls="tabs-tambah-kelulusan" aria-selected="false">Tambah</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content mb-4" id="tabs-tabKelulusan">
                            <div class="tab-pane fade" id="tabs-tambah-kelulusan" role="tabpanel" aria-labelledby="tabs-tambah-kelulusan-tab">
                                <form id="formData-tabsKelulusan">
                                    <div class="form-group mb-2">
                                        <label class="small mb-1" for="tabsKelulusan-tanggalKelulusan">Tanggal Kelulusan</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control tanggal" id="tabsKelulusan-tanggalKelulusan" data-inputmask-alias="datetime" placeholder="Tanggal Kelulusan" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                            <div class="input-group-append" data-target="#tabsKelulusan-tanggalKelulusan" data-toggle="datetimepicker">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="hidden" id="tabsKelulusan-tanggalKelulusanDb" name="tanggal">
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="small mb-1" for="tabsKelulusan-jenjangPendidikan">Jenjang Pendidikan</label>
                                        <select class="custom-select mb-2 select2-getReferensi" data-referensi="pendidikan" data-tags="true" id="tabsKelulusan-jenjangPendidikan" name="jenjang_id"></select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="small mb-1" for="tabsKelulusan-namaSekolah">Nama Satuan Pendidikan</label>
                                        <textarea name="nama_sekolah" id="tabsKelulusan-namaSekolah" class="form-control" rows="1"></textarea>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="small mb-1" for="tabsKelulusan-npsn">NPSN</label>
                                        <input type="text" name="npsn" id="tabsKelulusan-npsn" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="small mb-1" for="tabsKelulusan-kurikulumKelulusan">Kurikulum</label>
                                        <select class="custom-select mb-2 select2-getReferensi" data-referensi="kurikulum" data-tags="true" id="tabsKelulusan-kurikulumKelulusan" name="kurikulum"></select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="small mb-1" for="tabsKelulusan-nomorIjazah">Nomor Ijazah</label>
                                        <textarea name="nomor_ijazah" id="tabsKelulusan-nomorIjazah" class="form-control" rows="1"></textarea>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="small mb-1" for="tabsKelulusan-nomorSkhun">Nomor SKHUN</label>
                                        <textarea name="nomor_skhun" id="tabsKelulusan-nomorSkhun" class="form-control" rows="1"></textarea>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="small mb-1" for="tabsKelulusan-nomorUjian">Nomor Ujian</label>
                                        <textarea name="nomor_ujian" id="tabsKelulusan-nomorUjian" class="form-control" rows="1"></textarea>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="small mb-1" for="tabsKelulusan-penandatangan">Penandatangan</label>
                                        <textarea name="penandatangan" id="tabsKelulusan-penandatangan" class="form-control" rows="1"></textarea>
                                    </div>
                                </form>
                                <hr>
                                <button class="btn btn-sm btn-primary mb-2" data-toggle="tooltip" data-title="Simpan" id="btnRun-saveKelulusanPd"><i class="fas fa-save mr-1"></i><span>Simpan</span></button>
                            </div>
                            <div class="tab-pane fade active show" id="tabs-list-kelulusan" role="tabpanel" aria-labelledby="tabs-list-kelulusan-tab">
                                <div class="list-group" id="listKelulusan"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-mutasi" role="tabpanel" aria-labelledby="tabs-mutasi-tab">
                        <div class="py-2 sticky-top align-items-center border-bottom bg-white d-flex justify-content-between mb-2">
                            <h6 class="text-bold m-0">Peserta Didik Keluar</h6>
                            <div>
                                <button class="btn btn-sm btn-link" data-toggle="tooltip" data-title="Simpan" id="btnRun-saveMutasiPd"><i class="fas fa-save"></i></button>
                                <button class="btn btn-sm btn-link text-danger" data-toggle="tooltip" data-title="Batalkan" id="btnRun-deleteMutasiPd"><i class="fas fa-ban"></i></button>
                            </div>
                        </div>
                        <form id="formData-tabsMutasi">
                            <div class="form-group mb-2">
                                <label class="small mb-1" for="tabsMutasi-jenisMutasi">Jenis PD Keluar</label>
                                <select class="custom-select mb-2 select2-getReferensi" data-referensi="jenisMutasi" data-tags="true" id="tabsMutasi-jenisMutasi" name="jenis"></select>
                            </div>
                            <div class="form-group mb-2">
                                <label class="small mb-1" for="tabsMutasi-tanggalMutasi">Tanggal Mutasi</label>
                                <div class="input-group">
                                    <input type="text" class="form-control tanggal" id="tabsMutasi-tanggalMutasi" data-inputmask-alias="datetime" placeholder="Tanggal Mutasi" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                    <div class="input-group-append" data-target="#tabsMutasi-tanggalMutasi" data-toggle="datetimepicker">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="hidden" id="tabsMutasi-tanggalMutasiDb" name="tanggal">
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label class="small mb-1" for="tabsMutasi-alasanMutasi">Alasan</label>
                                <textarea name="alasan" id="tabsMutasi-alasanMutasi" class="form-control" rows="2"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label class="small mb-1" for="tabsMutasi-sekolahTujuan">Sekolah Tujuan</label>
                                <textarea name="sekolah_tujuan" id="tabsMutasi-sekolahTujuan" class="form-control" rows="2"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="tabs-registrasi" role="tabpanel" aria-labelledby="tabs-registrasi-tab">
                        <div class="py-2 sticky-top align-items-center border-bottom bg-white d-flex justify-content-between mb-2">
                            <h6 class="text-bold m-0">Registrasi</h6>
                            <div>
                                <button class="btn btn-sm btn-link" data-toggle="tooltip" data-title="Simpan" id="btnRun-saveRegistrasiPd"><i class="fas fa-save"></i></button>
                                <button class="btn btn-sm btn-link text-danger" data-toggle="tooltip" data-title="Batalkan" id="btnRun-deleteRegistrasiPd"><i class="fas fa-ban"></i></button>
                            </div>
                        </div>
                        <form id="formData-tabsRegistrasi">
                            <div class="form-group mb-2">
                                <label class="small mb-1" for="tabsRegistrasi-jenisRegistrasi">Jenis Registrasi</label>
                                <select class="custom-select mb-2 select2-getReferensi" data-referensi="jenisRegistrasi" data-tags="true" id="tabsRegistrasi-jenisRegistrasi" name="jenis_registrasi"></select>
                            </div>
                            <div class="form-group mb-2">
                                <label class="small mb-1" for="tabsRegistrasi-tanggalRegistrasi">Tanggal Registrasi</label>
                                <div class="input-group">
                                    <input type="text" class="form-control tanggal" id="tabsRegistrasi-tanggalRegistrasi" data-inputmask-alias="datetime" placeholder="Tanggal Registrasi" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                    <div class="input-group-append" data-target="#tabsRegistrasi-tanggalRegistrasi" data-toggle="datetimepicker">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="hidden" id="tabsRegistrasi-tanggalRegistrasiDb" name="tanggal_registrasi">
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label class="small mb-1" for="tabsRegistrasi-nipd">Nomor Induk Peserta Didik</label>
                                <input type="text" class="form-control" id="tabsRegistrasi-nipd" name="nipd">
                            </div>
                            <div class="form-group mb-2">
                                <label class="small mb-1" for="tabsRegistrasi-asalSekolah">Asal Sekolah</label>
                                <textarea name="asal_sekolah" id="tabsRegistrasi-asalSekolah" class="form-control" rows="2"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="tabs-beasiswa" role="tabpanel" aria-labelledby="tabs-beasiswa-tab">
                        <div class="pt-1 sticky-top align-items-center bg-white mb-2">
                            <div class="d-flex justify-content-between align-items-center mb-2 mt-2">
                                <h6 class="text-bold">Beasiswa</h6>
                            </div>
                            <ul class="nav nav-tabs" id="beasiswa-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tabs-list-beasiswa-tab" data-toggle="tab" href="#tabs-list-beasiswa" role="tab" aria-controls="tabs-list-beasiswa" aria-selected="true">List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-tambah-beasiswa-tab" data-toggle="tab" href="#tabs-tambah-beasiswa" role="tab" aria-controls="tabs-tambah-beasiswa" aria-selected="false">Tambah</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content mb-4" id="tabs-tabBeasiswa">
                            <div class="tab-pane fade" id="tabs-tambah-beasiswa" role="tabpanel" aria-labelledby="tabs-tambah-beasiswa-tab">
                                <form id="formData-tabsTambahBeasiswaPd">
                                    <div class="form-group mb-2">
                                        <label for="tabsTambahBeasiswa-jenisBeasiswa" class="small mb-1">Jenis Beasiswa</label>
                                        <select class="custom-select mb-2 select2-getReferensi" data-referensi="jenisBeasiswa" data-tags="true" id="tabsTambahBeasiswa-jenisBeasiswa" name="jenis_id"></select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="small mb-1" for="tabsKontak-uraian">Uraian</label>
                                        <textarea name="uraian" id="tabsTambahBeasiswa-uraian" class="form-control" rows="2"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group mb-2">
                                                <label class="small mb-1" for="tabsTambahBeasiswa-tahunAwal">Tahun Awal</label>
                                                <input type="text" id="tabsTambahBeasiswa-tahunAwal" class="form-control onlyInt" aria-describedby="tahunHelp">
                                                <input type="hidden" name="tahun_awal">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group mb-2">
                                                <label class="small mb-1" for="tabsTambahBeasiswa-tahunAkhir">Tahun Akhir</label>
                                                <input type="text" id="tabsTambahBeasiswa-tahunAkhir" class="form-control onlyInt" aria-describedby="tahunHelp" data-toggle="tooltip" data-title="Kosongi tahun akhir jika masih menerima.">
                                                <input type="hidden" name="tahun_akhir">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="tabsTambahBeasiswa-nominal" class="small mb-1">Nominal</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="text" id="tabsTambahBeasiswa-nominal" class="form-control onlyInt" data-currency="true" aria-describedby="nominalHelp">
                                            <input type="hidden" name="nominal">
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="tabsTambahBeasiswa-satuan" class="small mb-1">Satuan</label>
                                        <select class="custom-select select2 mb-2 select2-getReferensi" data-referensi="satuan" data-tags="true" id="tabsTambahBeasiswa-satuan" name="satuan_id"></select>
                                    </div>
                                </form>
                                <hr>
                                <button type="button" class="btn btn-primary btn-sm mb-2" id="btnRun-saveBeasiswa"><i class="fas fa-save mr-1"></i>Simpan</button>
                            </div>
                            <div class="tab-pane fade active show" id="tabs-list-beasiswa" role="tabpanel" aria-labelledby="tabs-list-beasiswa-tab">
                                <div class="list-group" id="listBeasiswaPd"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-kontak" role="tabpanel" aria-labelledby="tabs-kontak-tab">
                        <div class="py-2 sticky-top align-items-center border-bottom bg-white d-flex justify-content-between mb-2">
                            <h6 class="text-bold m-0">Kontak</h6>
                            <button class="btn btn-sm btn-link" data-toggle="tooltip" data-title="Simpan" id="btnRun-saveKontakPd"><i class="fas fa-save"></i></button>
                        </div>
                        <form id="formData-tabsKontak">
                            <div class="form-group mb-2">
                                <label class="small mb-1" for="tabsKontak-telepon">Telepon</label>
                                <input type="text" class="form-control" id="tabsKontak-telepon" name="telepon">
                            </div>
                            <div class="form-group mb-2">
                                <label class="small mb-1" for="tabsKontak-hp">HP/Whatsapp</label>
                                <input type="text" class="form-control" id="tabsKontak-hp" name="hp">
                            </div>
                            <div class="form-group mb-2">
                                <label class="small mb-1" for="tabsKontak-email">Email</label>
                                <textarea name="email" id="tabsKontak-email" class="form-control" rows="2"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label class="small mb-1" for="tabsKontak-website">Website</label>
                                <textarea name="website" id="tabsKontak-website" class="form-control" rows="2"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="tabs-identitas" role="tabpanel" aria-labelledby="tabs-identitas-tab">
                        <div class="py-2 sticky-top align-items-center border-bottom bg-white d-flex justify-content-between mb-2">
                            <h6 class="text-bold m-0">Identitas</h6>
                            <button class="btn btn-sm btn-link" data-toggle="tooltip" data-title="Simpan" id="btnSave-identitasPd"><i class="fas fa-save"></i></button>
                        </div>
                        <form id="formData-tabsIdentitas">
                            <div class="form-group mb-2">
                                <label class="small mb-1" for="tabsIdentitas-nama">Nama</label>
                                <textarea name="nama" id="tabsIdentitas-nama" class="form-control" rows="2"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsIdentitas-jenisKelamin" class="small mb-1">Jenis Kelamin</label>
                                <select class="custom-select select2 mb-2 select2-getReferensi" data-referensi="jenisKelamin" id="tabsIdentitas-jenisKelamin" name="jenis_kelamin"></select>
                            </div>
                            <div class="form-group mb-2">
                                <label class="small mb-1" for="tabsIdentitas-tempatLahir">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tabsIdentitas-tempatLahir" name="tempat_lahir">
                            </div>
                            <div class="form-group mb-2">
                                <label class="small mb-1" for="tabsIdentitas-tanggalLahir">Tanggal Lahir</label>
                                <div class="input-group">
                                    <input type="text" class="form-control tanggal" id="tabsIdentitas-tanggalLahir" data-inputmask-alias="datetime" placeholder="Tanggal Lahir" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                    <div class="input-group-append" data-target="#tabsIdentitas-tanggalLahir" data-toggle="datetimepicker">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="hidden" id="tabsIdentitas-tanggalLahirDb" name="tanggal_lahir">
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsIdentitas-agama" class="small mb-1">Agama</label>
                                <select class="custom-select select2 mb-2 select2-getReferensi" data-referensi="agama" id="tabsIdentitas-agama" name="agama_id"></select>
                            </div>
                            <div class="form-group mb-2">
                                <label class="small mb-1" for="tabsIdentitas-nisn" aria-describedby="nisnHelp">NISN</label>
                                <input type="text" class="form-control onlyInt" id="tabsIdentitas-nisn" name="nisn">
                                <small id="nisnHelp" class="form-text text-muted">Nomor Induk Siswa Nasional</small>
                            </div>
                            <div class="form-group mb-2">
                                <label class="small mb-1" for="tabsIdentitas-nomorAkte">Nomor Akte Kelahiran</label>
                                <input type="text" class="form-control" id="tabsIdentitas-nomorAkte" name="nomor_akte" aria-describedby="nomorAkteHelp">
                                <small id="nomorAkteHelp" class="form-text text-muted">Nomor registrasi akte kelahiran</small>
                            </div>
                            <div class="form-group mb-2">
                                <label class="small mb-1" for="tabsIdentitas-nik">NIK</label>
                                <input type="text" class="form-control onlyInt" id="tabsIdentitas-nik" name="nik" aria-describedby="nikHelp">
                                <small id="nikHelp" class="form-text text-muted">Nomor Induk Kependudukan</small>
                            </div>
                            <div class="form-group mb-2">
                                <label class="small mb-1" for="tabsIdentitas-nomorKk">Nomor KK</label>
                                <input type="text" class="form-control onlyInt" id="tabsIdentitas-nomorKk" name="nomor_kk" aria-describedby="noKKHelp">
                                <small id="noKKHelp" class="form-text text-muted">Nomor Kartu Kependudukan</small>
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsIdentitas-anakKe" class="small mb-1">Anak Ke</label>
                                <input type="text" class="form-control onlyInt" id="tabsIdentitas-anakKe" name="anak_ke" aria-describedby="anakKeHelp">
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsIdentitas-jumlahSaudara" class="small mb-1">Jumlah Saudara</label>
                                <input type="text" class="form-control onlyInt" id="tabsIdentitas-jumlahSaudara" name="jumlah_saudara" aria-describedby="jumlahSaudaraHelp">
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsIdentitas-photoProfil" class="small mb-1">Pass Foto</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="tabsIdentitas-photoProfil" name="foto_id" accept="image/jpg, image/jpeg, image/png">
                                    <label class="custom-file-label" for="tabsIdentitas-photoProfil">Pilih berkas</label>
                                </div>
                            </div>
                            <div id="previewPassfoto" class="d-none text-center mb-2">
                                <img src="#" alt="preview" class="rounded rounded-lg" width="80%">
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade active show" id="tabs-profile" role="tabpanel" aria-labelledby="tabs-profile-tab">
                        <div class="text-center pt-3 mb-3" id="tabsProfile-foto">
                            <a href="<?= base_url('assets/img/users/_default.png'); ?>" data-fancybox>
                                <img src="<?= base_url('assets/img/users/_default.png'); ?>" class="rounded rounded-lg" height="125" alt="Default user photo">
                            </a>
                        </div>
                        <h3 class="profile-username text-center" id="tabsProfile-nama"></h3>
                        <div class="text-center w-100 d-flex justify-content-center mb-3">
                            <span data-toggle="tooltip" data-title="Status" class="badge bg-success mx-1" id="tabsProfile-status"></span>
                            <span data-toggle="tooltip" data-title="NIS" class="badge bg-primary mx-1" id="tabsProfile-nipd"></span>
                            <span data-toggle="tooltip" data-title="NISN" class="badge bg-danger mx-1" id="tabsProfile-nisn"></span>
                        </div>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item py-2">
                                <p class="text-bold mb-0 small">Jenis Kelamin</p>
                                <a class="" id="tabsProfile-jk"></a>
                            </li>
                            <li class="list-group-item py-2">
                                <p class="text-bold mb-0 small">Tempat Lahir</p>
                                <a class="" id="tabsProfile-tempatLahir"></a>
                            </li>
                            <li class="list-group-item py-2">
                                <p class="text-bold mb-0 small">Tanggal Lahir</p>
                                <a class="" id="tabsProfile-tanggalLahir"></a>
                            </li>
                            <li class="list-group-item py-2">
                                <p class="text-bold mb-0 small">NIK</p>
                                <a class="" id="tabsProfile-nik"></a>
                            </li>
                            <li class="list-group-item py-2">
                                <p class="text-bold mb-0 small">Nama Ibu Kandung</p>
                                <a class="" id="tabsProfile-ibu"></a>
                            </li>
                            <li class="list-group-item py-2">
                                <p class="text-bold mb-0 small">Nomor HP</p>
                                <a class="" id="tabsProfile-hp"></a>
                            </li>
                            <li class="list-group-item py-2">
                                <p class="text-bold mb-0 small">Alamat</p>
                                <a class="" id="tabsProfile-alamat"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="tabs-alamat" role="tabpanel" aria-labelledby="tabs-alamat-tab">
                        <div class="py-2 sticky-top align-items-center border-bottom bg-white d-flex justify-content-between mb-2">
                            <h6 class="text-bold m-0">Alamat</h6>
                            <button class="btn btn-sm btn-link" data-toggle="tooltip" data-title="Simpan" id="btnSave-alamatPd"><i class="fas fa-save"></i></button>
                        </div>
                        <form id="formData-tabsAlamat">
                            <div class="form-group mb-2">
                                <label class="small mb-1" for="tabsAlamat-nama">Alamat Jalan</label>
                                <textarea name="alamat_jalan" id="tabsAlamat-alamatJalan" class="form-control" rows="2"></textarea>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-2">
                                        <label for="tabsAlamat-rt" class="small mb-1">RT</label>
                                        <input type="number" name="rt" id="tabsAlamat-rt" class="form-control onlyInt">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group mb-2">
                                        <label for="tabsAlamat-rw" class="small mb-1">RW</label>
                                        <input type="number" name="rw" id="tabsAlamat-rw" class="form-control onlyInt">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsAlamat-dusun" class="small mb-1">Dusun</label>
                                <input type="text" name="dusun" id="tabsAlamat-dusun" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsAlamat-desa" class="small mb-1">Desa</label>
                                <input type="text" name="desa" id="tabsAlamat-desa" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsAlamat-kecamatan" class="small mb-1">Kecamatan</label>
                                <input type="text" name="kecamatan" id="tabsAlamat-kecamatan" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsAlamat-kabupaten" class="small mb-1">Kabupaten</label>
                                <input type="text" name="kabupaten" id="tabsAlamat-kabupaten" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsAlamat-provinsi" class="small mb-1">Provinsi</label>
                                <input type="text" name="provinsi" id="tabsAlamat-provinsi" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsAlamat-kodePos" class="small mb-1">Kode Pos</label>
                                <input type="text" name="kode_pos" id="tabsAlamat-kodePos" class="form-control onlyInt">
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsAlamat-lintang" class="small mb-1">Lintang</label>
                                <input type="text" name="lintang" id="tabsAlamat-lintang" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsAlamat-bujur" class="small mb-1">Bujur</label>
                                <input type="text" name="bujur" id="tabsAlamat-bujur" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="maps" class="small mb-1">Maps</label>
                                <div id="maps"></div>
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsAlamat-jarakRumah" class="small mb-1">Jarak Rumah</label>
                                <div class="input-group">
                                    <input type="number" name="jarak_rumah" id="tabsAlamat-jarakRumah" class="form-control" aria-describedby="jarakRumahHelp">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Km</span>
                                    </div>
                                </div>
                                <small id="jarakRumahHelp" class="form-text text-muted">Jarak rumah ke sekolah dalam kilometer.</small>
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsAlamat-waktuTempuh" class="small mb-1">Waktu Tempuh</label>
                                <div class="input-group">
                                    <input type="number" name="waktu_tempuh" id="tabsAlamat-waktuTempuh" class="form-control" aria-describedby="waktuTempuhHelp">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Menit</span>
                                    </div>
                                </div>
                                <small id="waktuTempuhHelp" class="form-text text-muted">Waktu tempuh ke sekolah dalam menit.</small>
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsAlamat-jenisTinggal" class="small mb-1">Jenis Tinggal</label>
                                <select class="custom-select select2 mb-2 select2-getReferensi" data-referensi="jenisTinggal" id="tabsAlamat-jenisTinggal" name="jenis_tinggal_id" data-tags="true"></select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="tabsAlamat-alatTransportasi" class="small mb-1">Alat Transportasi</label>
                                <select class="custom-select select2 mb-2 select2-getReferensi" data-referensi="alatTransportasi" id="tabsAlamat-alatTransportasi" name="alat_transportasi_id" data-tags="true"></select>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="tabs-ortuwali" role="tabpanel" aria-labelledby="tabs-ortuwali-tab">
                        <div class="pt-1 sticky-top align-items-center bg-white mb-2">
                            <div class="d-flex justify-content-between align-items-center mb-2 mt-2">
                                <h6 class="text-bold">Orang Tua/Wali</h6>
                                <div>
                                    <button class="btn btn-sm btn-link text-danger" data-toggle="tooltip" data-title="Hapus" id="btnDelete-ortuwali"><i class="fas fa-trash-alt"></i></button>
                                    <button class="btn btn-sm btn-link" data-toggle="tooltip" data-title="Simpan" id="btnSave-ortuwali"><i class="fas fa-save"></i></button>
                                </div>
                            </div>
                            <ul class="nav nav-tabs" id="ortuwali-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tabs-ayah-tab" data-toggle="pill" href="#tabs-ayah" role="tab" aria-controls="tabs-ayah" aria-selected="true">Ayah</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-ibu-tab" data-toggle="pill" href="#tabs-ibu" role="tab" aria-controls="tabs-ibu" aria-selected="false">Ibu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-wali-tab" data-toggle="pill" href="#tabs-wali" role="tab" aria-controls="tabs-wali" aria-selected="false">Wali</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content mb-4" id="tabs-tabOrtuwali">
                            <div class="tab-pane fade active show" id="tabs-ayah" role="tabpanel" aria-labelledby="tabs-ayah-tab">
                                <input type="hidden" id="idAyah">
                                <form id="formData-tabsAyah">
                                    <div class="form-group mb-2">
                                        <label class="small mb-1" for="tabsAyah-nama">Nama</label>
                                        <textarea name="nama" id="tabsAyah-nama" class="form-control" rows="2"></textarea>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="tabsAyah-jenisKelamin" class="small mb-1">Jenis Kelamin</label>
                                        <select class="custom-select select2 mb-2 select2-getReferensi" data-referensi="jenisKelamin" id="tabsAyah-jenisKelamin" name="jenis_kelamin"></select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="tabsAyah-tempatLahir" class="small mb-1">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" id="tabsAyah-tempatLahir" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="small mb-1" for="tabsAyah-tanggalLahir">Tanggal Lahir</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control tanggal" id="tabsAyah-tanggalLahir" data-inputmask-alias="datetime" placeholder="Tanggal Lahir" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                            <div class="input-group-append" data-target="#tabsAyah-tanggalLahir" data-toggle="datetimepicker">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="hidden" id="tabsAyah-tanggalLahirDb" name="tanggal_lahir">
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="tabsAyah-nik" class="small mb-1">NIK</label>
                                        <input type="text" name="nik" id="tabsAyah-nik" class="form-control onlyInt">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="tabsAyah-agama" class="small mb-1">Agama</label>
                                        <select class="custom-select select2 mb-2 select2-getReferensi" data-referensi="agama" id="tabsAyah-agama" name="agama_id"></select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="tabsAyah-pendidikan" class="small mb-1">Pendidikan</label>
                                        <select class="custom-select select2 mb-2 select2-getReferensi" data-referensi="pendidikan" id="tabsAyah-pendidikan" name="pendidikan_id"></select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="tabsAyah-pekerjaan" class="small mb-1">Pekerjaan</label>
                                        <select class="custom-select select2 mb-2 select2-getReferensi" data-referensi="pekerjaan" id="tabsAyah-pekerjaan" name="pekerjaan_id"></select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="tabsAyah-penghasilan" class="small mb-1">Penghasilan</label>
                                        <select class="custom-select select2 mb-2 select2-getReferensi" data-referensi="penghasilan" id="tabsAyah-penghasilan" name="penghasilan_id"></select>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between mb-2">
                                        <button type="button" class="btn btn-danger btn-sm delete" id="btnRun-deleteAyah"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
                                        <button type="button" class="btn btn-primary btn-sm save" id="btnRun-saveAyah"><i class="fas fa-save mr-1"></i>Simpan</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="tabs-ibu" role="tabpanel" aria-labelledby="tabs-ibu-tab">
                                <input type="hidden" id="idIbu">
                                <form id="formData-tabsIbu">
                                    <div class="form-group mb-2">
                                        <label class="small mb-1" for="tabsIbu-nama">Nama</label>
                                        <textarea name="nama" id="tabsIbu-nama" class="form-control" rows="2"></textarea>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="tabsIbu-jenisKelamin" class="small mb-1">Jenis Kelamin</label>
                                        <select class="custom-select select2 mb-2 select2-getReferensi" data-referensi="jenisKelamin" id="tabsIbu-jenisKelamin" name="jenis_kelamin"></select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="tabsIbu-tempatLahir" class="small mb-1">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" id="tabsIbu-tempatLahir" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="small mb-1" for="tabsIbu-tanggalLahir">Tanggal Lahir</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control tanggal" id="tabsIbu-tanggalLahir" data-inputmask-alias="datetime" placeholder="Tanggal Lahir" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                            <div class="input-group-append" data-target="#tabsIbu-tanggalLahir" data-toggle="datetimepicker">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="hidden" id="tabsIbu-tanggalLahirDb" name="tanggal_lahir">
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="tabsIbu-nik" class="small mb-1">NIK</label>
                                        <input type="text" name="nik" id="tabsIbu-nik" class="form-control onlyInt">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="tabsIbu-agama" class="small mb-1">Agama</label>
                                        <select class="custom-select select2 mb-2 select2-getReferensi" data-referensi="agama" id="tabsIbu-agama" name="agama_id"></select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="tabsIbu-pendidikan" class="small mb-1">Pendidikan</label>
                                        <select class="custom-select select2 mb-2 select2-getReferensi" data-referensi="pendidikan" id="tabsIbu-pendidikan" name="pendidikan_id"></select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="tabsIbu-pekerjaan" class="small mb-1">Pekerjaan</label>
                                        <select class="custom-select select2 mb-2 select2-getReferensi" data-referensi="pekerjaan" id="tabsIbu-pekerjaan" name="pekerjaan_id"></select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="tabsIbu-penghasilan" class="small mb-1">Penghasilan</label>
                                        <select class="custom-select select2 mb-2 select2-getReferensi" data-referensi="penghasilan" id="tabsIbu-penghasilan" name="penghasilan_id"></select>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between mb-2">
                                        <button type="button" class="btn btn-danger btn-sm mb-2 delete" id="btnRun-deleteIbu"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
                                        <button type="button" class="btn btn-primary btn-sm mb-2 save" id="btnRun-saveIbu"><i class="fas fa-save mr-1"></i>Simpan</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="tabs-wali" role="tabpanel" aria-labelledby="tabs-wali-tab">
                                <input type="hidden" id="idWali">
                                <form id="formData-tabsWali">
                                    <div class="form-group mb-2">
                                        <label class="small mb-1" for="tabsWali-nama">Nama</label>
                                        <textarea name="nama" id="tabsWali-nama" class="form-control" rows="2"></textarea>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="tabsWali-jenisKelamin" class="small mb-1">Jenis Kelamin</label>
                                        <select class="custom-select select2 mb-2 select2-getReferensi" data-referensi="jenisKelamin" id="tabsWali-jenisKelamin" name="jenis_kelamin"></select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="tabsWali-tempatLahir" class="small mb-1">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" id="tabsWali-tempatLahir" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="small mb-1" for="tabsWali-tanggalLahir">Tanggal Lahir</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control tanggal" id="tabsWali-tanggalLahir" data-inputmask-alias="datetime" placeholder="Tanggal Lahir" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                            <div class="input-group-append" data-target="#tabsWali-tanggalLahir" data-toggle="datetimepicker">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="hidden" id="tabsWali-tanggalLahirDb" name="tanggal_lahir">
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="tabsWali-nik" class="small mb-1">NIK</label>
                                        <input type="text" name="nik" id="tabsWali-nik" class="form-control onlyInt">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="tabsWali-agama" class="small mb-1">Agama</label>
                                        <select class="custom-select select2 mb-2 select2-getReferensi" data-referensi="agama" id="tabsWali-agama" name="agama_id"></select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="tabsWali-pendidikan" class="small mb-1">Pendidikan</label>
                                        <select class="custom-select select2 mb-2 select2-getReferensi" data-referensi="pendidikan" id="tabsWali-pendidikan" name="pendidikan_id"></select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="tabsWali-pekerjaan" class="small mb-1">Pekerjaan</label>
                                        <select class="custom-select select2 mb-2 select2-getReferensi" data-referensi="pekerjaan" id="tabsWali-pekerjaan" name="pekerjaan_id"></select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="tabsWali-penghasilan" class="small mb-1">Penghasilan</label>
                                        <select class="custom-select select2 mb-2 select2-getReferensi" data-referensi="penghasilan" id="tabsWali-penghasilan" name="penghasilan_id"></select>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between mb-2">
                                        <button type="button" class="btn btn-danger btn-sm mb-2 delete" id="btnRun-deleteWali"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
                                        <button type="button" class="btn btn-primary btn-sm mb-2 save" id="btnRun-saveWali"><i class="fas fa-save mr-1"></i>Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>