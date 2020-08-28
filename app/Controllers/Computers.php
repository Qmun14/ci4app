<?php 

namespace App\Controllers;

use App\Models\ComputerModel;

class Computers extends BaseController
{
    protected $computerModel; //**Property untuk $computerModel supaya bisa dipake di kelas ini dan kelas turunannya

    public function __construct()
    {
        $this->computerModel = new ComputerModel();  // **semua method bisa pake di kelas model ini, syaratnya harus buat property kayak di atas.
    }

    public function index()
    {
        // $computer = $this->computerModel->findAll();

        $data = [
            'title' => 'Daftar Komputer',
            'computer' => $this->computerModel->getComputer()
        ];        

        return view('computer/index', $data);
    }

    public function detail($slug) 
    {
        $data = [
            'title' => 'Detail PC',
            'computer' => $this->computerModel->getComputer($slug)
        ];

        // jika computer tidak ada di tabel
        if(empty($data['computer'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Vendor ' .  $slug . ' tidak ditemukan.');
        }

        return view('computer/detail', $data);
    }

    public function create()
    {
        // session(); ->biar gak lupa taro aja sessionya di BaseController.php
        $data = [
            'title' => 'Form Tambah Data PC',
            'validation' => \Config\Services::validation()

        ];

        return view('computer/create', $data);
    }

    public function save()
    {
        // validasi input
        if(!$this->validate([
            'vendor' => [
                'rules' => 'required|is_unique[computer.vendor]',
                'errors' => [
                    'required' => '{field} komputer harus diisi.',
                    'is_unique' => '{field} computer sudah ada.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/computers/create')->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('vendor'), '-', true);
        $this->computerModel->save([
            'vendor' => $this->request->getVar('vendor'),
            'slug' => $slug,
            'cpu' => $this->request->getVar('cpu'),
            'ram' => $this->request->getVar('ram'),
            'hdd' => $this->request->getVar('hdd'),
            'foto' => $this->request->getVar('foto')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/computers');

    }

    public function delete($id)
    {
        $this->computerModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/computers');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Ubah Data PC',
            'validation' => \Config\Services::validation(),
            'computer' => $this->computerModel->getComputer($slug)

        ];

        return view('computer/edit', $data);
    }

    public function update($id)
    {
        // Cek judul untuk validasi field vendor pc apabila dikosongkan atau dirubah dengan data yg sudah ada di database
        $computerLama = $this->computerModel->getComputer($this->request->getVar('slug'));
        if($computerLama['vendor'] == $this->request->getVar('vendor')) {
            $rule_vendor = 'required';
        } else {
            $rule_vendor = 'required|is_unique[computer.vendor]';
        }

        if(!$this->validate([
            'vendor' => [
                'rules' => $rule_vendor,
                'errors' => [
                    'required' => '{field} komputer harus diisi.',
                    'is_unique' => '{field} computer sudah ada.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/computers/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('vendor'), '-', true);
        $this->computerModel->save([
            'id' => $id,
            'vendor' => $this->request->getVar('vendor'),
            'slug' => $slug,
            'cpu' => $this->request->getVar('cpu'),
            'ram' => $this->request->getVar('ram'),
            'hdd' => $this->request->getVar('hdd'),
            'foto' => $this->request->getVar('foto')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/computers');
    }


}