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
        return view('computer/detail', $data);
    }
}