<?php namespace App\Controllers;

class Pages extends BaseController
{
	public function index()
	{
        $data = [
            'title' => 'Home | CI4App',
            'test' => ['satu', 'dua', 'tiga'] 
        ];
        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Me'
        ];
        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Us',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jl. Abc No. 12345',
                    'kota' => 'Bogor'
                ],
                [
                    
                    'tipe' => 'kantor',
                    'alamat' => 'Jl. Veteran No. 12345',
                    'kota' => 'Jakarta Pusat'
                ]
            ]
        ];
        return view('pages/contact', $data);

    }


	//--------------------------------------------------------------------

}
