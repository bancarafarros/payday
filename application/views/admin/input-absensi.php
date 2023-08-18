<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">Input Absensi Pegawai</div>
        <div class="card-body">
            <form class="form-inline">
                <div class="form-group mb-2">
                    <label for="staticEmail2" class="sr-only">Bulan</label>
                    <select class="form-control" name="bulan" id="">
                        <option value="">Pilih bulan</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div class="form-group mx-sm-3 mb-2 ml-5">
                    <label for="inputPassword2" class="sr-only">Tahun</label>
                    <select class="form-control" name="tahun" id="">
                        <option value="">Pilih tahun</option>
                        <?php $tahun = date('Y'); 
                            for ($i=2023; $i < $tahun + 5; $i++) {?>
                                <option value="<?= $i; ?>"><?= $i; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye mr-2"></i>Generate</button>
            </form>
        </div>
    </div>

    <?php 
        if ((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $dataWaktu = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('y');
            $dataWaktu = $bulan . $tahun;
        }
    ?>
    <div class="alert alert-info">Menampilkan Data Kehadiran Pegawai Bulan: <strong><?= $bulan; ?></strong> Tahun: <strong><?= $tahun; ?></strong></div>
    
    <button type="submit" class="btn btn-success mb-3">Simpan</button>
    <table class="table table bordered table-striped">
        <tr>
            <td class="text-center">No</td>
            <td class="text-center">NIK</td>
            <td class="text-center">Nama Pegawai</td>
            <td class="text-center">Jenis Kelamin</td>
            <td class="text-center">Jabatan</td>
            <td class="text-center" width="6%">Hadir</td>
            <td class="text-center" width="6%">Sakit</td>
            <td class="text-center" width="6%">Alpha</td>
        </tr>

        <?php $no = 1; ?>
        <?php foreach ($inputAbsensi as $abs) : ?>
        <tr>
            <td class="text-center"><?= $no++; ?></td>
            <td class="text-center"><?= $abs->nik; ?></td>
            <td class="text-center"><?= $abs->nama_pegawai; ?></td>
            <td class="text-center"><?= $abs->jenis_kelamin; ?></td>
            <td class="text-center"><?= $abs->jabatan; ?></td>
            <td class="text-center"><input type="number" class="form-control" name="hadir" ></td>
            <td class="text-center"><input type="number" class="form-control" name="sakit" ></td>
            <td class="text-center"><input type="number" class="form-control" name="alpha" ></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br><br><br><br><br>
</div>
<!-- /.container-fluid -->