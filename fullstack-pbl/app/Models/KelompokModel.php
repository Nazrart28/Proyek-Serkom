<?php

namespace App\Models;

use CodeIgniter\Model;

class KelompokModel extends Model
{
    protected $table      = 'kelompok';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $useTimesstamps = true;
    protected $allowedFields = ['id', 'nama', 'nim', 'kelas', 'kelompok'];
    public function getKelompok($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
