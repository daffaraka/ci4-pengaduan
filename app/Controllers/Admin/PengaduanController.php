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



    public function updateProcess($id)
    {
        $model = new PengaduanModel();

        $pengaduan = $model->find($id);

        if (!$pengaduan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $rules = [
            'status' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/admin/pengaduan/update/' . $id)->withInput();
        }

        $model->update($id, [
            'status' => $this->request->getVar('status')
        ]);

        session()->setFlashdata('success', 'Data berhasil diupdate');

        return redirect()->to('/admin/pengaduan');
    }
}
