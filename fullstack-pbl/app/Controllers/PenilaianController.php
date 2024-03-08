<?php

namespace App\Controllers;

use App\Models\PenilaianModel;

class PenilaianController extends BaseController
{
    protected $PenModel;
    public function __construct()
    {
        $this->PenModel = new PenilaianModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Penilaian',
            'Penilaian' => $this->PenModel->getPenilaian()
        ];
        return view('penilaian/index',$data);
    }

    public function create()
    {
        //session();
        $data = [
            'title' => 'Form Tambah Data',
            'validation' => \Config\Services::validation()
        ];

        return view('penilaian/create', $data);
    }

    public function save()
    {
        //validasi
        if (!$this->validate([
            'nim' => [
                'rules' => 'required|is_unique[penilaian.nim]',
                'errors' => [
                    'required' => '{field} nim harus diisi',
                    'is_unique' => '{filed} nim sudah terdaftar'
                ]
            ],
            'nama_mhs' => [
                'rules' => 'required|is_unique[penilaian.nama_mhs]',
                'errors' => [
                    'required' => '{field} nama harus diisi',
                    'is_unique' => '{filed} nama sudah terdaftar'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to('/Penilaian/create')->withInput()->with('validation', $validation);
        }

        //$id = url_title($this->request->getVar('id'), '-', true);

        $this->PenModel->save([
            //'id' => $id,
            'nim' => $this->request->getVar('nim'),
            'nama_mhs' => $this->request->getVar('nama_mhs'),
            'uts' => $this->request->getVar('uts'),
            'uas' => $this->request->getVar('uas'),
            'nilai_akhir' => $this->request->getVar('nilai_akhir'),
            'skala' => $this->request->getVar('skala'),
            'huruf' => $this->request->getVar('huruf')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('penilaian/index');
    }
}
