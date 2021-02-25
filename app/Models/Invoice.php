<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = "invoice";

    public function attributes()
    {
        return [
            'jumlah_transaksi' => 'Jumlah Transaksi',
            'kode_transaksi' => 'Kode Transaksi',
            'metode_pembayaran' => 'Metode Pembayaran',
            'kurir' => 'Kurir',
            'ongkir' => 'Ongkir',
            'no_resi' => 'Nomor Resi',
            'id_keranjang' => 'Keranjang',
            'waktu_sampai' => 'Waktu Sampai',
            'customer_id' => 'Customer',
            'created_by' => 'Dibuat oleh',
            'updated_by' => 'Diperbaharui oleh',
        ];
    }

    public function getListMetodePembayaranAttribute(){
        return [
            1 => 'COD',
            2 => 'Virtual Account',
            3 => 'Transfer Bank',
            4 => 'dll',
        ];
    }

    //relasi yang menghubungkan dengan user yang melakukan input
    public function createdBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
}
