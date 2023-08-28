<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <?= $this->session->flashdata('alert'); ?>

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">Filter Data Gaji Pegawai</div>
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

                <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye mr-2"></i>Tampil data</button>
                <?php if (count($gaji) > 0) { ?>
                    <a class="btn btn-success mb-2 ml-3" href="<?= base_url('admin/DataGaji/cetakGaji?bulan='.$bulan), '&tahun='.$tahun?>"><i class="fas fa-print mr-2"></i>Cetak daftar gaji</a>
                <?php } else { ?>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success mb-2 ml-3" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-print mr-2"></i>Cetak daftar gaji</button>
                <?php } ?>
            </form>
        </div>
    </div>

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
    <div class="alert alert-info">Menampilkan Data Gaji Pegawai Bulan: <strong><?= $bulan; ?></strong> Tahun: <strong><?= $tahun; ?></strong></div>

    <?php
        $jmlData = count($gaji);
        if ($jmlData > 0) {
    ?>
    
    <table class="table table-responsive table bordered table-striped">
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
        <?php foreach ($gaji as $gj) : ?>
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

    <?php } else { ?>
        <span class="badge badge-danger"><i class="fas fa-info-circle"></i>Data masih kosong, silahkan input data absensi pada bulan dan tahun yang Anda pilih</span>
    <?php } ?>

</div>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">Data gaji masih kosong, solahkan input absensi terlebih dahulu pada bulan dan tahun yang dipilih</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>