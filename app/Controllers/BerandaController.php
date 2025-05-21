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

        var_dump($this->request->getPost());

        // $pengaduan = new PengaduanModel();

        // $validationRules = 
        // [
        //     'judul'            => 'required',
        //     'kategori'         => 'required',
        //     'isi_laporan'      => 'required',
        //     'tanggal_kejadian' => 'required|valid_date',
        //     'lokasi_kejadian'  => 'required',
        //     'foto'             => 'uploaded[foto]|is_image[foto]|max_size[foto,2048]', // max 2MB
        // ];
    }
}
