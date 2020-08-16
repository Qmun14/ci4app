<?php namespace App\Controllers;

class Coba extends BaseController
{
	public function index()
	{
		echo "ini controller Coba method index";
    }
    
    public function about()
    {
        echo "Hallo Nama Saya $this->nama.";
    }

	//--------------------------------------------------------------------

}
