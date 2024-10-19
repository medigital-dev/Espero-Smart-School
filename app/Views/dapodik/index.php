<?= $this->extend('templates/admin'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="btn-toolbar mb-2">
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-primary" title="Tambah Profil"><i class="fas fa-plus-circle fa-fw"></i></button>
                        <button type="button" class="btn btn-primary" title="Edit Profil"><i class="fas fa-edit fa-fw"></i></button>
                        <button type="button" class="btn btn-danger" title="Hapus Profil"><i class="fas fa-trash-alt fa-fw"></i></button>
                    </div>
                    <div class="btn-group btn-group-sm my-1 mr-2" role="group">
                        <button type="button" class="btn btn-success" title="Aktifkan Profil"><i class="fas fa-check-circle fa-fw"></i></button>
                    </div>
                </div>
                <table class="table table-bordered table-hover w-100">
                    <thead>
                        <tr>
                            <th class="table-primary align-middle text-center">
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['dapodik'] as $dapodik) : ?>
                            <tr>
                                <td class="text-center" style="width: 20px;"><?= $dapodik['checkbox']; ?></td>
                                <td><?= $dapodik['nama']; ?></td>
                                <td><?= $dapodik['url']; ?></td>
                                <td class="text-center"><?= $dapodik['npsn']; ?></td>
                                <td class="text-center"><?= $dapodik['token']; ?></td>
                                <td class="text-center"><?= $dapodik['status']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>