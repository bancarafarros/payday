<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>

<div class="alert alert-success font-weight-bold mb- 4">Selamat datang, Anda login sebagai pegawai</div>

<div class="card mb-1">
    <div class="card-header font-weight-bold bg-primary text-white">Data Pegawai</div>
    <?php foreach ($pegawai as $pgw) : ?>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <img src="<?= base_url('assets/photo/') . $pgw->foto?>" width="250 px">
            </div>
            <div class="col-md-8">
                <table class="table">
                    <tr>
                        <td>Nama Pegawai</td>
                        <td>:</td>
                        <td><?= $pgw->nama_pegawai ?></td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td><?= $pgw->jabatan ?></td>
                    </tr>
                        
                    <tr>
                        <td>Tanggal Masuk</td>
                        <td>:</td>
                        <td><?= $pgw->tanggal_masuk ?></td>
                    </tr>

                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <?php if ($pgw->status == 1) { ?>
                            <td>Pegawai Tetap</td>
                        <?php } else { ?>
                            <td>Pegawai Tidak Tetap</td>
                        <?php } ?>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->