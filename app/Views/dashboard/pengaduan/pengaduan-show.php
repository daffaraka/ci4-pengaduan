<?= $this->extend('dashboard/layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h3>List Pengaduan </h3>
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





</div>

<div class="container my-3">
    <div class="card">
        <div class="card-body">
            <h3> Tanggapan </h3>
            <hr>
            <div class="row my-4">
                <div class="col-12 col-xl-6 col-lg-6">

                    <?php if (isset($pengaduan['admin_id'], $pengaduan['tanggapan'], $pengaduan['foto_tanggapan'])) : ?>
                        <div class="p-0">
                            <h3 class="card-title">Tanggapan Admin</h4>
                            <p class="card-text"><?= esc($pengaduan['tanggapan']) ?></p>
                            <img src="/uploads/pengaduan/tanggapan/<?= $pengaduan['foto_tanggapan'] ?>" class="img-fluid w-50 img-thumbnail shadow-sm" alt="...">
                        </div>
                    <?php else : ?>
                        <div class="p-0">
                            <h3 class="card-title">Tanggapan Admin</h3>
                            <p class="alert alert-danger">Belum ada tanggapan</p>
                        </div>
                    <?php endif ?>
                </div>
                <div class="col-12 col-xl-6 col-lg-6">
                    <h2>Beri Tanggapan</h2>
                    <?php if (isset($pengaduan['admin_id'])) : ?>
                        <p class="alert alert-danger">Anda sudah memberikan tanggapan</p>
                    <?php else : ?>
                        <form action="<?= route_to('dashboard.pengaduan.tanggapan.beriTanggapan', $pengaduan['id']) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="mb-3">
                                <label for="tanggapan" class="form-label"><strong>Tanggapan</strong></label>
                                <textarea class="form-control" id="tanggapan" name="tanggapan" rows="3" required>
                                
                                </textarea>
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label"><strong>Foto (Optional)</strong></label>
                                <input type="file" class="form-control" id="foto" name="foto_tanggapan" accept="image/*">
                            </div>

                            <div class="mb-3">
                                <label for="tanggapan" class="form-label"> <strong> Ubah Status Pengaduan</strong> </label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="">Pilih Status</option>
                                    <option value="Menunggu Verifikasi">Menunggu Verifikasi</option>
                                    <option value="Diproses">Diproses</option>
                                    <option value="Selesai">Selesai</option>
                                </select>


                            </div>
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </form>
                    <?php endif ?>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-end my-2 px-2">
    <a href="/admin/pengaduan" class="btn btn-secondary">Kembali</a>
</div>



<?= $this->endSection(); ?>