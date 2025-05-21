 <?= $this->extend('home/home_layout'); ?>
 <?= $this->section('content'); ?>

 <section id="pengaduan" class="pengaduan">
     <form action="/beranda/store-pengaduan" method="post" enctype="multipart/form-data">

         <div class="container">
             <h1 class="fw-bold text-dark mb-5">Buat Pengaduan</h1>

             <div class="row">

                 <div class="col-6 " data-aos="fade-up">
                     <div class="mb-3">
                         <label for="user_id" class="form-label">Nama Lengkap</label>
                         <input type="text" class="form-control" id="user_id" name="user_id" required>
                     </div>
                     <div class="mb-3">
                         <label for="judul" class="form-label">Judul Laporan</label>
                         <input type="text" class="form-control" id="judul" name="judul" required>
                     </div>
                     <div class="mb-3">
                         <label for="kategori" class="form-label">Kategori</label>
                         <select class="form-select" id="kategori" name="kategori" required>
                             <option value="">Pilih Kategori</option>
                             <option value="Kesehatan">Kesehatan</option>
                             <option value="Pendidikan">Pendidikan</option>
                             <option value="Keamanan">Keamanan</option>
                             <option value="Lingkungan">Lingkungan</option>
                         </select>
                     </div>
                 </div>
                 <div class="col-lg-6" data-aos="fade-up">
                     <div class="mb-3">
                         <label for="tanggal_kejadian" class="form-label">Tanggal Kejadian</label>
                         <input type="date" class="form-control" id="tanggal_kejadian" name="tanggal_kejadian" required>
                     </div>
                     <div class="mb-3">
                         <label for="lokasi_kejadian" class="form-label">Lokasi Kejadian</label>
                         <input type="text" class="form-control" id="lokasi_kejadian" name="lokasi_kejadian" required>
                     </div>

               
                 </div>

                 <div class="col-12">
                     <div class="mb-3">
                         <label for="isi_laporan" class="form-label">Isi Laporan</label>
                         <textarea class="form-control" id="isi_laporan" name="isi_laporan" rows="3" required></textarea>
                     </div>

                     <div class="mb-3">
                         <label for="foto" class="form-label">Foto</label>
                         <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                     </div>
                 </div>

                       <button type="submit" class="btn btn-primary">Buat Pengaduan</button>


             </div>
         </div>
     </form>
 </section>

 <?= $this->endSection(); ?>