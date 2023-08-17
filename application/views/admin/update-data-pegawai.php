<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>

<div class="card" style="width: 60%; margin-bottom: 100px">
    <div class="card-body">
        <?php foreach ($pegawai as $pgw) : ?>
        <form method="POST" action="<?= base_url('admin/DataPegawai/updatePegawai') ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">NIK</label>
                <input type="hidden" name="id_pegawai" class="form-control" value="<?= $pgw->id_pegawai ?>">
                <input type="number" name="nik" class="form-control" value="<?= $pgw->nik ?>">
                <?= form_error('nik', '<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label for="">Nama Pegawai</label>
                <input type="text" name="nama_pegawai" class="form-control" value="<?= $pgw->nama_pegawai ?>">
                <?= form_error('nama_pegawai', '<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="" class="form-control">
                <option value="Laki-laki" <?php echo ($pgw->status == 'Laki-laki' ? ' selected' : ''); ?>>Laki-laki</option>
                    <option value="Perempuan" <?php echo ($pgw->status == 'Perempuan' ? ' selected' : ''); ?>>Perempuan</option>
                </select>
                <?= form_error('jenis_kelamin', '<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label for="">Jabatan</label>
                <select name="jabatan" id="" class="form-control">
                    <?php foreach ($jabatan as $jbtn) : ?>
                    <option value="<?= $jbtn->nama_jabatan ?>"><?= $jbtn->nama_jabatan ?></option>
                    <!-- <option value="<?= $jbtn->nama_jabatan ?>" <?= ($jbtn->nama_jabatan == $jbtn->nama_jabatan ? ' selected' : ''); ?>><?= $jbtn->nama_jabatan ?></option> -->
                    <?php endforeach; ?>
                </select>
                <?= form_error('jabatan', '<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label for="">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="form-control" value="<?= $pgw->tanggal_masuk ?>">
                <?= form_error('tanggal_masuk', '<div class="text-small text-danger"></div>') ?>
            </div>
                
            <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="" class="form-control">
                    <option value="1" <?php echo ($pgw->status == '1' ? ' selected' : ''); ?>>Pegawai tetap</option>
                    <option value="0" <?php echo ($pgw->status == '0' ? ' selected' : ''); ?>>Pegawai tidak tetap</option>
                </select>
                <?= form_error('status', '<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label for="">Foto</label>
                <input type="file" name="foto" class="form-control">
                <!-- <?= form_error('foto', '<div class="text-small text-danger"></div>') ?> -->
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
        <?php endforeach; ?>
    </div>
</div>

</div>
<!-- /.container-fluid -->