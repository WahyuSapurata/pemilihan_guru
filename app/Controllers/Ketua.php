<?php

namespace App\Controllers;

use App\Models\M_ketua;
use App\Models\M_kriteria;
use App\Models\M_alternatif;
use App\Models\M_dokumentasi;
use App\Models\M_data;

class Ketua extends BaseController
{
    protected $session;
    protected $M_ketua;
    protected $M_kriteria;
    protected $M_alternatif;
    protected $M_bobot;
    protected $M_dokumentasi;
    protected $M_data;
    public function __construct()
    {
        $this->M_ketua = new M_ketua();
        $this->M_kriteria = new M_kriteria();
        $this->M_alternatif = new M_alternatif();
        $this->M_dokumentasi = new M_dokumentasi();
        $this->M_data = new M_data();
        $this->session = \Config\Services::session();
    }


    public function index()
    {
        if ($this->session->has('username') == "") {
            return redirect()->to(base_url('home/blocked_ketua'));
        }
        $data['title'] = 'Beranda';
        return view('ketua/beranda', $data);
    }

    public function kriteria()
    {
        if ($this->session->has('username') == "") {
            return redirect()->to(base_url('home/blocked_ketua'));
        }
        $data['data'] = $this->M_data->findAll();
        $data['title'] = 'Data Kriteria';
        return view('ketua/data-kriteria', $data);
    }

    public function alternatif()
    {
        if ($this->session->has('username') == "") {
            return redirect()->to(base_url('home/blocked_ketua'));
        }
        $data['alternatif'] = $this->M_alternatif->findAll();
        $data['title'] = 'Data Alternatif';
        return view('ketua/data-alternatif', $data);
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
            return redirect()->to(base_url('home/blocked_ketua'));
        }
        $data['alternatif'] = $this->M_alternatif->findAll();
        $data['kriteria'] = $this->M_kriteria->findAll();

        $alternatif = $this->M_alternatif->findAll();
        $kriteria = $this->M_kriteria->findAll();

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
            'pendidikan',
            'ipk',
            'pengalaman',
            'tkd',
            'wawancara'
        ];
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
        return view('ketua/hasil-seleksi', $data);
    }

    public function dokumentasi()
    {
        if ($this->session->has('username') == "") {
            return redirect()->to(base_url('home/blocked_ketua'));
        }
        $data['dokumentasi'] = $this->M_dokumentasi->findAll();
        $data['title'] = 'Dokumentasi';
        return view('ketua/dokumentasi', $data);
    }
}
