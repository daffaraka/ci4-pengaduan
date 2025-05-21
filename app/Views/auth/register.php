<?= $this->extend('home/home_layout') ?>

<?= $this->section('content') ?>

<div class="container my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">

                <div class="card-body">
                    <h3 class="card-title fw-bold text-center mb-4">Login Form</h3>
                    <form action="<?= url_to('register') ?>" method="post">

                        <?php if (isset($validation)) : ?>
                            <div class="alert alert-danger">
                                <?= $validation->listErrors(); ?>
                            </div>
                        <?php endif; ?>
                        <div class="form-group my-3">
                            <label for="nik"><b>NIK</b></label>
                            <input type="number" class="form-control" id="nik" name="nik" placeholder="NIK"
                                value="<?= old('nik') ?>">
                        </div>

                        <div class="form-group my-3">
                            <label for="nama"><b>Nama</b></label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama"
                                value="<?= old('nama') ?>">
                        </div>
                        <div class="form-group my-3">
                            <label for="email"><b>Email</b></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= old('email') ?>">
                        </div>


                        <div class="form-group my-3">
                            <label for="password"><b>Password</b></label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                        </div>
                        <div class="form-group my-3">
                            <label for="password_confirm"><b>Konfirmasi Password</b></label>
                            <input type="password" class="form-control" id="password_confirm" name="password_confirm"
                                placeholder="Konfirmasi Password">
                        </div>

                        <div class="form-group my-3">
                            <label for="role"><b>Role</b></label>
                            <select class="form-control" id="role" name="role">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>

                        <div class="form-group my-3">
                            <label for="alamat"><b>Alamat</b></label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat"
                                value="<?= old('alamat') ?>">
                        </div>

                        <div class="form-group my-3">
                            <label for="telepon"><b>Telepon</b></label>
                            <input type="number" class="form-control" id="telepon" name="telepon" placeholder="Telepon"
                                value="<?= old('telepon') ?>">
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary">Daftar Sekarang</button>

                        </div>
                    </form>

                    <?php if (session()->getFlashdata('msg')): ?>
                        <div class="alert alert-danger mt-3">
                            <?= session()->getFlashdata('msg') ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>