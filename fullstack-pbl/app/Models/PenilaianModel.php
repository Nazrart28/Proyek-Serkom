<?php

namespace App\Models;

use CodeIgniter\Model;

class PenilaianModel extends Model
{
    protected $table = 'penilaian';
    protected $useTimesstamps = true;
    protected $allowedFields = ['nim', 'nama_mhs', 'uts', 'uas', 'nilai_akhir', 'skala', 'huruf'];

    public function getPenilaian($id_penilaian = false)
    {
        if ($id_penilaian == false) {
            return $this->findAll();
        }

        return $this->where(['id_penilaian' => $id_penilaian])->first();
    }
}
