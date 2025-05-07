<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function login()
    {
        helper('form');

        return view('admin/login');
    }

    public function authenticate()
    {
        $session = session();

        $model = model(UserModel::class);

        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('error', 'Enter a Username and Password');
        }

        $data = [
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ];
    
        if (!$user = $model->where('email', $data['email'])->first()) {
            return redirect()->back()->with('error', 'User not found');
        }

        if (!password_verify($data['password'], $user['password'])) {
            return redirect()->back()->with('error', 'Password Incorrect');
        }

        $session_data = [
            'id' => $user['id'],
            'email' => $user['email'],
            'loggedIn' => true,
        ];

        $session->set($session_data);

        return redirect()->to('/admin')->with('success', 'Welcome back!');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/');
    }
}