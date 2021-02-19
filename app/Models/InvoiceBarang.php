<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceBarang extends Model
{
    use HasFactory;

    protected $table = "invoice_barang";

    public function attributes()
    {
        return [
            'transaksi_id' => 'ID Transaksi',
            'barang_id' => 'ID Barang',
            'customer_id' => 'ID Customer',
            'jumlah_barang' => 'Jumlah Barang',
            'jumlah_harga' => 'Jumlah Harga',
            'created_at' => 'Dibuat oleh',
            'updated_at' => 'Diperbaharui oleh',
        ];
    }
}
