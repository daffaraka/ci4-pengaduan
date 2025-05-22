<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data = [
            'users' => $userModel->findAll()
        ];

        return view('dashboard/users/user-index', $data);
    }

    public function create()
    {
        return view('dashboard/users/user-create');
    }

    public function store()
    {

        // dd($this->request->getVar());
        $rules = [
            'nik'             => 'required|min_length[1]|max_length[20]|is_unique[users.nik]|numeric',
            'nama'            => 'required|min_length[2]|max_length[100]',
            'alamat'          => 'required|min_length[4]|max_length[255]',
            'email'           => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'telepon'         => 'required|numeric|is_unique[users.telepon]',
            'password'        => 'required|min_length[4]|max_length[255]',
            'role'            => 'required|in_list[admin,user]',
        ];
        if ($this->validate($rules)) {
            $userModel = new UserModel();
            $userModel->insert([
                'nama'     => $this->request->getVar('nama'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'nik'      => $this->request->getVar('nik'),
                'alamat'   => $this->request->getVar('alamat'),
                'telepon'  => $this->request->getVar('telepon'),
                'role'     => $this->request->getVar('role')
            ]);


            // dd($userModel->insert());


            return redirect()->to('/admin/user')->with('message', 'Berhasil Membuat User Baru');
        } else {
            $data['validation'] = $this->validator;
            echo view('dashboard/users/user-create', $data);
        }

        // return redirect()->to('/admin/user')->with('message', 'Berhasil Membuat User Baru');
    }

    public function edit($id)
    {
        $userModel = new UserModel();
        $data = [
            'user' => $userModel->find($id)
        ];

        return view('dashboard/users/user-edit', $data);
    }


    public function show($id)
    {
        $userModel = new UserModel();
        $data = [
            'user' => $userModel->find($id)
        ];

        return view('dashboard/users/user-show', $data);
    }

    public function update($id)
    {
        $userModel = new UserModel();
        $data = [
            'nik' => $this->request->getVar('nik'),
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getVar('role'),
            'alamat' => $this->request->getVar('alamat'),
            'telepon' => $this->request->getVar('telepon')
        ];

        $userModel->update($id, $data);

        return redirect()->to('/admin/user')->with('message', 'Berhasil Mengupdate User');
    }

    public function delete($id)
    {
        $userModel = new UserModel();
        $userModel->delete($id);

        return redirect()->to('/admin/user')->with('message', 'Berhasil Menghapus User');
    }
}
