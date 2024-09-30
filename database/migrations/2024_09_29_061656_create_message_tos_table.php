<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageTo extends Model
{
    use HasFactory;

    // Menyebutkan nama tabel yang digunakan oleh model ini
    protected $table = 'message_to';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'message_id',
        'to',
        'cc',
        'create_by',
        'delete_mark',
        'update_by',
    ];

    /**
     * Relasi ke tabel messages.
     * Setiap entri dalam message_to terhubung ke satu pesan.
     */
    public function message()
    {
        return $this->belongsTo(Message::class, 'message_id');
    }
}