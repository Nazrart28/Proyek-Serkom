<?php

namespace App\Controllers;

use App\Models\SubmitFileModel;

class SubmitFileController extends BaseController
{
    protected $SFModel;
    public function __construct()
    {

        $this->SFModel = new SubmitFileModel();
    }

    public function index()
    {

        $data = [
            'title' => 'SubmitFile',
            'SubmitFile' => $this->SFModel->getSubmitFile()
        ];

        return view('submit_file/index', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'Submit File PBL'
        ];
        return view('submit_file/create', $data);
    }

    public function save()
    {
        //validasi
        if (!$this->validate([
            'nama_file' => [
                'rules' => 'required|is_unique[submit_file.nama_file]',
                'errors' => [
                    'required' => '{field} nama harus diisi',
                    'is_unique' => '{filed} nama sudah terdaftar'
                ]
            ],
            'file' => [
                'rules' => 'required|is_unique[submit_file.file]',
                'errors' => [
                    'required' => '{field} file harus diisi',
                    'is_unique' => '{filed} file sudah terdaftar'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to('/submit_file/create')->withInput()->with('validation', $validation);
        }

        //$id = url_title($this->request->getVar('id_submit_file'), '-', true);

        $this->SFModel->save([
            //'id_submit_file' => $id,
            'nama_file' => $this->request->getVar('nama_file'),
            'file' => $this->request->getVar('file')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/submit_file/index');
    }

    public function delete($id)
    {
        $this->SFModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/submit_file/index');
    }
}
