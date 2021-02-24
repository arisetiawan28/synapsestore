<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = "keranjang";

    public function barang()
    {
        return $this->hasOne(Barang::class, 'id', 'barang_id');
    }

    public function attributes()
    {
        return [
            'barang_id' => 'Barang',
            'customer_id' => 'Customer',
            'jumlah_pesanan' => 'Jumlah Pesanan',
            'jumlah_harga' => 'Jumlah Harga',
            'created_by' => 'Dibuat oleh',
            'updated_by' => 'Diperbaharui oleh',
        ];
    }
}
