<?php

namespace App\Models;

use CodeIgniter\Model;

class AgendaModel extends Model
{
    protected $table = 'agenda';
    protected $useTimeStamp = true;
    protected $allowedFields = ['name', 'slug', 'tanggal', 'deskripsi', 'gambar'];
    public function getData($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}
