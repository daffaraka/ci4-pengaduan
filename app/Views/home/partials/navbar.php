  <nav id="navmenu" class="navmenu">
    <ul>
      <li><a href="#hero" class="active">Home</a></li>
      <li class="dropdown"><a href="#"><span>Pengaduan</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
          <li><a href="/pengaduan">Daftar Pengaduan</a></li>
          <li><a href="/pengaduan/create">Buat Pengaduan</a></li>
          <li><a href="/pengaduan/riwayat">Riwayat Pengaduan</a></li>
          <li><a href="/pengaduan/status">Status Pengaduan</a></li>
          <li><a href="/pengaduan/tanggapan">Tanggapan</a></li>
        </ul>
      </li>
      <li class="dropdown"><a href="#"><span>Akun</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
          <!-- <li><a href="/profile">Profil Saya</a></li> -->

          <?php if (session()->get('isLoggedIn')) : ?>
            <li>
              <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
              </a>
              <form id="logout-form" action="<?= base_url('/logout') ?>" method="POST" style="display: none;">
                <?= csrf_field() ?>
              </form>
            </li>
          <?php else : ?>
            <li>
              <a class="button is-primary" href="/register">
                <strong>Sign up</strong>
              </a>
              <a class="button is-light" href="/login">
                Sign in
              </a>
            </li>
          <?php endif ?>

        </ul>
      </li>

    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
  </nav>