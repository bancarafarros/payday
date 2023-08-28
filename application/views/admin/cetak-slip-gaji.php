<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        body{
            font-family: Arial;
            color: black;
        }
    </style>
</head>
<body>
    <center>
        <h1>PT SINGKONG KAYANG</h1>
        <h2>Slip Gaji Pegawai</h2>
        <hr style="width: 50%;" border-width="5px" color="black">
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

    <?php foreach ($potongan as $ptg) {
        $nominalPotongan = $ptg->jml_potongan;
    }?>
    <?php $no=1; ?>
    <?php foreach ($slipGaji as $sg) : ?>
        <?php $potonganGaji = $sg->alpha * $nominalPotongan; ?>
    <table style="width: 100%;">
        <tr>
            <td width="20%;">Nama Pegawai</td>
            <td width="2%">:</td>
            <td><?= $sg->nama_pegawai ?></td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td><?= $sg->nik ?></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td><?= $sg->nama_jabatan ?></td>
        </tr>
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

    <table class="table table-striped table-bordered mt-3">
        <tr>
            <th class="text-center" width="5%;">No</th>
            <th class="text-center">Keterangan</th>
            <th class="text-center">Jumlah</th>
        </tr>

        <tr>
            <td>1</td>
            <td>Gaji Pokok</td>
            <td>Rp<?= number_format($sg->gaji_pokok,0,',','.') ?></td>
        </tr>

        <tr>
            <td>2</td>
            <td>Tunjangan Transport</td>
            <td>Rp<?= number_format($sg->tj_transport,0,',','.') ?></td>
        </tr>

        <tr>
            <td>3</td>
            <td>Uang Makan</td>
            <td>Rp<?= number_format($sg->uang_makan,0,',','.') ?></td>
        </tr>

        <tr>
            <td>4</td>
            <td>Potongan</td>
            <td>Rp<?= number_format($potonganGaji,0,',','.') ?></td>
        </tr>

        <tr>
            <th colspan="2" style="text-align: right;">Total Gaji</th>
            <th>Rp<?= number_format($sg->gaji_pokok + $sg->tj_transport + $sg->uang_makan - $potonganGaji,0,',','.') ?></th>
        </tr>
    </table>

    <table width="100%">
        <tr>
            <td></td>
            <td>
                <p>Pegawai</p>
                <br><br>
                <p class="font-weight-bold"><?= $sg->nama_pegawai ?></p>
            </td>

            <td width="200px">
                <p>Jakarta, <?= date("d M Y")?> <br> Finance,</p>
                <br><br>
                <p>____________________________</p>
            </td>
        </tr>
    </table>
    <?php endforeach; ?>
</body>
</html>

<script>
    // window.print();
</script>