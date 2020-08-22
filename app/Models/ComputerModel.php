<?php 

namespace App\Models;

use CodeIgniter\Model;

class ComputerModel extends Model
{
    protected $table = 'computer';
    protected $useTimestamps = true;

    public function getComputer($slug = false)
    {
        if($slug == false) {
            return $this->findAll();
        } 

        return $this->where(['slug' => $slug])->first();
    }
    
}