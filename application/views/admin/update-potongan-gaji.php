<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>

<div class="card" style="width: 60%; margin-bottom: 100px">
    <div class="card-body">
        <?php foreach ($potongan as $ptg) : ?>
        <form method="POST" action="<?= base_url('admin/PotonganGaji/updatePotonganGaji') ?>">
            <div class="form-group">
                <label for="">Potongan</label>
                <input type="hidden" name="id_potongan" class="form-control" value="<?= $ptg->id_potongan ?>">
                <input type="text" name="potongan" class="form-control" value="<?= $ptg->potongan ?>"><?= form_error('potongan', '<div class="text-small text-danger"></div>') ?>

                <label for="">Jumlah Potongan</label>
                <input type="number" name="jml_potongan" class="form-control" value="<?= $ptg->jml_potongan ?>"><?= form_error('jml_potongan', '<div class="text-small text-danger"></div>') ?>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
        <?php endforeach ?>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->