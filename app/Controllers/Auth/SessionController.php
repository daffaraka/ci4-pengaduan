<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class SessionController extends BaseController
{
    public function authorised($data)
    {
        $session = session();
        $authData = [
            'id' => $data['id'],
            'nama' => $data['nama'],
            'email' => $data['email'],
            'role' => $data['role'],
            'isLoggedIn' => true
        ];

        $session->set($authData);
    }

    public function unauthorised()
    {
        $session = session();
        $authData = ['isLoggedIn' => false];

        $session->set($authData);
    }
}
