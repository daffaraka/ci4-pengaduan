<?= $this->extend('home/home_layout') ?>

<?= $this->section('content') ?>

<div class="container my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">

                <div class="card-body">
                    <h3 class="card-title fw-bold text-center mb-4">Login Form</h3>

                    <?php if (session()->getFlashdata('msg')): ?>
                        <div class="alert alert-danger mt-3">
                            <?= session()->getFlashdata('msg') ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?= url_to('login') ?>" method="post">
                        <div class="form-group my-3">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                                value="<?= old('email') ?>">
                        </div>

                        <div class="form-group my-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary">Sign in</button>

                            <p class="text-center my-3">Belum punya akun? <a href="<?= url_to('register') ?>" class="text-decoration-none">Daftar</a></p>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>