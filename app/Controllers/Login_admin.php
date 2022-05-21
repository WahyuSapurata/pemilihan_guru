<?php

namespace App\Controllers;

use App\Models\M_admin;

class Login_admin extends BaseController
{
    protected $session;
    protected $M_admin;
    public function __construct()
    {
        $this->M_admin = new M_admin();
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index()
    {
        $data['title'] = 'Login Admin';
        return view('login/login-admin', $data);
    }

    public function login()
    {
        $username = $this->request->getVar('username');
        $password = md5($this->request->getVar('password'));
        $admin = $this->M_admin->where('username', $username)->where('password', $password)->first();
        // dd($admin);

        if (!is_null($admin)) {
            $data = [
                'username' => $admin['username'],
                'id_admin' => $admin['id_admin']
            ];
            session()->set($data);
            return redirect()->to(base_url('admin/index'));
        } else {
            session()->setFlashdata("error", "Maaf Usename dan Password Tidak Sesuai.");
            return redirect()->to(base_url('login_admin/index'));
        }
    }

    public function logout()
    {
        unset($_SESSION['username']);
        return redirect()->to(base_url('login_admin/index'));
    }
}
