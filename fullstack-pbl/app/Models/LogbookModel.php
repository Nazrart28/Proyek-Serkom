<?php

namespace App\Models;

use CodeIgniter\Model;

class LogbookModel extends Model
{
    protected $table = 'logbook';
    protected $useTimesstamps = true;
    protected $allowedFields = ['tanggal', 'kegiatan'];

    public function getLogbook($id_logbook = false)
    {
        if ($id_logbook == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id_logbook])->first();
    }
}
