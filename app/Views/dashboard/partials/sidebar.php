  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="/dashboard">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item nav-category">Manajemen</li>

      <li class="nav-item">
        <a class="nav-link" href="<?= route_to('dashboard.user.index') ?>">
          <i class="menu-icon mdi mdi-account"></i>
          <span class="menu-title">User</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= route_to('dashboard.pengaduan.index') ?>">
          <i class="menu-icon mdi mdi-file-document"></i>
          <span class="menu-title">Pengaduan</span>
        </a>
      </li>
      <li class="nav-item">
        <form action="<?= base_url('logout') ?>" method="post" class="d-inline">
          <button type="submit" class="nav-link ">
            <i class="menu-icon mdi mdi-power text-primary me-2"></i>
            <span class="menu-title mx-2">Sign Out</span>
          </button>
        </form>
      </li>
    </ul>
  </nav>