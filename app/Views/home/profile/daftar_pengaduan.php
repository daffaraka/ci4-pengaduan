<?= $this->extend('home/home_layout'); ?>
<?= $this->section('content'); ?>
<!-- CODE HERE -->
<div class="bg-light py-5">
    <div class="container pt-1 pb-5">

        <div class="d-flex justify-content-end">
        <a href="/beranda/buat-pengaduan" class="btn btn-success my-3">Buat Pengaduan</a>

        </div>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active text-success" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">List Pengaduan</button>
                <button class="nav-link text-success" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Riwayat Pengaduan</button>
                <button class="nav-link text-success" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>
                <button class="nav-link text-success" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false" disabled>Disabled</button>
            </div>
        </nav>
        <div class="tab-content mt-4 px-3" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                <h3>List Pengaduan </h3>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tanggal Kejadian</th>
                            <th>Lokasi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($pengaduan)) : ?>
                            <?php $no = 1; ?>
                            <?php foreach ($pengaduan as $item) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= esc($item['judul']) ?></td>
                                    <td><?= esc($item['kategori']) ?></td>
                                    <td><?= date('d-m-Y', strtotime($item['tanggal_kejadian'])) ?></td>
                                    <td><?= esc($item['lokasi_kejadian']) ?></td>
                                    <td>
                                        <?php if ($item['status'] == 'Menunggu Verifikasi') : ?>
                                            <span class="badge bg-warning"><?= esc($item['status']) ?></span>
                                        <?php elseif ($item['status'] == 'Diproses') : ?>
                                            <span class="badge bg-primary"><?= esc($item['status']) ?></span>
                                        <?php else : ?>
                                            <span class="badge bg-success"><?= esc($item['status']) ?></span>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data pengaduan.</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>

            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                <h3>Riwayat Pengaduan </h3>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tanggal Kejadian</th>
                            <th>Lokasi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($riwayat)) : ?>
                            <?php $no = 1; ?>
                            <?php foreach ($riwayat as $item) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= esc($item['judul']) ?></td>
                                    <td><?= esc($item['kategori']) ?></td>
                                    <td><?= date('d-m-Y', strtotime($item['tanggal_kejadian'])) ?></td>
                                    <td><?= esc($item['lokasi_kejadian']) ?></td>
                                    <td>
                                        <?php if ($item['status'] == 'Menunggu Verifikasi') : ?>
                                            <span class="badge bg-warning"><?= esc($item['status']) ?></span>
                                        <?php elseif ($item['status'] == 'Diproses') : ?>
                                            <span class="badge bg-primary"><?= esc($item['status']) ?></span>
                                        <?php else : ?>
                                            <span class="badge bg-success"><?= esc($item['status']) ?></span>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data riwayat pengaduan.</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">...</div>
            <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">...</div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>