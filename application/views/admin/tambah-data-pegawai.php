<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>

<div class="card" style="width: 60%; margin-bottom: 100px">
    <div class="card-body">
        <form method="POST" action="<?= base_url('admin/DataPegawai/createPegawai') ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">NIK</label>
                <input type="number" name="nik" class="form-control">
                <?= form_error('nik', '<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label for="">Nama Pegawai</label>
                <input type="text" name="nama_pegawai" class="form-control">
                <?= form_error('nama_pegawai', '<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" class="form-control">
                <?= form_error('username', '<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control">
                <?= form_error('password', '<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="" class="form-control">
                    <option value="">Pilih jenis kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <?= form_error('jenis_kelamin', '<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label for="">Jabatan</label>
                <select name="jabatan" id="" class="form-control">
                    <option value="">Pilih jabatan</option>
                    <?php foreach ($jabatan as $jbtn) : ?>
                    <option value="<?= $jbtn->nama_jabatan ?>"><?= $jbtn->nama_jabatan ?></option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('jabatan', '<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label for="">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="form-control">
                <?= form_error('tanggal_masuk', '<div class="text-small text-danger"></div>') ?>
            </div>
                
            <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="" class="form-control">
                    <option value="">Pilih status pegawai</option>
                    <option value="1">Pegawai tetap</option>
                    <option value="0">Pegawai tidak tetap</option>
                </select>
                <?= form_error('status', '<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label for="">Foto</label>
                <input type="file" name="foto" class="form-control">
                <!-- <?= form_error('foto', '<div class="text-small text-danger"></div>') ?> -->
            </div>

            <div class="form-group">
                <label for="">Hak Akses</label>
                <select name="role_id" id="" class="form-control">
                    <option value="">Pilih hak akses</option>
                    <option value="1">Admin</option>
                    <option value="2">Pegawai</option>
                </select>
                <?= form_error('role_id', '<div class="text-small text-danger"></div>') ?>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>

</div>
<!-- /.container-fluid -->