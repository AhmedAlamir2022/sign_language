<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'inst_id',
        'stud_id',
        'inst_message',
        'stud_message',
    ];

    public function Instructor()
    {
        return $this->belongsTo(Instructor::class, 'inst_id');
    }

    public function Student()
    {
        return $this->belongsTo(User::class, 'stud_id');
    }
}
