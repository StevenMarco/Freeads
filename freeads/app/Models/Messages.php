<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'sender_email',
        'receiver_email',
        'created_at',
        'updated_at'
    ];
}
