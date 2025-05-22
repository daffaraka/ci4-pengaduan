  <nav id="navmenu" class="navmenu">
    <ul>
      <li><a href="/" class="active">Home</a></li>

      <?php if (session()->get('isLoggedIn')) : ?>
        <li class="dropdown"><a href="#"><span>Pengaduan</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="/beranda/pengaduan/daftar-pengaduan">Daftar Pengaduan</a></li>
            <li><a href="/beranda/buat-pengaduan">Buat Pengaduan</a></li>
            <!-- <li><a href="/beranda/pengaduan/riwayat">Riwayat Pengaduan</a></li>
            <li><a href="/beranda/pengaduan/status">Status Pengaduan</a></li>
            <li><a href="/beranda/pengaduan/tanggapan">Tanggapan</a></li> -->
          </ul>
        </li>
        <li class="dropdown"><a href="#"><span>Akun</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <!-- <li><a href="/profile">Profil Saya</a></li> -->


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
              <a class="button is-light" href="/register">
                Register
              </a>

            </li>
            <li>
              <a class="button is-light" href="/login">
                Sign in
              </a>
            </li>
          <?php endif ?>

          </ul>


        </li>
        <?php if (session()->get('isLoggedIn')) : ?>

          <button class="btn-getstarted" href="#"> <?= $_SESSION['nama']; ?> </button>

        <?php endif; ?>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
  </nav>