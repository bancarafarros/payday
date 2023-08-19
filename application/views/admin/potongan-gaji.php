<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>

<?= $this->session->flashdata('alert'); ?>

<a class="btn btn-primary mb-4 mt-2" href="<?= base_url('admin/PotonganGaji/halamanTambahPotonganGaji') ?>"><i class="fas fa-plus mr-2"></i>Tambah Data</a>

<table class="table table bordered table-striped">
    <tr>
        <th class="text-center">No</th>
        <th class="text-center">Jenis Potongan</th>
        <th class="text-center">Jumlah Potongan</th>
        <th class="text-center">Aksi</th>
    </tr>

    <?php $no = 1;
    foreach ($potongan_gaji as $pg) : ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $pg->potongan ?></td>
        <td>Rp<?= number_format($pg->jml_potongan, 0, ',', '.') ?></td>
        <td>
            <center>
                <a class="btn btn-sm btn-warning" href="<?= base_url('admin/PotonganGaji/halamanUpdatePotonganGaji/' . $pg->id_potongan) ?>"><i class="fas fa-edit"></i></a>
                <a onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger" href="<?= base_url('admin/DataPegawai/deletePotonganGaji/' . $pg->id_potongan) ?>"><i class="fas fa-trash"></i></a>
            </center>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->