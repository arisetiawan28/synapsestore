<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = "kategori_tablee";

    public function attributes()
    {
        return [
            'nama' => 'Kategori',
            'deskripsi' => 'Deskripsi',
            'induk_kategori' => 'Induk Kategori',
            'created_by' => 'Dibuat oleh',
            'updated_by' => 'Diperbaharui oleh',
        ];
    }
}
