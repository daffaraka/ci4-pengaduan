<?= $this->extend('home/home_layout'); ?>
<?= $this->section('content'); ?>
<!-- CODE HERE -->
<div class="bg-light py-5">
    <div class="container pt-1 pb-5">
        <div class="card">
            <div class="card-body">
                <h3>Detail </h3>
                <div class="row my-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="user_id" class="form-label">User ID</label>
                            <input type="text" class="form-control" id="user_id" value="<?= esc($pengaduan['user_id']) ?>" readonly disabled>
                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" value="<?= esc($pengaduan['judul']) ?>" readonly disabled>
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <input type="text" class="form-control" id="kategori" value="<?= esc($pengaduan['kategori']) ?>" readonly disabled>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="mb-3">
                            <label for="tanggal_kejadian" class="form-label">Tanggal Kejadian</label>
                            <input type="text" class="form-control" id="tanggal_kejadian" value="<?= esc(date('d-m-Y', strtotime($pengaduan['tanggal_kejadian']))) ?>" readonly disabled>
                        </div>
                        <div class="mb-3">
                            <label for="lokasi_kejadian" class="form-label">Lokasi Kejadian</label>
                            <input type="text" class="form-control" id="lokasi_kejadian" value="<?= esc($pengaduan['lokasi_kejadian']) ?>" readonly disabled>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" class="form-control" id="status" value="<?= esc($pengaduan['status']) ?>" readonly disabled>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mb-3">
                            <label for="isi_laporan" class="form-label">Isi Laporan</label>
                            <textarea class="form-control" id="isi_laporan" rows="3" readonly disabled><?= esc($pengaduan['isi_laporan']) ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto Pengaduan</label> <br>
                            <img src="/uploads/pengaduan/<?= $pengaduan['foto'] ?>" class="img-fluid w-25 img-thumbnail shadow-sm" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card my-3">
            <?php if (isset($pengaduan['admin_id'], $pengaduan['tanggapan'], $pengaduan['foto_tanggapan'])) : ?>
                <div class="card-body">
                    <h4 class="card-title">Tanggapan Admin</h4>
                    <p class="card-text"><?= esc($pengaduan['tanggapan']) ?></p>
                    <img src="/uploads/tanggapan/<?= $pengaduan['foto_tanggapan'] ?>" class="img-fluid w-50 img-thumbnail shadow-sm" alt="...">
                </div>
            <?php else : ?>
                <div class="card-body">
                    <h4 class="card-title">Tanggapan Admin</h4>
                    <p class="alert alert-danger">Belum ada tanggapan</p>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>