<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = "barang";

    public function attributes()
    {
        return [
            'kode_barang' => 'Kode',
            'nama_barang' => 'Nama Barang',
            'harga_barang' => 'Harga',
            'deskripsi_barang' => 'Deskripsi',
            'jumlah_barang' => 'Jumlah',
            'created_by' => 'Dibuat oleh',
            'updated_by' => 'Diperbaharui oleh',
        ];
    }

    //relasi yang menghubungkan dengan user yang melakukan input
    public function createdBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
}
