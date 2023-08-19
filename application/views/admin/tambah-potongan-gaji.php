<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>

<div class="card">
    <div class="card-body" style="width: 65%">
        <form action="<?= base_url('admin/PotonganGaji/tambahPotonganGaji') ?>" method="post">
            <div class="form-group">
                <label for="">Jenis Potongan</label>
                <input type="text" name="potongan" class="form-control"><?= form_error('potongan', '<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label for="">Jumlah Potongan</label>
                <input type="number" name="jml_potongan" class="form-control"><?= form_error('jml_potongan', '<div class="text-small text-danger"></div>') ?>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->