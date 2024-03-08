<?php

namespace App\Controllers;

use App\Models\KelompokModel;

use function PHPSTORM_META\map;

class Kelompok extends BaseController
{
    protected $kelompokModel;

    public function __construct()
    {
        $this->kelompokModel = new KelompokModel();
    }
    public function index()
    {

        $data = [
            'title'    => 'kelompok | PBL',
            'kelompok' => $this->kelompokModel->getKelompok()
        ];

        return view('kelompok/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail kelompok',
            'kelompok' => $this->kelompokModel->getKelompok($id)
        ];

        //jika eror
        /*if(empty($data['kelompok'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Halaman tidak bisa dimuat');
        }*/
        return view('kelompok/detail', $data);
    }

    public function create()
    {
        //session();
        $data = [
            'title' => 'Form Tambah Data',
            'validation' => \Config\Services::validation()
        ];
        return view('kelompok/create', $data);
    }

    public function save()
    {
        //validasi
        if (!$this->validate([
            'nama' => 'required|is_unique[kelompok.nama]',
        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to('/kelompok/create')->withInput()->with('validation', $validation);
        }

        //$id = url_title($this->request->getVar('id'), '-', true);

        $this->kelompokModel->save([
            //'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'nim' => $this->request->getVar('nim'),
            'kelas' => $this->request->getVar('kelas'),
            'kelompok' => $this->request->getVar('kelompok')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/kelompok/index');
    }

    public function delete($id)
    {
        $this->kelompokModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/kelompok/index');
    }

    public function edit($id)
    {
        //session();
        $data = [
            'title' => 'Form Ubah Data',
            'validation' => \Config\Services::validation(),
            'kelompok' => $this->kelompokModel->getkelompok($id)

        ];
        return view('kelompok/edit', $data);
    }

    public function update($id)
    {
        //cek data
        $dataLama = $this->kelompokModel->getkelompok($this->request->getVar('id'));
        if ($dataLama['kelompok'] == $this->request->getVar('kelompok')) {
            $rule_kelompok = 'required';
        } else {
            $rule_kelompok = 'required|is_unique[kelompok]';
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

            return redirect()->to('/kelompok/create')->withInput()->with('validation', $validation);
        }

        $id = url_title($this->request->getVar('id'), '-', true);

        $this->kelompokModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'nim' => $this->request->getVar('nim'),
            'kelas' => $this->request->getVar('kelas'),
            'kelompok' => $this->request->getVar('kelompok')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/kelompok/index');
    }
}
