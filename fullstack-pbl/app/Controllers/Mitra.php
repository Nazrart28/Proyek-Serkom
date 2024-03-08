<?php

namespace App\Controllers;

use App\Models\MitraModel;

class Mitra extends BaseController
{
    protected $mitraModel;
    public function __construct()
    {
        $this->mitraModel = new MitraModel();
    }
    public function index()
    {

        $data = [
            'title' => 'Mitra | PBL',
            'mitra' => $this->mitraModel->getMitra()
        ];

        return view('mitra/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Mitra',
            'mitra' => $this->mitraModel->getMitra($id)
        ];

        //jika eror
        if (empty($data['mitra'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Halaman tidak bisa dimuat');
        }
        return view('mitra/detail', $data);
    }

    public function create()
    {
        //session();
        $data = [
            'title' => 'Form Tambah Data',
            'validation' => \Config\Services::validation()
        ];


        return view('mitra/create', $data);
    }

    public function save()
    {
        //validasi
        if (!$this->validate([
            'proyek' => 'required|is_unique[mitra.proyek]',
        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to('/mitra/create')->withInput()->with('validation', $validation);
        }

        //$id = url_title($this->request->getVar('mitra'), '-', true);

        $this->mitraModel->save([
            'mitra' => $this->request->getVar('mitra'),
            //'id' => $id,
            'proyek' => $this->request->getVar('proyek'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'deskripsi_mitra' => $this->request->getVar('deskripsi_mitra'),
            'kelompok' => $this->request->getVar('kelompok')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/mitra/index');
    }

    public function delete($id)
    {
        $this->mitraModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/mitra/index');
    }




    public function edit($id)
    {
        //session();
        $data = [
            'title' => 'Form Ubah Data',
            'validation' => \Config\Services::validation(),
            'mitra' => $this->mitraModel->getMitra($id)
        ];
        return view('mitra/edit', $data);
    }

    public function update($id)
    {
        //cek data
        $dataLama = $this->mitraModel->getMitra($this->request->getVar('id'));
        if ($dataLama['id'] == $this->request->getVar('id')) {
            $rule_kelompok = 'required';
        } else {
            $rule_kelompok = 'required[mitra.kelompok]';
        }

        //validasi
        if (!$this->validate([
            'kelompok' => [
                'rules' => $rule_kelompok,
                'errors' => [
                    'required' => '{field} kelompok harus diisi',
                    'is_unique' => '{filed} kelompok sudah terdaftar'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to('/mitra/edit' . $this->request->getVar('id'))->withInput()->with('validation', $validation);
        }


        $id = url_title($this->request->getVar('mitra'), '-', true);
        $this->mitraModel->save([
            'mitra' => $this->request->getVar('mitra'),
            'id' => $id,
            'proyek' => $this->request->getVar('proyek'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'kelompok' => $this->request->getVar('kelompok')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/mitra/index');
    }
}
