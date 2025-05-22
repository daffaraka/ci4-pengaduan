<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class RegisterController extends BaseController
{
    public function showRegistrationForm()
    {
        helper(['form']);
        $data = [];
        echo view('auth/register', $data);
    }

    public function register()
    {

        // dd($this->request->getVar());
        helper(['form']);
        $rules = [
            'nik'          => 'required|min_length[1]|max_length[20]|is_unique[users.nik]|numeric',
            'nama'         => 'required|min_length[2]|max_length[100]',
            'alamat'       => 'required|min_length[4]|max_length[255]',
            'email'        => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'telepon'      => 'required|numeric|is_unique[users.telepon]',
            'password'     => 'required|min_length[4]|max_length[255]',
            'role'         => 'required|in_list[admin,user]',
            'password_confirm'  => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $user = new UserModel();
            $data = [
                'nama'     => $this->request->getVar('nama'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'nik'      => $this->request->getVar('nik'),
                'alamat'   => $this->request->getVar('alamat'),
                'telepon'  => $this->request->getVar('telepon'),
                'role'     => $this->request->getVar('role')
            ];

            $user->insert([
                'nama'     => $this->request->getVar('nama'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'nik'      => $this->request->getVar('nik'),
                'alamat'   => $this->request->getVar('alamat'),
                'telepon'  => $this->request->getVar('telepon'),
                'role'     => $this->request->getVar('role')
            ]);
            $authSession = new SessionController();
            $authSession->authorised($data);

            return redirect()->to('/');
        } else {
            $data['validation'] = $this->validator;
            echo view('auth/register', $data);
        }
    }
}
