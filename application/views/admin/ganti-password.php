<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>

<div class="card" style="width: 50%;">
    <div class="card-body">
        <form action="<?= base_url('admin/GantiPassword/gantiPassword') ?>" method="post">
            <div class="form-group">
                <label for="">Password baru</label>
                <input type="password" name="passwordBaru" id="" class="form-control">
                <?= form_error('passwordBaru', '<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label for="">Ulangi password baru</label>
                <input type="password" name="ulangPassword" id="" class="form-control">
                <?= form_error('ulangPassword', '<div class="text-small text-danger"></div>') ?>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->