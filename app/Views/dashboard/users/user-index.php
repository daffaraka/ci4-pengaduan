<?= $this->extend('dashboard/layout'); ?>
<?= $this->section('content'); ?>

<div class="card">
    <div class="card-body">
      <h2>Daftar Pengguna</h2>
<a href="<?= base_url('admin/user/create') ?>" class="btn btn-primary mb-3">Tambah User</a>

<div class="table-responsive">
    <table class="table table-bordered" id="dataTables">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Alamat</th>
                <th>Telfon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($users as  $user): ?>
                <tr>
                    <td><?= esc($i++) ?></td>
                    <td><?= esc($user['nama']) ?></td>
                    <td><?= esc($user['email']) ?></td>
                    <td><?= esc($user['role']) ?></td>
                    <td><?= esc($user['alamat']) ?></td>
                    <td><?= esc($user['telepon']) ?></td>
                    <td>
                        <a href="<?= base_url('admin/user/show/' . $user['id']) ?>" class="btn btn-info btn-sm">Lihat</a>
                        <a href="<?= base_url('admin/user/edit/' . $user['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <form action="<?= base_url('admin/user/' . $user['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Hapus user ini?')">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
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