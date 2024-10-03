<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageKategori extends Model
{
    use HasFactory;

    protected $table = 'message_kategori';

    protected $fillable = [
        'nama_kategori'
    ];

    public function messages()
    {
        return $this->hasMany(Message::class, 'message_kategori_id');
    }
}
