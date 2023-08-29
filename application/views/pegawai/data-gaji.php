<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>

<table class="table table-striped table bordered">
    <tr>
        <th>Bulan/Tahun</th>
        <th>Gaji Pokok</th>
        <th>Tunjangan Transport</th>
        <th>Uang Makan</th>
        <th>Potongan</th>
        <th>Total Gaji</th>
        <th>Cetak Slip Gaji</th>
    </tr>

    <?php foreach ($potongan as $ptgn) : ?>
        <?php $nominalPotongan = $ptgn->jml_potongan; ?>
    <?php endforeach; ?>

    <?php foreach ($gaji as $gj) : ?>
    <?php $potonganGaji = $gj->alpha * $nominalPotongan ?>
        <tr>
            <td><?= $gj->bulan; ?></td>
            <td>Rp<?= number_format($gj->gaji_pokok, 0, ',', '.'); ?></td>
            <td>Rp<?= number_format($gj->tj_transport, 0, ',', '.'); ?></td>
            <td>Rp<?= number_format($gj->uang_makan, 0, ',', '.'); ?></td>
            <td>Rp<?= number_format($potonganGaji, 0, ',', '.'); ?></td>
            <td>Rp<?= number_format($gj->gaji_pokok + $gj->tj_transport + $gj->uang_makan - $potonganGaji , 0, ',', '.'); ?></td>
            <td>
                <center>
                    <a class="btn btn-primary" href="<?= base_url('pegawai/DataGaji/cetakSlipGaji/' . $gj->id_kehadiran) ?>"><i class="fas fa-print"></i></a>
                </center>
            </td>
        </tr>
    <?php endforeach ?>
</table>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->