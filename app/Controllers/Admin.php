<?php

namespace App\Controllers;

use App\Models\M_admin;
use App\Models\M_kriteria;
use App\Models\M_alternatif;
use App\Models\M_dokumentasi;
use App\Models\M_data;

class Admin extends BaseController
{
    protected $session;
    protected $M_admin;
    protected $M_kriteria;
    protected $M_alternatif;
    protected $M_bobot;
    protected $M_dokumentasi;
    protected $M_data;
    public function __construct()
    {
        $this->M_admin = new M_admin();
        $this->M_kriteria = new M_kriteria();
        $this->M_alternatif = new M_alternatif();
        $this->M_dokumentasi = new M_dokumentasi();
        $this->M_data = new M_data();
        $this->session = \Config\Services::session();
    }


    public function index()
    {
        if ($this->session->has('username') == "") {
            return redirect()->to(base_url('home/blocked_admin'));
        }
        $data['title'] = 'Beranda';
        return view('admin/beranda', $data);
    }

    public function kriteria()
    {
        if ($this->session->has('username') == "") {
            return redirect()->to(base_url('home/blocked_admin'));
        }
        $data['kriteria'] = $this->M_kriteria->findAll();
        $data['title'] = 'Data Kriteria';
        echo view('admin/data-kriteria', $data);
        echo view('admin/tambah-data/tambah-kriteria', $data);
    }
    public function tambah_kriteria()
    {
        $kriteria = $this->M_kriteria->findAll();

        $jum_w = $this->request->getVar('bobot');;
        foreach ($kriteria as $kt) :
            $jum_w += $kt['bobot'];
        endforeach;
        for ($index = 0; $index < count($kriteria); $index++) {
            $this->M_kriteria->save([
                'id_kriteria' => $kriteria[$index]['id_kriteria'],
                'kode' => $kriteria[$index]['kode'],
                'nama_kriteria' => $kriteria[$index]['nama_kriteria'],
                'atribut' => $kriteria[$index]['atribut'],
                'bobot' => $kriteria[$index]['bobot'],
                'bobot_kalkulasi' => $kriteria[$index]['bobot'] / $jum_w * ($kriteria[$index]['atribut'] == 'Benefit' ? 1 : -1),
            ]);
        }
        $this->M_kriteria->save([
            'kode' => $this->request->getVar('kode'),
            'nama_kriteria' => $this->request->getVar('nama_kriteria'),
            'atribut' => $this->request->getVar('atribut'),
            'bobot' => $this->request->getVar('bobot'),
            'bobot_kalkulasi' => $this->request->getVar('bobot') / $jum_w * ($this->request->getVar('atribut')  == 'Benefit' ? 1 : -1),
        ]);
        session()->setFlashdata("success", "Data Berhasil di Tambah.");
        return redirect()->to(base_url('admin/kriteria'));
    }
    public function hapus_kriteria($id_kriteria)
    {
        $this->M_kriteria->delete($id_kriteria);
        session()->setFlashdata("success", "Data Berhasil di Hapus.");
        return redirect()->to(base_url('admin/kriteria'));
    }
    public function edit_kriteria($id_kriteria)
    {
        $kriteria = $this->M_kriteria->findAll();

        $jum_w = 0;
        foreach ($kriteria as $kt) :
            $jum_w += $kt['bobot'];
        endforeach;

        for ($index = 0; $index < count($kriteria); $index++) {
            if ($id_kriteria == $kriteria[$index]['id_kriteria']) {
                $kriteria[$index] = [
                    'id_kriteria' => $kriteria[$index]['id_kriteria'],
                    'kode' => $this->request->getVar('kode'),
                    'nama_kriteria' => $this->request->getVar('nama_kriteria'),
                    'atribut' => $this->request->getVar('atribut'),
                    'bobot' => $this->request->getVar('bobot'),
                ];
            }
        }

        for ($index = 0; $index < count($kriteria); $index++) {
            $this->M_kriteria->save([
                'id_kriteria' => $kriteria[$index]['id_kriteria'],
                'kode' => $kriteria[$index]['kode'],
                'nama_kriteria' => $kriteria[$index]['nama_kriteria'],
                'atribut' => $kriteria[$index]['atribut'],
                'bobot' => $kriteria[$index]['bobot'],
                'bobot_kalkulasi' => $kriteria[$index]['bobot'] / $jum_w * ($kriteria[$index]['atribut'] == 'Benefit' ? 1 : -1),
            ]);
        }
        session()->setFlashdata("success", "Data Berhasil di Ubah.");
        return redirect()->to(base_url('admin/kriteria'));
    }

    public function alternatif()
    {
        if ($this->session->has('username') == "") {
            return redirect()->to(base_url('home/blocked_admin'));
        }
        $data['alternatif'] = $this->M_alternatif->findAll();
        $data['kriteria'] = $this->M_kriteria->findAll();
        // dd($data['kriteria']);
        $data['title'] = 'Data Alternatif';
        echo view('admin/data-alternatif', $data);
        echo view('admin/tambah-data/tambah-alternatif', $data);
    }
    public function tambah_alternatif()
    {
        $this->M_alternatif->save([
            'nama' => $this->request->getVar('nama'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'alamat' => $this->request->getVar('alamat'),
            'ipk' => $this->request->getVar('ipk'),
            'pendidikan' => $this->request->getVar('pendidikan'),
            'pengalaman' => $this->request->getVar('pengalaman'),
            'tkd' => $this->request->getVar('tkd'),
            'wawancara' => $this->request->getVar('wawancara'),
        ]);
        session()->setFlashdata("success", "Data Berhasil di Tambah.");
        return redirect()->to(base_url('admin/alternatif'));
    }
    public function hapus_alternatif($id_alternatif)
    {
        $this->M_alternatif->delete($id_alternatif);
        session()->setFlashdata("success", "Data Berhasil di Hapus.");
        return redirect()->to(base_url('admin/alternatif'));
    }
    public function edit_alternatif($id_alternatif)
    {
        $this->M_alternatif->save([
            'id_alternatif' => $id_alternatif,
            'nama' => $this->request->getVar('nama'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'alamat' => $this->request->getVar('alamat'),
            'ipk' => $this->request->getVar('ipk'),
            'pendidikan' => $this->request->getVar('pendidikan'),
            'pengalaman' => $this->request->getVar('pengalaman'),
            'tkd' => $this->request->getVar('tkd'),
            'wawancara' => $this->request->getVar('wawancara'),
        ]);
        session()->setFlashdata("success", "Data Berhasil di Edit.");
        return redirect()->to(base_url('admin/alternatif'));
    }



    public function saw()
    {

        $alternatif = $this->M_alternatif->findAll();
        $kriteria = $this->M_kriteria->findAll();

        $outputs = [];
        $ctr_label = ["ipk", "pendidikan", "pengalaman", "tkd", "wawancara"];
        for ($index_1 = 0; $index_1 < count($ctr_label); $index_1++) {
            $label = $ctr_label[$index_1];
            $sum = [];
            for ($index_2 = 0; $index_2 < count($alternatif); $index_2++) {
                // $sum.push($alternatif[$index_2][$label]);
                array_push($sum, $alternatif[$index_2][$label]);
            }
            $max = max(...$sum);
            $min = min(...$sum);
            for ($index_2 = 0; $index_2 < count($alternatif); $index_2++) {
                $element = $alternatif[$index_2];
                if (array_key_exists($index_2, $outputs)) {
                    //   outputs.push({
                    //     name: element.nama,
                    //     ipk: element.ipk,
                    //     pendidikan: element.pendidikan,
                    //     pengalaman: element.pengalaman,
                    //     tkd: element.tkd,
                    //     wawancara: element.wawancara,
                    //     result: 0,
                    //   });
                    $NilaiSaw = [
                        'nama' => $element['nama'],
                        'ipk' => $element['ipk'],
                        'pendidikan' => $element['pendidikan'],
                        'pengalaman' => $element['pengalaman'],
                        'tkd' => $element['tkd'],
                        'wawancara' => $element['wawancara'],
                        'result' => 0,
                    ];
                    array_push($outputs, $NilaiSaw);
                }
                if ($kriteria[$index_1]['atribut'] == "Benefit") {
                    $outputs[$index_2][$label] = $element[$label] / $max;
                } else {
                    $outputs[$index_2][$label] = $element[$label] / $min;
                }
            }
        }
        function suma($carry, $item)
        {
            $carry += $item;
            return $carry;
        }

        for ($index_1 = 0; $index_1 < count($outputs); $index_1++) {
            $sum = [
                $outputs[$index_1]['ipk'] * $kriteria[0]['bobot'],
                $outputs[$index_1]['pendidikan'] * $kriteria[1]['bobot'],
                $outputs[$index_1]['pengalaman'] * $kriteria[2]['bobot'],
                $outputs[$index_1]['tkd'] * $kriteria[3]['bobot'],
                $outputs[$index_1]['wawancara'] * $kriteria[4]['bobot'],
            ];
            $outputs[$index_1]['result'] = array_reduce($sum, function ($prev, $curr) {
                return $prev += $curr;
            });
        }
        return $outputs;
    }

    public function hasil()
    {
        if ($this->session->has('username') == "") {
            return redirect()->to(base_url('home/blocked_admin'));
        }
        $data['alternatif'] = $this->M_alternatif->findAll();
        $data['kriteria'] = $this->M_kriteria->findAll();

        $alternatif = $this->M_alternatif->findAll();
        $kriteria = $this->M_kriteria->findAll();
        // dd($alternatif);
        // dd($kriteria);

        // mencari nilai s
        $ktiteria_kalkulasi = [];
        foreach ($kriteria as $krt) {
            $ktiteria_kalkulasi[] = $krt['bobot_kalkulasi'];
            //   pow($alternatif[$index]['pendidikan'], $krt['bobot_kalkulasi']) *
            //   pow($alternatif[$index]['ipk'], $krt['bobot_kalkulasi']) *
            //   pow($alternatif[$index]['pengalaman'], $krt['bobot_kalkulasi']) *
            //   pow($alternatif[$index]['tkd'], $krt['bobot_kalkulasi']) *
            //   pow($alternatif[$index]['wawancara'], $krt['bobot_kalkulasi']);
        }
        $nilai_alt = [
            'ipk',
            'pendidikan',
            'pengalaman',
            'tkd',
            'wawancara'
        ];
        // dd($nilai_alt);
        $jum_s = [];
        $jum_v = 0;
        for ($index = 0; $index < count($alternatif); $index++) {
            $s = 1;
            $nilai = 0;
            foreach ($nilai_alt as $colum) {

                $s = $s * pow($alternatif[$index][$colum], $ktiteria_kalkulasi[$nilai++]);
            }
            $jum_s[$index] = [];
            $jum_s[$index][] = $alternatif[$index]['nama'];
            $jum_s[$index][] = $s;
            $jum_v += $s;
        }
        // dd($jum_v);

        // mencari nilai v
        $hasil_v = [];
        for ($index = 0; $index < count($jum_s); $index++) {
            $hasil_v[] = [];
            $hasil_v[$index][] = $jum_s[$index][0];
            $hasil_v[$index][] = $jum_s[$index][1] / $jum_v;
        }
        array_multisort($hasil_v, SORT_ASC);
        $data['nilai_v'] = $hasil_v;
        // dd($data['nilai_v']);
        $data['nilai_s'] = $jum_s;
        $data['title'] = 'Hasil Seleksi';
        $data['hasilSaw'] = $this->saw();
        // dd($data['hasilSaw']);
        return view('admin/hasil-seleksi', $data);
    }

    public function data_guru()
    {
        if ($this->session->has('username') == "") {
            return redirect()->to(base_url('home/blocked_admin'));
        }

        $data['data'] = $this->M_data->findAll();
        $data['title'] = 'Data Guru';
        echo view('admin/data_guru', $data);
        echo view('admin/tambah-data/tambah_data', $data);
    }
    public function tambah_data()
    {
        $periksa = $this->validate([
            'userfile' => [
                'uploaded[userfile]',
                'mime_in[userfile,application/pdf,application/zip,application/msword,application/x-tar]',
                'max_size[userfile,10000]',
            ],
        ]);
        if ($periksa) {
            $file = $this->request->getFile('userfile');
            $newName = $file->getRandomName();
            $file->move('uploads/dokumen', $newName);

            $this->M_data->save([
                'nama' => $this->request->getVar('nama'),
                'dokumen' => $newName,
            ]);

            session()->setFlashdata("success", "Dokumen berhasil di tambah.");
            return redirect()->to(base_url('admin/data_guru'));
        } else {
            session()->setFlashdata("error", "Dokumen gagal di tambah.");
            return redirect()->to(base_url('admin/data_guru'));
        }
    }
    public function hapus_data($id_data)
    {
        $data = $this->M_data->find($id_data);
        unlink('uploads/dokumen/' . $data['dokumen']);

        $this->M_data->delete($id_data);
        session()->setFlashdata("success", "File Berhasil di Hapus.");
        return redirect()->to(base_url('admin/data_guru'));
    }
    public function edit_data($id_data)
    {
        $periksa = $this->validate([
            'userfile' => [
                'uploaded[userfile]',
                'mime_in[userfile,application/pdf,application/zip,application/msword,application/x-tar]',
                'max_size[userfile,10000]',
            ],
        ]);
        $dokumen = $this->request->getVar('dokumen');
        // dd($dokumen);
        if ($periksa) {
            $file = $this->request->getFile('userfile');
            $newName = $file->getRandomName();
            $file->move('uploads/dokumen/', $newName);
            unlink('uploads/dokumen/' . $this->request->getVar('lama'));

            $this->M_data->save([
                'id_data' => $id_data,
                'nama' => $this->request->getVar('nama'),
                'dokumen' => $newName,
            ]);

            session()->setFlashdata("success", "Dokumen berhasil di edit.");
            return redirect()->to(base_url('admin/data_guru'));
        } else {
            session()->setFlashdata("error", "Dokumen gagal di edit.");
            return redirect()->to(base_url('admin/data_guru'));
        }
    }

    public function dokumentasi()
    {
        if ($this->session->has('username') == "") {
            return redirect()->to(base_url('home/blocked_admin'));
        }
        $data['dokumentasi'] = $this->M_dokumentasi->findAll();
        $data['title'] = 'Dokumentasi';
        echo view('admin/dokumentasi', $data);
        echo view('admin/tambah-data/tambah-dokumentasi', $data);
    }
    public function tambah_gambar()
    {
        $periksa = $this->validate([
            'file_upload' =>
            'uploaded[file_upload]|mime_in[file_upload,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_upload,10000]'
        ]);
        if ($periksa) {
            $file = $this->request->getFile('file_upload');
            $newName = $file->getRandomName();
            $file->move('uploads', $newName);

            $this->M_dokumentasi->save([
                'foto' => $newName,
            ]);

            session()->setFlashdata("success", "Gambar berhasil di tambah.");
            return redirect()->to(base_url('admin/dokumentasi'));
        } else {
            session()->setFlashdata("error", "Gambar gagal di tambah.");
            return redirect()->to(base_url('admin/dokumentasi'));
        }
    }
    public function hapus_dokumentasi($id_dokumentasi)
    {
        $dokumentasi = $this->M_dokumentasi->find($id_dokumentasi);
        unlink('uploads/' . $dokumentasi['foto']);

        $this->M_dokumentasi->delete($id_dokumentasi);
        session()->setFlashdata("success", "Data Berhasil di Hapus.");
        return redirect()->to(base_url('admin/dokumentasi'));
    }
    public function edit_gambar($id_dokumentasi)
    {
        $periksa = $this->validate([
            'file_upload' =>
            'uploaded[file_upload]|mime_in[file_upload,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_upload,10000]'
        ]);
        if ($periksa) {
            $file = $this->request->getFile('file_upload');
            $newName = $file->getRandomName();
            $file->move('uploads', $newName);
            unlink('uploads/' . $this->request->getVar('lama'));

            $this->M_dokumentasi->save([
                'id_dokumentasi' => $id_dokumentasi,
                'foto' => $newName,
            ]);

            session()->setFlashdata("success", "Gambar berhasil di Edit.");
            return redirect()->to(base_url('admin/dokumentasi'));
        } else {
            session()->setFlashdata("error", "Gambar gagal di tambah.");
            return redirect()->to(base_url('admin/dokumentasi'));
        }
    }

    public function ubah_password($id = 0)
    {
        if ($this->session->has('username') == "") {
            return redirect()->to(base_url('home/blocked_admin'));
        }
        // $data['password'] = $this->M_admin->findAll();
        // $data['id_admin'] = $id_admin;
        // dd($data['password']);
        // $M_admin = new M_admin;
        // $getAdmin = $M_admin->getAdmin($id)->getRow();
        // dd($getAdmin);
        // $data['admin'] = $getAdmin;
        // dd($data['admin']);
        $data['title'] = 'Ubah Password';
        return view('admin/ubah-password', $data);
    }
    public function edit_password()
    {
        $periksa = $this->validate([
            'password2' => [
                'rules' => 'required|trim|min_length[3]|matches[password3]'
            ],
            'password3' => [
                'rules' => 'required|trim|min_length[3]|matches[password2]'
            ],

        ]);
        if ($periksa) {
            $cek = $this->M_admin->where('id_admin', session()->get('id_admin'))->first();
            $cek_admin = md5($this->request->getVar('password1'));
            if ($cek['password'] == $cek_admin) {
                $this->M_admin->save([
                    'id_admin' => session()->get('id_admin'),
                    'password' => md5($this->request->getVar('password2'))
                ]);
                session()->setFlashdata("success", "berhasil.");
                return redirect()->to(base_url('admin/ubah_password'));
            } else {
                session()->setFlashdata("error", "gagal.");
                return redirect()->to(base_url('admin/ubah_password'));
            }
        } else {
            session()->setFlashdata("error", "gagal.");
            return redirect()->to(base_url('admin/ubah_password'));
        }
        // $password = md5($this->request->getVar('password1'));
        // dd($password);
        // if ($periksa) {

        // } else {
        //     session()->setFlashdata("eror", "Password pertama dan kedua tidak sesuai.");
        //     return redirect()->to(base_url('admin/ubah_password'));
        // }
    }
}
