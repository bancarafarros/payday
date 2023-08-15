<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>
<?= $this->session->flashdata('alert'); ?>
<a class="btn btn-sm btn-primary mb-3" href="<?= base_url('admin/DataJabatan/halamanTambahJabatan') ?>"><i class="fas fa-plus mr-2"></i>Tambah jabatan</a>
<table class="table table-responsive table-bordered table-striped mt-2">
    <tr>
        <th class="text-center">No</th>
        <th class="text-center">Nama Jabatan</th>
        <th class="text-center">Gaji Pokok</th>
        <th class="text-center">Tunjangan Transport</th>
        <th class="text-center">Uang Makan</th>
        <th class="text-center">Total</th>
        <th class="text-center">Aksi</th>
    </tr>
    <tr>
        <?php $no = 1; ?>
        <?php foreach ($jabatan as $jbtn) : ?>
        <td><?= $no++ ?></td>
        <td><?= $jbtn->nama_jabatan ?></td>
        <td>Rp<?= number_format($jbtn->gaji_pokok, 0, ',','.') ?></td>
        <td>Rp<?= number_format($jbtn->tj_transport, 0, ',','.') ?></td>
        <td>Rp<?= number_format($jbtn->uang_makan, 0, ',','.') ?></td>
        <td>Rp<?= number_format($jbtn->gaji_pokok + $jbtn->tj_transport + $jbtn->uang_makan, 0, ',','.') ?></td>
        <td>
            <center>
                <a class="btn btn-sm btn-warning" href="<?= base_url('admin/DataJabatan/update/' . $jbtn->id_jabatan) ?>"><i class="fas fa-edit"></i></a>
                <a onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger" href="<?= base_url('admin/DataJabatan/delete/' . $jbtn->id_jabatan) ?>"><i class="fas fa-trash"></i></a>
            </center>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->