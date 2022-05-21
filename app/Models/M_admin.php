<?php

namespace App\Models;

use CodeIgniter\Model;

class M_admin extends Model
{
    protected $table      = 'admin';
    protected $primaryKey = 'id_admin';
    protected $allowedFields = ['password'];
    // protected $useTimestamps = true;
    // public function ambil_id_event($id_admin)
    // {
    //     return $this->db->where('admin', ['id$id_admin' => $id_admin])->row_array();
    // }
    //    public function update_data($id_admin) {
    //     $this->db->get('id_admin', $id_admin);

    //    }
    
}
