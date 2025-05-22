<?= $this->extend('dashboard/layout'); ?>
<?= $this->section('content'); ?>

<div class="card">
    <div class="card-body">
        <h2>Edit Pengguna</h2>
        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors(); ?>
            </div>
        <?php endif; ?>
        <form action="<?= base_url('admin/user/update/' . $user['id']) ?>" method="post">
            <?= csrf_field() ?>
            <!-- <input type="hidden" name="_method" value="PUT"> -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= esc($user['nama']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" value="<?= esc($user['nik']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= esc($user['email']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                    <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= esc($user['alamat']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="text" class="form-control" id="telepon" name="telepon" value="<?= esc($user['telepon']) ?>" required>
            </div>
            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Simpan</button>

                <a href="<?= base_url('admin/user') ?>" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>