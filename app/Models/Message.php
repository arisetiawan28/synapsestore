<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = "chat";

    public function attributes()
    {
        return [
            'customer_id' => 'Customer',
            'isi_chat' => 'Pesan',
            'tanggal_waktu' => 'Tanggal-Waktu',
            'chat_previous' => 'ID Chat Previous',
            'chat_status' => 'Chat Status',
            'created_by' => 'Dibuat oleh',
            'updated_by' => 'Diperbaharui oleh',
        ];
    }
}
