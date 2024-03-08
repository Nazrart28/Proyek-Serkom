<?php

namespace App\Models;

use CodeIgniter\Model;

class MitraModel extends Model
{
    protected $table = 'mitra';
    protected $useTimesstamps = true;
    protected $allowedFields = ['mitra', 'proyek', 'deskripsi', 'deskripsi_mitra', 'kelompok'];

    public function getMitra($id = false)
    {
        // $query = $this->db->query("SELECT * FROM mitra ORDER BY mitra ASC");

        // return $query->getResult();


        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
