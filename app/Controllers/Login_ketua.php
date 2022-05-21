<?php

namespace App\Controllers;

use App\Models\M_ketua;

class Login_ketua extends BaseController
{
    protected $session;
    protected $M_ketua;
    public function __construct()
    {
        $this->M_ketua = new M_ketua();
        $this->session = \Config\Services::session();
        $this->session->start();
    }
    public function index()
    {
        $data['title'] = 'Login Ketua Yayasan';
        return view('login/login-ketua', $data);
    }
    public function login()
    {
        $username = $this->request->getVar('username');
        $password = md5($this->request->getVar('password'));
        $ketua = $this->M_ketua->where('username', $username)->where('password', $password)->findAll();
        $data = [
            'username' => $username
        ];
        session()->set($data);
        if ($ketua == null) {
            session()->setFlashdata("error", "Maaf Usename dan Password Tidak Sesuai.");
            return redirect()->to(base_url('login_ketua/index'));
        } else {
            return redirect()->to(base_url('ketua/index'));
        }
    }

    public function logout()
    {
        unset($_SESSION['username']);
        return redirect()->to(base_url('login_ketua/index'));
    }
}
