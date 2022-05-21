<?php

namespace App\Models;

use CodeIgniter\Model;

class M_alternatif extends Model
{
    protected $table      = 'alternatif';
    protected $primaryKey = 'id_alternatif';
    // protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'jenis_kelamin', 'alamat', 'ipk', 'pendidikan', 'pengalaman', 'tkd', 'wawancara'];

    // public function join_alternatif() {
    //     $query = $this->db->table('alternatif')
    //     ->join('bobot', 'alternatif.id_bobot = bobot.id_bobot')
    //     ->get();
    //     return $query;
    // }
}
