<?php

namespace App\Models;

use CodeIgniter\Model;

class M_dokumentasi extends Model
{
    protected $table      = 'dokumentasi';
    protected $primaryKey = 'id_dokumentasi';
    protected $allowedFields = ['foto'];
}
