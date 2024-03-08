<?php

namespace App\Models;

use CodeIgniter\Model;

class SubmitFileModel extends Model
{
    protected $table = 'submit_file';
    protected $useTimesstamps = true;
    
    protected $allowedFields = ['nama_file', 'file'];

    public function getSubmitFile($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_submit_file' => $id])->first();
    }
}
