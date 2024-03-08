<?php

namespace App\Controllers;

use App\Models\LogbookModel;

class Logbook extends BaseController
{
    protected $logbookModel;
    public function __construct()
    {
        $this->logbookModel = new LogbookModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Logbook | PBL',
            'logbook' => $this->logbookModel->getlogbook()
        ];

        return view('logbook/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'form tambah data'
        ];
        return view('logbook/create', $data);
    }

    public function save()
    {
        //validasi
        if (!$this->validate([
            'kegiatan' => [
                'rules' => 'required[logbook.kegiatan]',
                'errors' => [
                    'required' => '{field} kegiatan harus diisi'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to('/logbook/create')->withInput()->with('validation', $validation);
        }

        //$id = url_title($this->request->getVar('id'), '-', true);

        $this->logbookModel->save([
            //'id' => $id,
            'tanggal' => $this->request->getVar('tanggal'),
            'kegiatan' => $this->request->getVar('kegiatan')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/logbook/index');
    }

    public function detail($id)
    {
        $data = [
            'id' => $id,
            'title' => 'Detail Logbook',
            'logbook' => $this->logbookModel->getLogbook($id)
        ];

        session()->setFlashdata('pesan', 'Data berhasil diubah');

        //jika eror
        if (empty($data['logbook'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Halaman tidak bisa dimuat');
        }
        return view('logbook/detail', $data);
    }

    public function delete($id)
    {
        $this->logbookModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/logbook/index');
    }
}
