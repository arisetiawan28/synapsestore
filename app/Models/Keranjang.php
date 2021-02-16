<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = "keranjang";

    public function attributes()
    {
        return [
            'barang_id' => 'Barang',
            'customer_id' => 'Customer',
            'jumlah_pesanan' => 'Jumlah Pesanan',
            'jumlah_harga' => 'Jumlah Harga',
            'created_at' => 'Dibuat oleh',
            'updated_at' => 'Diperbaharui oleh',
        ];
    }
}
