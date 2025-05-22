<?= $this->extend('dashboard/layout'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-body">
        <h2>Detail Pengguna</h2>
        <form action="<?= base_url('admin/user/' . $user['id']) ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= esc($user['nama']) ?>" readonly disabled>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" value="<?= esc($user['nik']) ?>" readonly disabled>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= esc($user['email']) ?>" readonly disabled>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Role</label> <br>
                <?php if ($user['role'] == 'admin'): ?>
                    <button type="button" class="btn btn-danger text-uppercase fw-bold" id="role" name="role" disabled><?= esc($user['role']) ?></button>
                <?php else: ?>
                    <button type="button" class="btn btn-success text-uppercase fw-bold" id="role" name="role" disabled><?= esc($user['role']) ?></button>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= esc($user['alamat']) ?>" readonly disabled>
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="text" class="form-control" id="telepon" name="telepon" value="<?= esc($user['telepon']) ?>" readonly disabled>
            </div>
            <div class="d-flex justify-content-between">
                <a href="<?= base_url('admin/user') ?>" class="btn btn-secondary">Kembali</a>
                <a href="<?= base_url('admin/user/edit/' . $user['id'] . '') ?>" class="btn btn-warning">Edit</a>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>