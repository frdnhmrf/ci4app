<?php

namespace App\Controllers;

use App\Models\AgendaModel;
use CodeIgniter\Database\Config;

class Agenda extends BaseController
{
    protected $agendaModel;
    public function __construct()
    {
        $this->agendaModel = new AgendaModel();
    }
    public function index()
    {
        $data = [
            "title" => "Agenda | Ferdian  Husnal Ma'ruf",
            "agenda" => $this->agendaModel->getData(),
        ];
        return view('agenda/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => "Detail Agenda",
            'agenda' => $this->agendaModel->getData($slug),
        ];

        if (empty($data['agenda'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama agenda ' . $slug . ' tidak ditemukan');
        }
        return view('agenda/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => "Agenda Baru",
            'validation' => \Config\Services::validation()
        ];
        return view('agenda/create', $data);
    }

    public function save()
    {
        //validasi
        if (!$this->validate([
            'name' => [
                'rules' => 'required|is_unique[agenda.name]',
                'errors' => [
                    'required' => '{field} agenda harus diisi.',
                    'is_unique'  => '{field} agenda sudah ada.',
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => 'Field tanggal agenda harus diisi.'
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran file gambar anda terlalu besar',
                    'is_image' => 'File anda bukan gambar',
                    'mime_in' => 'File anda bukan gambar'
                ]
            ],

        ])) {
            // $validation =  \Config\Services::validation();
            // return redirect()->to('/agenda/create')->withInput()->with('validation', $validation);
            return redirect()->to('/agenda/create')->withInput();
        }

        // take file
        $fileGambar = $this->request->getFile('gambar');
        // no file uploaded
        if ($fileGambar->getError() == 4) {
            # code...
            $nameFile = 'default.png';
        } else {
            //generate name
            $nameFile = $fileGambar->getRandomName();
            //PINDAHKAN FILE
            $fileGambar->move('img', $nameFile);
        }



        $slug = url_title($this->request->getVar('name'), '-', true);
        $this->agendaModel->save([
            'name' => $this->request->getVar('name'),
            'slug' => $slug,
            'gambar' => $nameFile,
            'tanggal' => $this->request->getVar('tanggal'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/agenda');
    }

    public function delete($id)
    {
        $gambar = $this->agendaModel->find($id);

        if ($gambar['gambar'] != 'default.png') {
            unlink('img/' . $gambar['gambar']);
        }

        $this->agendaModel->delete($id);
        session()->setFlashdata('hapus', 'Data berhasil dihapus.');
        return redirect()->to('/agenda');
    }

    public function edit($slug)
    {
        $data = [
            'title' => "Edit Agenda",
            'validation' => \Config\Services::validation(),
            'agenda' => $this->agendaModel->getData($slug)
        ];
        return view('agenda/edit', $data);
    }

    public function update($id)
    {
        //cek nama
        $agendaLama = $this->agendaModel->getData($this->request->getVar('slug'));

        if ($agendaLama['name'] == $this->request->getVar('name')) {
            $rule_name = 'required';
        } else {
            $rule_name = 'required|is_unique[agenda.name]';
        }

        //validasi
        if (!$this->validate([
            'name' => [
                'rules' => $rule_name,
                'errors' => [
                    'required' => '{field} agenda harus diisi.',
                    'is_unique'  => '{field} agenda sudah ada.',
                ]
            ],
            'deskripsi' => 'required',
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran file gambar anda terlalu besar',
                    'is_image' => 'File anda bukan gambar',
                    'mime_in' => 'File anda bukan gambar'
                ]
            ],
        ])) {
            return redirect()->to('/agenda/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');

        //  cek gambar
        if ($fileGambar->getError() == 4) {
            $nameFile = $this->request->getVar('fileLama');
        } else {
            //generate name
            $nameFile = $fileGambar->getRandomName();
            //PINDAHKAN FILE
            $fileGambar->move('img', $nameFile);
            // hapus file lama
            $gambar = $this->agendaModel->find($id);
            if ($gambar['gambar'] != 'default.png') {
                unlink('img/' . $this->request->getVar('fileLama'));
            }
        }

        $slug = url_title($this->request->getVar('name'), '-', true);
        $this->agendaModel->save([
            'id' => $id,
            'name' => $this->request->getVar('name'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'slug' => $slug,
            'gambar' => $nameFile,
            'tanggal' => $this->request->getVar('tanggal'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to('/agenda');
    }
}
