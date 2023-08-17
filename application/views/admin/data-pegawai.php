<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>
<?= $this->session->flashdata('alert'); ?>
<a class="btn btn-sm btn-primary mb-3" href="<?= base_url('admin/DataPegawai/halamanTambahPegawai') ?>"><i class="fas fa-plus mr-2"></i>Tambah pegawai</a>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->