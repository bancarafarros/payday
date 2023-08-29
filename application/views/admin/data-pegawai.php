<div class="container-fluid" style="margin-bottom: 100px;">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>
<?= $this->session->flashdata('alert'); ?>
<a class="btn btn-sm btn-primary mb-3" href="<?= base_url('admin/DataPegawai/halamanTambahPegawai') ?>"><i class="fas fa-plus mr-2"></i>Tambah pegawai</a>

<table class="table table-responsive table-bordered table-striped">
    <tr>
        <th class="text-center">No</th>
        <th class="text-center">NIK</th>
        <th class="text-center">Nama Pegawai</th>
        <th class="text-center">Jenis Kelamin</th>
        <th class="text-center">Jabatan</th>
        <th class="text-center">Tanggal Masuk</th>
        <th class="text-center">Status</th>
        <th class="text-center">Foto</th>
        <th class="text-center">Hak Akses</th>
        <th class="text-center">Username</th>
        <th class="text-center">Aksi</th>
    </tr>
    <?php $no = 1 ?>
    <?php foreach ($pegawai as $pgw) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $pgw->nik ?></td>
            <td><?= $pgw->nama_pegawai ?></td>
            <td><?= $pgw->jenis_kelamin ?></td>
            <td><?= $pgw->jabatan ?></td>
            <td><?= $pgw->tanggal_masuk?></td>
            <?php if ($pgw->status == 1) { ?>
                <td>Pegawai Tetap</td>
            <?php } else { ?>
                <td>Pegawai Tidak Tetap</td>
            <?php } ?>
            <td><img src="<?= base_url('assets/photo/') . $pgw->foto?>" alt="" width="100 px"></td>
            <?php if ($pgw->role_id == 1) { ?>
                <td>Admin</td>
            <?php } else { ?>
                <td>Pegawai</td>
            <?php } ?>
            <td><?= $pgw->username?></td>
            <td>
                <center>
                    <a class="btn btn-sm btn-warning" href="<?= base_url('admin/DataPegawai/halamanUpdatePegawai/' . $pgw->id_pegawai) ?>"><i class="fas fa-edit"></i></a>
                    <a onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger" href="<?= base_url('admin/DataPegawai/deletePegawai/' . $pgw->id_pegawai) ?>"><i class="fas fa-trash"></i></a>
                </center>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</div>
<!-- /.container-fluid -->