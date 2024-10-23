<div class="row">
    <div class="col">
        <table class="table table-sm table-borderless">
            <tr>
                <td style="width: 120px;">Nama Profil</td>
                <td style="width: 15px;">:</td>
                <td><?= $nama; ?></td>
            </tr>
            <tr>
                <td>Alamat URL/IP</td>
                <td>:</td>
                <td><?= $url . ':' . $port; ?></td>
            </tr>
        </table>
        <table class="table table-bordered table-hover w-100" id="tabelRiwayatTestKoneksiDapodik">
            <thead>
                <tr>
                    <th class="table-primary align-middle text-center">Tanggal</th>
                    <th class="table-primary align-middle text-center">Status</th>
                    <th class="table-primary align-middle text-center">Pesan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($riwayat as $row) : ?>
                    <tr>
                        <td class="text-center"><?= tanggal($row['tanggal_waktu'], 'd-m-Y H:i'); ?></td>
                        <td class="text-center"><?= $row['status'] ? '<i class="fas fa-check-circle text-success"></i>' : '<i class="fas fa-minus-circle text-danger"></i>'; ?></td>
                        <td><?= $row['pesan']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>