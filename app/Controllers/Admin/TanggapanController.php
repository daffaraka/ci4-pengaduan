<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PengaduanModel;
use App\Models\TanggapanModel;
use CodeIgniter\HTTP\ResponseInterface;

class TanggapanController extends BaseController
{
    public function index()
    {
        $tanggapanModel = new TanggapanModel();
        $data = [
            'tanggapan' => $tanggapanModel->findAll(),
        ];
        return view('admin/tanggapan/index', $data);
    }


    public function create($pengaduan)
    {
        $tanggapanModel = new TanggapanModel();
        $pengaduanModel = new PengaduanModel();
        $data = [
            'pengaduan' => $pengaduanModel->findAll(),
        ];
        return view('admin/tanggapan/create', $data);
    }

    public function store($pengaduan)
    {
        $tanggapanModel = new TanggapanModel();
        $id_pengaduan = $this->request->getVar('id_pengaduan');
        $tanggapan = $this->request->getVar('tanggapan');
        $data = [
            'id_pengaduan' => $id_pengaduan,
            'tanggapan' => $tanggapan,
        ];
        $tanggapanModel->insert($data);
        return redirect()->to('/admin/tanggapan');
    }

    public function edit($pengaduan, $id)
    {
        $tanggapanModel = new TanggapanModel();
        $pengaduanModel = new PengaduanModel();
        $data = [
            'tanggapan' => $tanggapanModel->find($id),
            'pengaduan' => $pengaduanModel->findAll(),
        ];
        return view('admin/tanggapan/edit', $data);
    }

    public function update($id)
    {
        $tanggapanModel = new TanggapanModel();
        $id_pengaduan = $this->request->getVar('id_pengaduan');
        $tanggapan = $this->request->getVar('tanggapan');
        $data = [
            'id_pengaduan' => $id_pengaduan,
            'tanggapan' => $tanggapan,
        ];
        $tanggapanModel->update($id, $data);
        return redirect()->to('/admin/tanggapan');
    }

    public function delete($id)
    {
        $tanggapanModel = new TanggapanModel();
        $tanggapanModel->delete($id);
        return redirect()->to('/admin/tanggapan');
    }
}
