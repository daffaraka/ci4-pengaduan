<?php

namespace App\Controllers\Admin;

use App\Models\PengaduanModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PengaduanController extends BaseController
{
    public function index()
    {
        $pengaduan = new PengaduanModel();

        $data = [
            'title' => 'Pengaduan',
            'pengaduan' => $pengaduan->findAll(),
            'pager' => $pengaduan->pager
        ];

        return view('dashboard/pengaduan/pengaduan-index', $data);
    }

    public function delete($id)
    {
        $model = new PengaduanModel();

        $model->delete($id);

        session()->setFlashdata('success', 'Data berhasil dihapus');

        return redirect()->to('/admin/pengaduan');
    }


    public function show($id)
    {
        $model = new PengaduanModel();


        $pengaduan = $model->find($id);


        return view('dashboard/pengaduan/pengaduan-show', [
            'pengaduan' => $pengaduan
        ]);
    }

    public function update($id)
    {
        $model = new PengaduanModel();

        $pengaduan = $model->find($id);

        if (!$pengaduan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => 'Ubah Pengaduan',
            'pengaduan' => $pengaduan
        ];

        return view('admin/pengaduan/update', $data);
    }



    public function beriTanggapan($id)
    {
        $model = new PengaduanModel();

        $pengaduan = $model->find($id);

        if (!$pengaduan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $rules = [
            'status' => 'required',
            'tanggapan' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/admin/pengaduan/update/' . $id)->withInput();
        }



        if ($this->request->getFile('foto_tanggapan')) {
            $foto = $this->request->getFile('foto_tanggapan');
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/pengaduan/tanggapan', $namaFoto);
        }

        $model->update($id, [
            'admin_id' => $_SESSION['id'], 
            'status' => $this->request->getVar('status'),
            'tanggapan' => $this->request->getVar('tanggapan'),
            'foto_tanggapan' => $namaFoto ?? '-'

        ]);

        session()->setFlashdata('success', 'Data berhasil diupdate');

        return redirect()->back();
    }
}
