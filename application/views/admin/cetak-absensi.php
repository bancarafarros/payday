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
        <h2>Laporan Absensi Pegawai</h2>
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
            <td><?= $bulan; ?></td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td><?= $tahun; ?></td>
        </tr>
    </table>

    <table class="table table bordered table-striped">
        <tr>
            <td class="text-center">No</td>
            <td class="text-center">Nama Pegawai</td>
            <td class="text-center">Jenis Kelamin</td>
            <td class="text-center">NIK</td>
            <td class="text-center">Jabatan</td>
            <td class="text-center">Hadir</td>
            <td class="text-center">Sakit</td>
            <td class="text-center">Izin</td>
            <td class="text-center">Alpha</td>
        </tr>

        <?php $no = 1; ?>
        <?php foreach ($laporanAbsensi as $la) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $la->nik; ?></td>
            <td><?= $la->nama_pegawai; ?></td>
            <td><?= $la->jenis_kelamin; ?></td>
            <td><?= $la->nama_jabatan; ?></td>
            <td><?= $la->hadir; ?></td>
            <td><?= $la->sakit; ?></td>
            <td><?= $la->izin; ?></td>
            <td><?= $la->alpha; ?></td>
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
    // window.print();
</script>