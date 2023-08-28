<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style type="text/css">
        body{
            font-family: Arial;
            color: black;
        }
    </style>
</head>
<body>
    <center>
        <h1>PT Singkong Kayang</h1>
        <h2>Daftar Gaji Pegawai</h2>
    </center>

    <?php
        if ((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulanTahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulanTahun = $bulan . $tahun;
        }
    ?>

    <table>
        <tr>
            <td>Bulan</td>
            <td>:</td>
            <td><?= $bulan ?></td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td><?= $tahun ?></td>
        </tr>
    </table>

    <table class="table table bordered table-striped">
        <tr>
            <td class="text-center">No</td>
            <td class="text-center">NIK</td>
            <td class="text-center">Nama Pegawai</td>
            <td class="text-center">Jenis Kelamin</td>
            <td class="text-center">Jabatan</td>
            <td class="text-center">Gaji Pokok</td>
            <td class="text-center">Tunjangan Transport</td>
            <td class="text-center">Uang Makan</td>
            <td class="text-center">Potongan</td>
            <td class="text-center">Total Gaji</td>
        </tr>

        <?php foreach ($potongan as $ptgn) {
            $alpha = $ptgn->jml_potongan;
        } ?>
        <?php $no = 1; ?>
        <?php foreach ($cetakGaji as $gj) : ?>
        <?php $potongan = $gj->alpha * $alpha; ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $gj->nik; ?></td>
            <td><?= $gj->nama_pegawai; ?></td>
            <td><?= $gj->jenis_kelamin; ?></td>
            <td><?= $gj->nama_jabatan; ?></td>
            <td>Rp<?= number_format($gj->gaji_pokok, 0, ',', '.'); ?></td>
            <td>Rp<?= number_format($gj->tj_transport, 0, ',', '.'); ?></td>
            <td>Rp<?= number_format($gj->uang_makan, 0, ',', '.'); ?></td>
            <td>Rp<?= number_format($potongan, 0, ',', '.'); ?></td>
            <td>Rp<?= number_format($gj->gaji_pokok + $gj->tj_transport + $gj->uang_makan - $potongan, 0, ',', '.'); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <table width="100%">
        <tr>
            <td></td>
            <td width="200px">
                <p>
                    Jakarta, <?= date("d M Y") ?>
                    <br>
                    Finance
                </p>
                <br>
                <br>
                <p>
                    ______________________________
                </p>
            </td>
        </tr>
    </table>
</body>
</html>

<script>
    window.print();
</script>