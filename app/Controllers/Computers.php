<?php 

namespace App\Controllers;

use App\Models\ComputerModel;

class Computers extends BaseController
{
    protected $computerModel;

    public function __construct()
    {
        $this->computerModel = new ComputerModel();
    }

    public function index()
    {
        // $computer = $this->computerModel->findAll();

        $data = [
            'title' => 'Daftar Komputer',
            'computer' => $this->computerModel->getComputer()
        ];

        // cara konek db tanpa model
        // $db = \Config\Database::connect();
        // $komik = $db->query("SELECT * FROM computer");
        // foreach ($komik->getResultArray() as $row) {
        //     d($row);
        // }

        // $computerModel = new \App\Models\ComputerModel();
        

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