<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // Tabel yang digunakan oleh model ini
    protected $table = 'messages';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'sender',
        'message_reference',
        'subject',
        'message_text',
        'message_status',
        'create_by',
        'delete_mark',
        'update_by',
    ];

    // Relasi ke penerima pesan (optional jika diperlukan)
    public function to()
    {
        return $this->hasMany(MessageTo::class, 'message_id', 'id');
    }
}