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
        $data = [
            'title' => 'Form Tambah Data PC'

        ];

        return view('computer/create', $data);
    }

    public function save()
    {
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

}