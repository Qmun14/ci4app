<?php namespace App\Controllers;

class Coba extends BaseController
{
	public function index()
	{
		echo "ini controller Coba method index";
    }
    
    public function about($nama = '')
    {
        echo "Hallo Nama Saya $nama.";
    }

	//--------------------------------------------------------------------

}
