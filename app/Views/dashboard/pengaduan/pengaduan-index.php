<?= $this->extend('dashboard/layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-body">
          <h3>List Pengaduan </h3>

    <!-- <div class="d-flex my-5">
        <div class="mb-2">
            <label for=""> <strong>Filter Status</strong> </label>
            <select name="status" id="filterStatus" class="form-control mt-2 border shadow-sm text-dark">
                <option value="">All</option>
                <option value="Menunggu Verifikasi">Menunggu Verifikasi</option>
                <option value="Menunggu Tanggapan">Menunggu Tanggapan</option>
                <option value="Selesai">Selesai</option>
            </select>
        </div>
    </div> -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="dataTables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Tanggal Kejadian</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Action</th>
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
                            <td> <?php
                                    $lokasi = explode(' ', $item['lokasi_kejadian']);
                                    $tigaKata = implode(' ', array_slice($lokasi, 0, 3));
                                    echo esc($tigaKata . (count($lokasi) > 3 ? '...' : ''));
                                    ?></td>
                            <td>
                                <?php if ($item['status'] == 'Menunggu Verifikasi') : ?>
                                    <span class="badge bg-warning"><?= esc($item['status']) ?></span>
                                <?php elseif ($item['status'] == 'Diproses') : ?>
                                    <span class="badge bg-primary"><?= esc($item['status']) ?></span>
                                <?php else : ?>
                                    <span class="badge bg-success"><?= esc($item['status']) ?></span>
                                <?php endif ?>
                            </td>
                            <td>
                                <a href="<?= route_to('dashboard.pengaduan.show',$item['id']) ?>" class="btn btn-info btn-sm">Detail</a>
                                <a href="/pengaduan/edit/<?= $item['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <form action="<?= route_to('dashboard.pengaduan.delete', $item['id']) ?>" method="post" style="display:inline;">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                </form>

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
    </div>
   

</div>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<!-- CODE HERE -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables').DataTable();
    });
</script>
<?= $this->endSection(); ?>