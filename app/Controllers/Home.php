<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'Home';
        return view('home/home', $data);
    }

    public function blocked_admin()
    {
        $data['title'] = 'Eror 404';
        return view('eror/blocked-admin', $data);
    }

    public function blocked_ketua()
    {
        $data['title'] = 'Eror 404';
        return view('eror/blocked-ketua', $data);
    }
}
