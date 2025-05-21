<?= $this->extend('dashboard/layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h3>List Pengaduan </h3>
    <div class="table-responsive">
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
                            <td>
                                <?php
                                $judul = explode(' ', $item['judul']);
                                $tigaKata = implode(' ', array_slice($judul, 0, 3));
                                echo esc($tigaKata . (count($judul) > 3 ? '...' : ''));
                                ?>
                            </td>

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

</div>
<?= $this->endSection(); ?>