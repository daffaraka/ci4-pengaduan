<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengaduanModel;
use CodeIgniter\HTTP\ResponseInterface;

class BerandaController extends BaseController
{
    public function index()
    {
        return view('beranda');
    }


    public function createPengaduan()
    {
        return view('home/buat_pengaduan');
    }


    public function storePengaduan()
    {

        // var_dump($this->request->getPost());

        $pengaduan = new PengaduanModel();

        $validationRules =
            [
                'judul'            => 'required',
                'kategori'         => 'required',
                'isi_laporan'      => 'required',
                'tanggal_kejadian' => 'required|valid_date',
                'lokasi_kejadian'  => 'required',
                'foto'             => 'uploaded[foto]|is_image[foto]|max_size[foto,2048]', // max 2MB
            ];


        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }


        $foto = $this->request->getFile('foto');
        $namaFoto = $foto->getRandomName();
        $foto->move('uploads/pengaduan', $namaFoto);

        // Simpan data
        $pengaduan->save([
            'user_id'          => $_SESSION['id'],
            'judul'            => $this->request->getPost('judul'),
            'kategori'         => $this->request->getPost('kategori'),
            'isi_laporan'      => $this->request->getPost('isi_laporan'),
            'tanggal_kejadian' => $this->request->getPost('tanggal_kejadian'),
            'lokasi_kejadian'  => $this->request->getPost('lokasi_kejadian'),
            'foto'             => $namaFoto,
            'status'           => 'Menunggu Verifikasi',
        ]);

        return redirect()->to('beranda/pengaduan/daftar-pengaduan')->with('success', 'Pengaduan berhasil dibuat.');
    }


    public function daftar()
    {
        // Menampilkan semua pengaduan yang tersedia
        $userId = session()->get('id');

        $data['pengaduan'] = model('PengaduanModel')->where('status !=', 'selesai')->where('user_id', $userId)->findAll();
        $data['riwayat'] = model('PengaduanModel')->where('status =','selesai')->where('user_id', $userId)->findAll();

        return view('home/profile/daftar_pengaduan', $data);
    }

    public function riwayat()
    {
        // Menampilkan riwayat pengaduan user yang sedang login
        $userId = session()->get('user_id');
        $data['riwayat'] = model('PengaduanModel')->where('user_id', $userId)->findAll();
        return view('pengaduan/riwayat', $data);
    }

    public function status()
    {
        // Menampilkan status dari pengaduan-pengaduan milik user
        $userId = session()->get('user_id');
        $data['status'] = model('PengaduanModel')->select('id, judul, status')->where('user_id', $userId)->findAll();
        return view('pengaduan/status', $data);
    }

    public function tanggapan()
    {
        // Menampilkan tanggapan dari admin/operator terhadap pengaduan user
        $userId = session()->get('user_id');
        $data['tanggapan'] = model('TanggapanModel')
            ->join('pengaduan', 'pengaduan.id = tanggapan.pengaduan_id')
            ->where('pengaduan.user_id', $userId)
            ->findAll();

        return view('pengaduan/tanggapan', $data);
    }
}
