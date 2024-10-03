<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender', 'message_text', 'message_kategori_id', 'create_by', 'file'
    ];

    public function messageTo()
    {
        return $this->hasOne(MessageTo::class, 'message_id');
    }

    public function kategori()
    {
        return $this->belongsTo(MessageKategori::class, 'message_kategori_id');
    }
public function replies()
{
    return $this->hasMany(Message::class, 'replied_to');
}

public function repliedTo()
{
    return $this->belongsTo(Message::class, 'replied_to');
}


}
